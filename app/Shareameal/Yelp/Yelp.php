<?php namespace Shareameal\Yelp;

use Illuminate\Support\Facades\Facade;

class Yelp extends Facade{

    public static function getFacadeAccessor(){
        return 'yelp';
    }// what is the name of the binding

}
