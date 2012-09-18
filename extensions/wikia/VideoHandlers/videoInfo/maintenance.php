<?php

	/**
	* Maintenance script to collect video data (local and premium videos) and insert into video_info table
	* Note: video data come from embedded premium videos, local videos, and related videos (related videos list and global list)
	* @author Liz Lee, Saipetch Kongkatong
	*/

	function addVideo( &$videoList, $titleName ) {
		global $isDryrun, $added, $invalid, $duplicate;

		$videoInfoHelper = F::build( 'VideoInfoHelper' ); /* @var $videoInfoHelper VideoInfoHelper */
		$videoData = $videoInfoHelper->getVideoDataByTitle( $titleName );
		if ( !empty($videoData) ) {
			echo $videoData['videoTitle'];
			$titleHash = md5( $videoData['videoTitle'] );
			if ( !in_array($titleHash, $videoList) ) {
				if ( !$isDryrun ) {
					$videoInfo = F::build( 'VideoInfo', array($videoData) ); /* @var $videoInfo VideoInfo */
					$videoInfo->addVideo();
				}

				$added++;
				echo "..... ADDED.\n";

				$videoList[] = $titleHash;
			} else {
				$duplicate++;
				echo "..... ALREADY ADDED.\n";
			}
		} else {
			$invalid++;
			echo "$titleName..... INVALID.\n";
		}
	}

	// ------------------------------------------- Main -------------------------------------------------

	ini_set( "include_path", dirname( __FILE__ )."/../../../../maintenance/" );

	require_once( "commandLine.inc" );

	if ( isset($options['help']) ) {
		die( "Usage: php maintenance.php [--dry-run] [--help]
		--dry-run			dry run
		--help				you are reading it right now\n\n" );
	}

	$app = F::app();
	if ( empty($app->wg->CityId) ) {
		die( "Error: Invalid wiki id." );
	}

	if ( $app->wf->ReadOnly() ) {
		die( "Error: In read only mode." );
	}

	$isDryrun = ( isset($options['dry-run']) ) ? true : false ;

	echo "Wiki $wgCityId:\n";

	$db = $app->wf->GetDB( DB_MASTER );

	if ( !$isDryrun ) {
		// create table or patch table schema
		$video = F::build( 'VideoInfo' ); /* @var $video VideoInfo */
		$video->createTableVideos();

		echo "Create video_info table.\n";
	}

	$videoList = array();
	$total = 0;
	$added = 0;
	$invalid = 0;
	$duplicate = 0;

	// get embedded videos (premium)
	$excludeList = array( 'png', 'gif', 'bmp', 'jpg', 'jpeg', 'ogg', 'ico', 'svg', 'mp3', 'wav', 'midi' );
	$sqlWhere = implode( "','", $excludeList );

	$sql = <<<SQL
		SELECT  il_to as name
		FROM `imagelinks`
		WHERE NOT EXISTS ( SELECT 1 FROM image WHERE img_media_type = 'VIDEO' AND img_name = il_to )
			AND LOWER(il_to) != 'placeholder'
			AND LOWER(SUBSTRING_INDEX(il_to, '.', -1)) NOT IN ( '$sqlWhere' )
SQL;

	$result = $db->query( $sql, __METHOD__ );

	while( $row = $db->fetchObject($result) ) {
		echo "Embedded Video: ";
		addVideo( $videoList, $row->name );
		$total++;
	}

	// get local videos
	$result = $db->select(
		array( 'image' ),
		array( 'img_name as name' ),
		array( 'img_media_type' => 'VIDEO' ),
		__METHOD__
	);

	while( $row = $db->fetchObject($result) ) {
		echo "Local Video: ";
		addVideo( $videoList, $row->name );
		$total++;
	}

	// get related videos - RelatedVideos Articles
	$result = $db->select(
		array( 'page' ),
		array( 'page_title' ),
		array(
			'page_namespace' => NS_RELATED_VIDEOS
		),
		__METHOD__
	);

	while( $row = $db->fetchObject($result) ) {
		echo "RelatedVideos Article: $row->page_title\n";

		$title = Title::newFromText( $row->page_title, NS_RELATED_VIDEOS );
		$relatedVideosNSData = RelatedVideosNamespaceData::newFromTitle( $title );
		$data = $relatedVideosNSData->getData();
		foreach( $data['lists']['WHITELIST'] as $v ) {
			echo 'NS'.NS_RELATED_VIDEOS.": ";

			addVideo( $videoList, $v['title'] );
			$total++;
		}
	}

	// get related videos - Global list
	$relatedVideosNSData = RelatedVideosNamespaceData::newFromGeneralMessage();
	echo "MediaWiki:RelatedVideosGlobalList\n";
	if ( !empty($relatedVideosNSData) ) {
		$data = $relatedVideosNSData->getData();
		foreach( $data['lists']['WHITELIST'] as $v ) {
			echo "GlobalList: ";

			addVideo( $videoList, $v['title'] );
			$total++;
		}
	}

	echo "Wiki $wgCityId: TOTAL: $total, ADDED: $added, DUPLICATE: $duplicate, INVALID: $invalid\n";
