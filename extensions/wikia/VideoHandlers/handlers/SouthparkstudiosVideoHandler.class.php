<?php

class SouthparkstudiosVideoHandler extends VideoHandler {
	protected $apiName = 'SouthparkstudiosApiWrapper';
	protected static $aspectRatio = 1.22866894;	// 360 x 293
	protected static $urlTemplate = 'http://media.mtvnservices.com/mgid:cms:item:southparkstudios.com:$1';
	
	public function getEmbed($articleId, $width, $autoplay = false, $isAjax = false) {
		$height = $this->getHeight($width);
		$url = str_replace('$1', $this->getEmbedVideoId(), static::$urlTemplate);
		$autoplayStr = $autoplay ? 'true' : 'false';

		$html = <<<EOT
<embed src="$url" width="$width" height="$height" type="application/x-shockwave-flash" allowFullScreen="true" allowScriptAccess="always" base="." flashVars="autoPlay=$autoplayStr"></embed>
EOT;
		
		return $html;
	}
	
}