<?php namespace Artdarek\Gravatarer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class GravatarerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('artdarek/gravatarer');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	    // Register 'gravatarer' instance container to our 'Gravatarer' object
		    $this->app['gravatarer'] = $this->app->share(function($app)
		    {

                // create new instance
                	$gravatarer = new Gravatarer();

        		// return gravatarer
		        	return $gravatarer;

		    });

	    // Shortcut so developers don't need to add an Alias in app/config/app.php
		    $this->app->booting(function()
		    {
		        $loader = AliasLoader::getInstance();
		        $loader->alias('Gravatarer', 'Artdarek\Gravatarer\Facades\Gravatarer');
		    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}