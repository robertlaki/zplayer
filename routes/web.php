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
