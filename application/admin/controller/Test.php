<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\Request;
use think\Db;
use think\Loader;
class Test extends Controller
{
    public function index(){
    	echo 'test';
    }
    //测试
    public  function user(){
        //引入extend里面的类
        $extend = new \mytest\Test();
        echo $extend->index();
    }
}