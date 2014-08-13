<?php namespace Artdarek\Gravatarer;

class Gravatarer {

	/**
	 * User email address
	 *
	 * @var string
	 */
	protected $_email = '';

	/**
	 * Size of avatar in pixels
	 * defaults to 80px [ 1 - 2048 ]
	 *
	 * @var string
	 */
	protected $_size = 80;

	/**
	 * Default imageset to use
	 * Url to your default avatar image or [ 404 | mm | identicon | monsterid | wavatar ]
	 * defaults to 'mm'
	 *
	 * @var string
	 */
	protected $_defaultImage = 'mm';

	/**
	 * Ratings
	 * Maximum rating (inclusive) [ g | pg | r | x ]
	 *
	 * @var string
	 */
	protected $_rating = 'g';

	/**
	 * Secured (https)
	 * If not set - autodetect
	 *
	 * @var boolean
	 */
	protected $_secured;

	/**
	 * Generated avatar url is saved in this variable
	 *
	 * @var string
	 */
	protected $_url = '';

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
	public function user( $email )
	{
		$this->_email = $email;
		$this->_url = $this->make()->url();
		return $this;
	}

	/**
	 * Set size of avatar
	 * defaults to 80px [ 1 - 2048 ]
	 *
	 * @param  int $size
	 * @return Gravatarer $this
	 */
	public function size( $size = 80 )
	{
		$this->_size = $size;
		$this->_url = $this->make()->url();
		return $this;
	}

	/**
	 * Set rating of avatar
	 * Maximum rating (inclusive) [ g | pg | r | x ]
	 *
	 * @param  string $size
	 * @return Gravatarer $this
	 */
	public function rating( $rating = 'g')
	{
		$this->_rating = $rating;
		$this->_url = $this->make()->url();
		return $this;
	}

	/**
	 * Set defaut avatar image
	 * Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 *
	 * @param  string $size
	 * @return Gravatarer $this
	 */
	public function defaultImage( $defaultImage = 'mm')
	{
		$this->_defaultImage = $defaultImage;
		$this->_url = $this->make()->url();
		return $this;
	}

	/**
	 * Set https
	 *
	 * @param  boolean
	 * @return Gravatarer $this
	 */
	public function secured( $isSecured = false )
	{
		$this->_secured = $isSecured;
		$this->_url = $this->make()->url();
		return $this;
	}

	/**
	 * Make gravatar url
	 * You can pass just email as a string to this method than
	 * gravatar will be generated with default settings
	 * or also u can pass more parameters as array (email|size|default|rating)
	 *
	 * @param  string|array $params
	 * @return Gravatar $this
	 */
	public function make( $params = null )
	{
		// check if array has been passed
		if (is_array($params))
		{
			if ( isset($params['email']) ) $this->_email = $params['email'];
			if ( isset($params['size']) ) $this->_size = $params['size'];
			if ( isset($params['defaultImage']) ) $this->_defaultImage = $params['defaultImage'];
			if ( isset($params['rating']) ) $this->_rating = $params['rating'];
			if ( isset($params['secured']) ) $this->_secured = $params['secured'];
		}
		else
		{
			// if string was given assume that it is email
			if ($params != null ) $this->_email = $params;
		}

		// create gravatar url
	    $url = $this->getBaseUrl();
	    $url .= md5( strtolower( trim( $this->_email ) ) );
	    $url .= "?s=".$this->_size."&d=".$this->_defaultImage."&r=".$this->_rating;

	    // save created gravatar url
	    $this->_url = $url;

	    // return url
    	return $this;
	}

	/**
	 * Get base url
	 *
	 * @return string $url
	 */
	public function getBaseUrl()
	{
		if ($this->_secured === true) $protocol = 'https:';
		elseif ($this->_secured === false) $protocol = 'http:';
		else $protocol = '';

		$url = $protocol.'//www.gravatar.com/avatar/';
		return $url;
	}

	/**
	 * Get created gravatar url as a string
	 *
	 * @return string $gravatar
	 */
	public function url()
	{
		// get created gravatar
		$url = $this->_url;

		// return gravatar
		return $url;
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
		$url = $this->_url;;

		// make html code
        $html = '<img src="' . $url . '"';

        foreach ( $attributes as $key => $val ) {
            $html .= ' ' . $key . '="' . $val . '"';
        }

        $html .= ' />';

        // return
    	return $html;
	}

}