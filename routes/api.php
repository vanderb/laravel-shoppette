<?php


// API Routes
Route::group([
        'prefix' => 'api/shoppette/',
        'middleware' => ['laravelShoppette'],
        'as.' => 'api.shoppette'
    ],
    function(){
    
    });