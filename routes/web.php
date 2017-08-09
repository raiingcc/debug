<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/debug', function () {
    return view('debug');
});

Route::post('/debug', function () {
    $secret = 'WNKzlmkPTSa3IjXoYwOMgFnbhqdQ82Jrxivse1B7CLEc5HG6f4UV09AyRtpDuZ';
    $oldBody = request('body');
    $body = json_decode($oldBody);
    if(json_last_error() !== JSON_ERROR_NONE){
        return redirect()->back()->withInput()->withErrors('非法格式！');
    }

    $body->appid = '60737010027846402208556469464350';
    $body->timestamp = time();
    $body->nonce = str_random(64);

    $raw = json_encode($body);
    $signature = base64_encode(hash('sha256', $secret .'&'. $raw));

//    dd($signature,$raw);

    return view('debug', [ 'raw' => $raw, 'body'=>$oldBody, 'signature'=>$signature] );
//    return redirect()->back()->withInput(['raw','body','signature']);
});