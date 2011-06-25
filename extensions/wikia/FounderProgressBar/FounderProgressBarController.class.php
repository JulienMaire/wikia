<?php

class FounderProgressBarController extends WikiaController {
	
	protected $actions;
	
	/**
	 * Initialize static data
	 */
	
	public function init() {
		// Messages defined in i18n file
		// Each message in i18n has a -label -description and -action version
		// If the message name has a % in it that means a $1 substitution is done
		$this->messages = array ( 
				FT_PAGE_ADD_10 => "page-add%",
				FT_THEMEDESIGNER_VISIT => "themedesigner-visit",
				FT_MAINPAGE_EDIT => "mainpage-edit",
				FT_PHOTO_ADD_10 => "photo-add%",
				FT_CATEGORY_ADD3 => "category-add%",
				FT_COMMCENTRAL_VISIT => "commcentral-visit",
				FT_WIKIACTIVITY_VISIT => "wikiactivity-visit",
				FT_PROFILE_EDIT => "profile-edit",
				FT_PHOTO_ADD_20 => "photo-add%",
				FT_TOTAL_EDIT_75 => "total-edit%",
				FT_PAGE_ADD_20 => "page-add%",
				FT_CATEGORY_EDIT => "category-edit",
				FT_WIKIALABS_VISIT => "wikialabs-visit",
				FT_FB_CONNECT => "fb-connect",
				FT_CATEGORY_ADD_5 => "category-add%",
				FT_PAGELAYOUT_VISIT => "pagelayout-visit",
				FT_GALLERY_ADD => "gallery-add",
				FT_TOPNAV_EDIT => "topnav-edit",
				FT_MAINPAGE_ADDSLIDER => "mainpage-addslider",
				FT_COMMCORNER_EDIT => "commcorner-edit",
				FT_VIDEO_ADD => "video-add",
				FT_USER_ADD_5 => "user-add%",
				FT_RECENTCHANGES_VISIT => "recentchanges-visit",
				FT_WORDMARK_EDIT => "wordmark-edit",
				FT_MOSTVISITED_VISIT => "mostvisited-visit",
				FT_TOPTENLIST_ADD => "toptenlist-add",
				FT_BLOGPOST_ADD => "blogpost-add",
				FT_FB_LIKES_3 => "fb-likes%",
				FT_UNCATEGORIZED_VISIT => "uncategorized-visit",
				FT_TOTAL_EDIT_300 => "total-edit%",
			);

		// This list says how many times an item needs to be counted to be finished
		$this->counters = array (
				FT_PAGE_ADD_10 => 10,
				FT_THEMEDESIGNER_VISIT => 1,
				FT_MAINPAGE_EDIT => 1,
				FT_PHOTO_ADD_10 => 10,
				FT_CATEGORY_ADD3 => 3,
				FT_COMMCENTRAL_VISIT => 1,
				FT_WIKIACTIVITY_VISIT => 1,
				FT_PROFILE_EDIT => 1,
				FT_PHOTO_ADD_20 => 20,
				FT_TOTAL_EDIT_75 => 75,
				FT_PAGE_ADD_20 => 20,
				FT_CATEGORY_EDIT => 1,
				FT_WIKIALABS_VISIT => 1,
				FT_FB_CONNECT => 1,
				FT_CATEGORY_ADD_5 => 5,
				FT_PAGELAYOUT_VISIT => 1,
				FT_GALLERY_ADD => 1,
				FT_TOPNAV_EDIT => 1,
				FT_MAINPAGE_ADDSLIDER => 1,
				FT_COMMCORNER_EDIT => 1,
				FT_VIDEO_ADD => 1,
				FT_USER_ADD_5 => 5,
				FT_RECENTCHANGES_VISIT => 1,
				FT_WORDMARK_EDIT => 1,
				FT_MOSTVISITED_VISIT => 1,
				FT_TOPTENLIST_ADD => 1,
				FT_BLOGPOST_ADD => 1,
				FT_FB_LIKES_3 => 3,
				FT_UNCATEGORIZED_VISIT => 1,
				FT_TOTAL_EDIT_300 => 300,
		);

		// This list associates an action with a hook ?
		$this->hooks = array (
				"onArticleSaveComplete" => array ( 10 ),
				"UploadComplete" => array ( 20 ),
		);
	}
	
