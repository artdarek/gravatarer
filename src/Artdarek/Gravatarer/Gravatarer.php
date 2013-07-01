<?php namespace Artdarek\Gravatarer;

class Gravatarer {

	/**
	 * User email address
	 * 
	 * @var string
	 */
	private $email = '';

	/**
	 * Size of avatar in pixels
	 * defaults to 80px [ 1 - 2048 ]
	 * 
	 * @var string
	 */
	private $size = '80';

	/**
	 * Default imageset to use
	 * Url to your default avatar image or [ 404 | mm | identicon | monsterid | wavatar ]
	 * defaults to 'mm'
	 * 
	 * @var string
	 */
	private $defaultImage = 'mm';

	/**
	 * Ratings
	 * Maximum rating (inclusive) [ g | pg | r | x ]
	 * 
	 * @var string
	 */
	private $rating = 'g';

	/**
	 * Generated avatar is saved in this variable
	 * 
	 * @var string
	 */
	private $gravatar = '';

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() { }

	/**
	 * Set user email
	 * 
	 * @param  string $email
	 * @return Gravatarer $this
	 */
	public function user( $email ) {

		$this->email = $email;

		$this->gravatar = $this->make();

		return $this;
	}

	/**
	 * Set size of avatar
	 * defaults to 80px [ 1 - 2048 ]
	 * 
	 * @param  int $size
	 * @return Gravatarer $this
	 */
	public function size( $size = '80' ) {
		$this->size = $size;
		$this->gravatar = $this->make();		
		return $this;
	}

	/**
	 * Set rating of avatar
	 * Maximum rating (inclusive) [ g | pg | r | x ]
	 * 
	 * @param  string $size
	 * @return Gravatarer $this
	 */
	public function rating( $rating = 'g') {
		$this->rating = $rating;
		
		$this->gravatar = $this->make();		
		return $this;
	}

	/**
	 * Set defaut avatar image
	 * Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * 
	 * @param  string $size
	 * @return Gravatarer $this
	 */
	public function zdefaultImage( $defaultImage = 'mm') {
		$this->defaultImage = $defaultImage;
		
		$this->gravatar = $this->make();		
		return $this;
	}

	/**
	 * Make gravatar url
	 * You can pass just email as a string to this method than
	 * gravatar will be generated with default settings
	 * or also u can pass more parameters as array (email|size|default|rating)
	 * 
	 * @param  string|array $params 
	 * @return string $url
	 */
	public function make( $params = null ) {

		// check if array has been passed 
			if (is_array($params)) 
			{
				if ( isset($params['email']) ) $this->email = $params['email'];
				if ( isset($params['size']) ) $this->size = $params['size'];
				if ( isset($params['defaultImage']) ) $this->defaultImage = $params['defaultImage'];	
				if ( isset($params['rating']) ) $this->rating = $params['rating'];
			}
			else 
			{	
				// if string was given assume that it is email
				if ($params != null ) $this->email = $params;
			}

		// create gravatar url
		    $url = 'http://www.gravatar.com/avatar/';
		    $url .= md5( strtolower( trim( $this->email ) ) );
		    $url .= "?s=".$this->size."&d=".$this->defaultImage."&r=".$this->rating;

	    // save created gravatar
		    $this->gavatar = $url;

	    // return url 
        	return $url;
	}
	
	/**
	 * Get created gravatar url
	 * 
	 * @return string $gravatar
	 */
	public function url() {

		// get created gravatar
			$gravatar = $this->gravatar;
		// return gravatar
    		return $gravatar;
	}

	/**
	 * Get html tag <img> with generated gravatar 
	 * 
	 * @param array $attributes html attributes to add to generated code
	 * @return string $html
	 */
	public function html( $attributes = array() ) 
	{

		// make avatar url first
			$url = $this->gravatar;

		// make html code
	        $html = '<img src="' . $url . '"';

	        foreach ( $attributes as $key => $val ) {
	            $html .= ' ' . $key . '="' . $val . '"';
	        }

	        $html .= ' />';

        // return 
        	return $html;
	}


	/** Depreciated ******************************************************************** */

	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	public function get( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
	    $url = 'http://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}

}