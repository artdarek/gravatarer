# Gravatarer - Laravel 4 Service Provider
Gravatarer is a simple Gravatar.com service provider for Laravel 4. 

---

A [Gravatar](http://gravatar.com/) is a Globally Recognized Avatar. You upload it and create 
your profile just once, and then when you participate in any Gravatar-enabled site, your 
Gravatar image will automatically follow you there. Gravatar is a free service for site 
owners, developers, and users.

---

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
