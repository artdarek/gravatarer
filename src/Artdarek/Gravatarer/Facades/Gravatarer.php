<?php namespace Artdarek\Gravatarer\Facades;

use Illuminate\Support\Facades\Facade;

class Gravatarer extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'gravatarer'; }

}