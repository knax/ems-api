<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(
    array('prefix' => '/v1', 'before' => 'auth.basic.once'),
    function () {

        Route::get(
            '/',
            [
                'as' => 'homepage',
                'uses' => 'App\\Controller\\v1\\HomepageController@index'
            ]
        );

    }
);

Route::get(
    '/',
    function () {
        return Redirect::route('homepage');
    }
);