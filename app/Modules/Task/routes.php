<?php
$namespace = 'App\Modules\Task\Controller';
use Illuminate\Support\Facades\Route;
Route::group(
    ['module'=>'Task', 'namespace' => $namespace , 'middleware' => ['web']],
    function() {
        Route::get('task','TaskController@index')->name('list-task');
        Route::get('task-detail','TaskController@index')->name('task-detail');


    }
);
