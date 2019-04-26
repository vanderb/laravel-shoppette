<?php


// Admin Routes
Route::group([
        'prefix' => config('laravel-shoppette.admin-route-prefix'),
        'middleware' => ['auth'],
        'as.' => 'admin.laravel-shoppette'
    ],
    function(){
        
    });
    