	/**
	 * @desc Get the short list of available founder tasks
	 * 
	 * @responseParam list array of 2 Founder tasks
	 */

	public function getShortTaskList () {
		// try to get cached data
		$memKey = $this->wf->MemcKey('FounderShortTaskList');
		$list = $this->wg->Memc->get($memKey);
		if (empty($list)) {
			$this->wf->ProfileIn(__METHOD__ . '::miss');

			$list = array();

			// get the next two available non-skipped, non-completed items
			$dbr = $this->wf->GetDB(DB_SLAVE, array(), $this->wg->ExternalSharedDB);
			$res = $dbr->select(
				'founder_progress_bar_tasks',
				array('task_id', 'task_count'),
				array('task_skipped' => 0, 'task_completed' => 0, 'wiki_id' => $this->wg->CityId),
				__METHOD__,
				array( 'LIMIT' => 2, 'ORDER BY' => 'task_id ASC' )
			);
			while($row = $dbr->fetchObject($res)) {
				$task_id = $row->task_id;
				$list[$task_id] = array (
					"task_id" => $task_id,
					"task_count" => $row->task_count,
					"task_label" => $this->getMsgForTask($task_id, "label"),
					"task_description" => $this->getMsgForTask($task_id, "description"),
					"task_action" => $this->getMsgForTask($task_id, "action"),
					);
			}

			if (!empty($list)) {
				$this->wg->Memc->set($memKey, $list, 3600);
			}

			$this->wf->ProfileOut(__METHOD__ . '::miss');
		}
		$this->response->setVal("list", $list);
	}

	/**
	 * @desc Get all founder tasks with more details (available, completed, skipped)
	 * 
	 * @responseParam list array of Founder actions in the format:
	 */
	
	public function getLongTaskList () {
		// try to get cached data
		$memKey = $this->wf->MemcKey('FounderLongTaskList');
		$list = $this->wg->Memc->get($memKey);
		$list = null;  // no memcache for now while developing
		if (empty($list)) {
			$this->wf->ProfileIn(__METHOD__ . '::miss');

			$list = array();

			// get the next two available non-skipped, non-completed items
			$dbr = $this->wf->GetDB(DB_SLAVE, array(), $this->wg->ExternalSharedDB);
			$res = $dbr->select(
				'founder_progress_bar_tasks',
				array('task_id', 'task_count', 'task_completed', 'task_skipped', 'task_timestamp'),
				array('wiki_id' => $this->wg->CityId)
				);
			$total_tasks = count($this->messages);
			$tasks_completed = 0;			
			while($row = $dbr->fetchObject($res)) {
				$task_id = $row->task_id;
				$list[$task_id] = array (
					"task_id" => $task_id,
					"task_count" => $row->task_count,
					"task_completed" => $row->task_completed,
					"task_skipped" => $row->task_skipped,
					"task_timestamp" => $this->wf->TimeFormatAgo($row->task_timestamp),
					"task_label" => $this->getMsgForTask($task_id, "label"),
					"task_description" => $this->getMsgForTask($task_id, "description"),
					"task_action" => $this->getMsgForTask($task_id, "action"),
					);
				if ($row->task_completed == 1) {
					$tasks_completed ++;
				}
			}
			$list['tasks_completed'] = $tasks_completed;
			$list['total_tasks'] = $total_tasks;
			$list['completion_percent'] = round(100 * ($tasks_completed / $total_tasks), 0, ROUND_HALF_EVEN);
			if (!empty($list)) {
				$this->wg->Memc->set($memKey, $list, 3600);
			}

			$this->wf->ProfileOut(__METHOD__ . '::miss');
		}
		$this->response->setVal("list", $list);
		
	}

	/**
	 * @desc
	 * @requestParam int task_id The ID of the task completed
	 * @responseParam string result OK or completed error
	 * @responseParam int tasks_completed number of tasks completed so far
	 * @responseParam int tasks_remaining number of tasks remaining
	 */
	
