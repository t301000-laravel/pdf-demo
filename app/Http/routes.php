<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $users = collect([
        ['name' => '黃小保'],
        ['name' => '許小誠'],
        ['name' => '葉大雄'],
    ]);
//    dd($users);
    return view('pdf-templates.certificate', compact('users'));
});

Route::get('export', function () {
    $users = collect([
        ['name' => '黃小保'],
        ['name' => '許小誠'],
        ['name' => '葉大雄'],
    ]);

    $view = view('pdf-templates.certificate', compact('users'));

    return $view;
});