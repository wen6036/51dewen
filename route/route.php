<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
Route::rule('new/:id','index/News/read'); //http://serverName/index/news/read/id/5
Route::get('hello/:name', 'index/hello');

// 给User控制器设置快捷路由 但指向里面得get post方法!见手册
// Route::controller('redis','index/Redis');

// 控制器别名指向控制器 后面可以直接加类名
// Route::alias('admin','admin/index/index');
Route::alias('redis','index/Redis');
Route::alias('resume','index/resume');
Route::alias('test','index/test');
return [

];