	public function doTask() {
		$wiki_id = $this->wg->CityId;
		$task_id = $this->request->getVal("task_id");
		// TODO: validate the task_id is not yet completed
		if (! isset($this->counters[$task_id])) {
			$this->setVal('result', 'invalid task_id');
			return true;
		}
		$dbw = wfGetDB(DB_MASTER, array(), $this->wg->ExternalSharedDB);
		$sql = "INSERT INTO founder_progress_bar_tasks 
			SET wiki_id=$wiki_id, 
				task_id=$task_id, 
				task_count=1
			ON DUPLICATE KEY UPDATE task_count = task_count + 1";
		$dbw->query ($sql);
		print_pre($dbw);
		$res = $dbw->select (
				'founder_progress_bar_tasks',
				array('task_id', 'task_count'),
				array('wiki_id' => $wiki_id, 'task_id' => $task_id)
			);
		// TODO: make sure we got a row
		// if ($row...)
		$row = $dbw->fetchRow($res);
		$tasks_completed = $row['task_count'];
		$tasks_remaining = $this->counters[$task_id] - $tasks_completed;

		$this->setVal('tasks_completed', $tasks_completed);
		$this->setVal('tasks_remaining', $tasks_remaining);
		$this->setVal('result', 'OK');
		if ($tasks_remaining <= 0) {
			$dbw->update(
				'founder_progress_bar_tasks',
				array('task_completed' => '1'),
				array('wiki_id' => $wiki_id, 'task_id' => $task_id)
			);
			$this->setVal('result', "completed");
		}
		$dbw->commit();
		// else error
	}
	
	/**
	 * @desc
	 * @requestParam int task_id The ID of the task to skip 
	 * @requestParam int task_skipped 1 to skip, 0 to "un-skip"
	 * @responseParam string result OK or error
	 */
	
	public function skipTask() {
		
		$task_id = $this->request->getVal("task_id");
		$task_skipped = $this->request->getVal("task_skipped");
		//if (empty($task_id)) throw error;
		//if (empty($task_skipped)) throw error;
		
		$dbw = wfGetDB(DB_MASTER, array(), $this->wg->ExternalSharedDB);
		$dbw->update(
			'founder_progress_bar_tasks',
			array(
					'task_skipped' => $task_skipped
			),
			array(
					'task_id' => $task_id,
					'wiki_id' => $this->wg->CityId
			)
		);

		$this->response->setVal("result", "OK");
	}
	
	public function widget() {
		global $wgBlankImgUrl, $IP;
		$this->wg->Out->addStyle(AssetsManager::getInstance()->getSassCommonURL('extensions/wikia/FounderProgressBar/css/FounderProgressBar.scss'));
		$this->wg->Out->addScriptFile($this->wg->ExtensionsPath . '/wikia/FounderProgressBar/js/modernizr.custom.founder.js');
		$this->wg->Out->addScriptFile($this->wg->ExtensionsPath . '/wikia/FounderProgressBar/js/FounderProgressBar.js');
		$this->response->setVal("wgBlankImgUrl", $wgBlankImgUrl);
	}
	
	// Messages defined in i18n file
	// Each message in i18n has a -label -description and -action version
	// This helper function will get the proper message for the proper type
	// If a task has a % at the end of the name then a $1 substitution is done,  
	private function getMsgForTask($task_id, $type) {

		// For development, return placeholder messages if a message is not defined
		if (! isset($this->messages[$task_id]) ) {
			if ($type == "label") return "Task $type";
			if ($type == "description") return "Task $type Placeholder";
			if ($type == "action") return "Call to action Label";
		}

		$messageStr = $this->messages[$task_id];
		if (substr($messageStr, -1) == '%') {
			$number = $this->counters[$task_id];
			$messageStr = "founderprogressbar-". str_replace('%', $number, $messageStr) . "-" . $type;  // Chop off the %
			return wfMsg($messageStr, $number);
		} 
		// Default case
		$messageStr = "founderprogressbar-". $messageStr . "-" . $type;			
		return wfMsg($messageStr);
	}
}
