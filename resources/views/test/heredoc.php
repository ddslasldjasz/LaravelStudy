<?php
/**
 * Created by PhpStorm.
 * User: mycom
 * Date: 2017-02-08
 * Time: 오후 2:54
 */




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
    </body>
    </html>
HTML;
    return $content;
});