<?php
$namespace = 'App\Modules\Auth\Controller';

use Illuminate\Support\Facades\Route;


Route::group(
    ['module'=>'Auth', 'namespace' => $namespace],
    function() {
        Route::post('/login','AuthController@login')->name('login');
    }
);
