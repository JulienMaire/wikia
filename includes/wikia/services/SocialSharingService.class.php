<?php
/**
 * Helper for generating sharing links for the major Social networks/sites
 * 
 * WARNING: some of the networks have officially deprecated these API's but still support them
 * this is mainly being used by old extensions and the WikiaMobile skin for really
 * good reasons, if you need sharing functionality for Desktop browsers go and check out
 * the ShareButtons extension.
 *
 * @author Federico "Lox" Lucignano <federico(at)wikia-inc.com
 */
class SocialSharingService{
	static private $instanciated = false;
	private $networks;

	function __construct(){
		if ( empty( self::$instanciated ) ){
			self::$instanciated = true;
			F::setInstance( __CLASS__, $this );
			
			$this->register( 'FacebookSharing');
			$this->register( 'TwitterSharing' );
			$this->register( 'PlusoneSharing' );
			$this->register( 'StumbleuponSharing' );
			$this->register( 'RedditSharing' );
			$this->register( 'EmailSharing' );
		}
	}

	/**
	 * @brief retrieves one or more SocialSharing specialized instances
	 *
	 * @param mixed $networkId a string or an array of strings with one or more network id's (lowercase)
	 *
	 * @return Array an array of specialized instances matching only the valid network id's
	 */
	public function getNetworks( $networkId ){
		$ret = array();

		if ( !is_array( $networkId ) ) {
			$networkId = array( $networkId );
		}

		foreach ( $networkId as $n ) {
			$className = ucfirst( $n ) . 'Sharing';

			if ( in_array( $className, $this->networks ) ) {
				$ret[] = F::build( $className );
			}
		}

		return $ret;
	}

	/**
	 * @brief registers a SocialSharing specialization
	 *
	 * @param string $className the specialized class name
	 */
	public function register( $className ) {
		if ( class_exists( $className ) ) {
			$this->networks[] = $className;
		}
	}
}

abstract class SocialSharing{
	protected $urlTemplate;
	protected $id;

	public function getUrl( $link, $text ){
		return str_replace( array( '$1', '$2' ), array( $link, urlencode( $text ) ), $this->urlTemplate );
	}

	public function getId(){
		return $this->id;
	}
}

class FacebookSharing extends SocialSharing{
	function __construct(){
		$this->urlTemplate = 'http://www.facebook.com/sharer.php?u=$1&t=$2';
		$this->id = 'facebook';
	}
}

class TwitterSharing extends SocialSharing{
	function __construct(){
		$this->urlTemplate = 'http://twitter.com/home?status=$1%20$2';
		$this->id = 'twitter';
	}
}

class PlusoneSharing extends SocialSharing{
	function __construct(){
		$this->urlTemplate = 'https://plusone.google.com/_/+1/confirm?hl=' . F::app()->wg->Lang->getCode() . '&url=$1';
		$this->id = 'plusone';
	}
}

class StumbleuponSharing extends SocialSharing{
	function __construct(){
		$this->urlTemplate = 'http://www.stumbleupon.com/submit?url=$1&title=$2';
		$this->id = 'stumbleupon';
	}
}

class RedditSharing extends SocialSharing{
	function __construct(){
		$this->urlTemplate = 'http://www.reddit.com/submit?url=$1&title=$2';
		$this->id = 'reddit';
	}
}

class EmailSharing extends SocialSharing{
	function __construct(){
		$this->urlTemplate = 'mailto:?body=$2%20$1';
		$this->id = 'email';
	}
}