<?php

use Illuminate\Http\Response;

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

Route::get('/', function () {      // get방식, url : / ,
    // 익명함수, callback, closure

    return view('welcome');
    //return "테스트"


});


Route::get('hello', function() {
    return "안녕하세요";
});



Route::get('hello/yjc', function() {
    return "박성원". "입니다";
});


//Route에서 값전달 방법
Route::get('hello/{name}', function($na) {
    return "안녕..." . $na;
});


//Route::get('hello/yjc', function() {
//    return "테스트" . "영진전문대학";
//});


//Route에서 값전달 방법: default값 설정
Route::get('hello2/{name?}', function($na=null) {
    return "안녕2..." . $na;
});//->where(['name' => '정규표현식']);


//Route::get('test/php{name?}', function($name='Test') {
//    $res = new Response('안녕하세요.' . $name, 200);
//    $res->header('Content-Type', 'text/plain');
//    return $res;
//});


//클래스
Route::get('test/php1{name?}' , function($name='parksungwon') {
    return response('곤니치와' . $name, 200)
        ->header('Content-Type', 'text/plain'); // 200 <- 성공의 의미
});


Route::get('test/php{name?}' , function($name = 'test') {
    return response('hello'.$name,200)
        ->header('Content-Type', 'text/plain')
        ->header('Cache-control' , 'max-age=' . 60*60 . 'must-revalidate');
});


Route::get('test/josn' , function() {
   $data = ['name'=>'김종율', 'gender'=>'남자']; //json의 php 표현법
    return response() -> jsoin($data);
});


Route::get('test/heredoc' , function() {

    $content = <<<HTML
    <!doctype html>
    <html>
    <head>
    <title>박성원</title>
    <meta charset="UTF-8">               
    </head>
    <body>
      <h1>박성원</h1>
      <h1>과연</h1>
      
    </body>
    </html>
HTML;
    return $content;
});



//Route::get('' , function(){});
Route::get('test/heredoc1', function() {
    return View::make('test.heredoc');
});


Route::get('test/heredoc2' , function() {
    return view('test.heredoc1');
});


Route::get('test/compact' , function() {
   $task = ['name'=>'할일1', 'due_date'=>'2017-02-08 15:22:32'];
   return view('test.view'. compact($task));
});


Route::get('test/with' , function () {
    $task = ['name'=>'할일1', 'due_date'=>'2017-02-08 15:30:31'];
    return view('test.view')->with('task', $task);
});

// return view('test.view')->with('task', $task)
//                         ->with('users' , $user)
//                         ->with('testinfo', $testinfo);


Route::get('test/alert' , function () {
    $task = [
        'name'=>'라라벨에게 작성',
             'due_date'=>'2017-02-09 14:30:31',
             'comment'=>'<script>location.href="http:://www.daum.net";</script>'
              // XSS (Cross Site Scripting)을 방지하기 위해서
              // blade 사용이 권장됨
              // blade 사용 안하는 경우 : htmlentities() <--- &lt;
              // 새너타이징 (Sanitizing, 소독)
            ];
    return view('test.alert')->with('task', $task);
});



