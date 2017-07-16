<?php

Route::group(
    [
        'middleware' => ['web'],
        'prefix' => 'subschannels/{userId}',
        'where' => ['userId' => '[0-9]+'],
        'namespace' => 'Serega170584\Subschannels\Http\Controllers'],
    function ()
    {

        Route::get('/', ['as' => 'subschannels.index', 'uses' => 'SubschannelsController@index']);

    }
);

Route::group(
    [
        'middleware' => ['web'],
        'prefix' => 'subschannels/update/{userId}',
        'namespace' => 'Serega170584\Subschannels\Http\Controllers'],
    function ()
    {

        Route::put('/', ['as' => 'subschannels.update', 'uses' => 'SubschannelsController@update']);

    }
);

