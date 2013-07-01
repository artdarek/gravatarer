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
- [Generating gravatar url by user() method](#generating-gravatar-url-by-user-method)
- [Generating gravatar url by make() method](#generating-gravatar-url-by-make-method)
- [Generating HTM avatar code](#generating-htm-avatar-code)
- [Usage: get() method (depreciated)](#usage-get-method-depreciated)

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


#### Generating gravatar url by user() method

Generating avatar with default settings is very simple and all you have to do is to call 
``user()`` method with user email as a paramterer:

```
<?php
	// user email
	$email = "example@user.email";
	
	// create a gravatar object for specified email
 	$gravatar = Gravatarer::user( $email );
	 
	 // get gravatar url as a string
	$url = $gravatar->url();
	
?>
```

If you want to customize avatar a little bit you can set some more parameters using additional methods 
like ``size()``, ``rating()``, ``defaultImage()``. 

```
<?php
	// user email
	$email = "example@user.email";
	
	// create a gravatar object for specified email with additional settings
 	$gravatar = Gravatarer::user( $email );
 	
 	// Size in pixels, defaults to 80px [ 1 - 2048 ]
	$gravatar->size('220'); 
	
	// Maximum rating (inclusive) [ g | pg | r | x ]	
	// defaults to 'g'
	$gravatar->rating('g');
	
	// Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	// You can also specify url to your own default avatar image
	// defaults to 'mm'
	$gravatar->defaultImage('mm');
	
	// get gravatar url as a string
	$url = $gravatar->url();

?>
```

U can also chain all methods:

```
<?php
 	$url = Gravatarer::user( $email )->size('220')->rating('g')->defaultImage('mm')->url();
?>
```


#### Generating gravatar url by make() method

Basic way to generate gravatar url is just to call ``make()`` method with 
user email address as a parameter (all other parameters will be loaded from defaults). 

```
<?php
	// user email
	$email = "example@user.email";
	
	// create a gravatar object for specified email
 	$gravatar = Gravatarer::make( $email );
	 
	 // get gravatar url as a string
	$url = $gravatar->url();
	
?>
```

U can aslo chain methods:

```
<?php
	// to get url string
	$url = Gravatarer::make( $email )->url();
?>
```

If you want specify size of avatar or some other additional parameters you can do this 
by passing array with parameters to ``make()`` method:

```
<?php
	// user email
	$email = "example@user.email";
	
	// create a gravatar object in specified size
 	$url = Gravatarer::make( ['email' => $email, 'size' => 220] )->url();

	// create a gravatar object with some other additional parameters
 	$url = Gravatarer::make( [
 		'email' => $email, 
 		'size' => 220, 
 		'defaultImage' => 'mm',
 		'rating' => 'g',
 	])->url();
?>
```


#### Generating HTM avatar code

With Gravatarer you can get url string of user avatar by calling ``url()`` method 
but also you can generate full html <img> code by calling ``html()`` method instead of ``url()``. 
	
```
<?php
	// user email
	$email = "example@user.email";
	
	// create some gravatarer object 
 	$gravatar = Gravatarer::user( $email )->size('120');
 	
	 // get gravatar <img> html code
	$html = $gravatar->html();
?>
```

If you want to have more controll over 
the returned html code you can pass some additional html attributes to html() method, for examle:

```
<?php
	$html = Gravatarer::user( $email )->html( ['class' => 'avatar', 'id' => 'user123' ] );
?>
```

#### Usage: get() method (depreciated)

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

