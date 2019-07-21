<?php

namespace Ensensis\LaravelBac\Facades;

use Illuminate\Support\Facades\Facade;


class BAC extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'bac';
    }

}