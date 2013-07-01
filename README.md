# Gravatarer - Laravel 4 Service Provider
Gravatarer is a simple Gravatar.com service provider for Laravel 4. 

---

A [Gravatar](http://gravatar.com/) is a Globally Recognized Avatar. You upload it and create 
your profile just once, and then when you participate in any Gravatar-enabled site, your 
Gravatar image will automatically follow you there. Gravatar is a free service for site 
owners, developers, and users.

---

- [Instalation](#instalation)
- [Registering the Package](#registering-the-package)
- [Usage](#usage)

## Installation

Add Gravatarer to your composer.json file:

```
"require": {
  "artdarek/gravatarer": "dev-master"
}
```

Use [composer](http://getcomposer.org) to install this package.

    composer update

### Registering the Package

Add the Gravatarer Service Provider to your config in ``app/config/app.php``:

```php
'providers' => array(
	'Artdarek\Gravatarer\GravatarerServiceProvider'
),
```

### Usage

To get url of avatar image just pass user email as a first and the only one parameter:

```
<?php

	// user email
	$email = "example@user.email";
	
	// get avatar
	$avatar = Gravatarer::get( $email );
    
?>
```

If you want to specify size of the image you can use:

```
<?php

	// user email
	$email = "example@user.email";
	
	// Size in pixels, defaults to 80px [ 1 - 2048 ]
	$size = 80;
	
	
	// get avatar 
	$avatar = Gravatarer::get( $email, $size );

?>
```

U can aslo use some other parameters:

```
<?php

	// user email
	$email = "example@user.email";
	
	// Size in pixels, defaults to 80px [ 1 - 2048 ]
	$size = 80;
	
	// Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	$defaultImage = 'mm';
	
	// Maximum rating (inclusive) [ g | pg | r | x ]
	$rating = 'g'
	
	// get avatar 
	$avatar = Gravatarer::get( $email, $size, $defaultImage, $rating );

?>
```

### Usage - make() method

Basic way to generate gravatar url is just to call make() method with 
user email address as a parameter (all other parameters will be loaded from defaults). 

```
<?php

	// create a gravatar object for specified email
 	$gravatar = Gravatarer::make( $email );
	 
	 // get gravatar url as a string
	$url = $gravatar->url();
	
	 // get gravatar <img> html code
	$html = $gravatar->html();

?>
```

U can aslo chain methods:

```
<?php

	$url = Gravatarer::make( $email )->url();
	
?>
```

### Usage - user() method

```
<?php

// user() method

	// user email
		$email = "example@user.email";
	
	// create a gravatar object for specified email
	 	$gravatar = Gravatarer::user( $email );
	 
	 // get gravatar url as a string
		$url = $gravatar->url();
	
	 // get gravatar <img> html code
		$html = $gravatar->html();
	
?>
```
