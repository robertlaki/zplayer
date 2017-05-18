<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->get('/', 'VideoController@play');
$app->post('/savevideo', 'VideoController@saveVideo');
$app->post('/removevideo', 'VideoController@removeVideo');
$app->post('/empty', 'VideoController@emptyQue');
$app->get('/get/next', function() {
    return json_encode(\App\Video::getNextVideo());
});
$app->get('/get/current', function() {
    return json_encode(\App\Video::getCurrent());
});
$app->get('/get/que', function() {
    return json_encode(\App\Video::getVideoQue());
});
