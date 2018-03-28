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
    return view('welcome',['website'=>'laravel 自我学习']);
});


Route::get('user/{id}', function($id){
    return 'User '.$id;
});

Route::get('posts/{post}/comments/{comment}', function($postId , $commentId){
    return $postId .'_'.$commentId;
});


//Route::get('users/{name?}', function($name='John'){
//    return $name;
//});

//正则约束
//可以通过路由实例上的 where 方法来约束路由参数的格式。where 方法接收参数名和一个正则表达式来定义该参数如何被约束

Route::get('users/{name}',function($name){
    return $name;
    //name必须是字母且不能为空
})->where('name', '\w+');

Route::get('user/{id}/{name}',function($id, $name){
    return 'user_id:'. $id .' => user_name:'.$name;
})->where(['id'=>'\d+' , 'name'=>'\w+']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bridge', function() {
    $pusher = \Illuminate\Support\Facades\App::make('pusher');
    $pusher->trigger( 'my-channel',
        'my-event',
        ['text' => 'I Love China!!!']
    );
    return 'This is a Laravel Pusher Bridge Test!';
});


Route::get('/order/{id}', 'OrderController@orderInfo')->name('order');

Route::get('contact', function() {
    return View::make('contact');
});
Route::post('contact', 'EnquiryController@index');

