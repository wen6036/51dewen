<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\Request;
use think\Db;
use think\Loader;
class Index extends Common
{
    public function index(){
        $list = Db::name('menu_set')->select();
        $list = arrtree($list);
        $this->assign('list',$list);    	
        return view('index');
    }
    public function index_v1(){
        $list = Db::name('menu_set')->select();
        $list = arrtree($list);
        $this->assign('list',$list);   	
        return view('index_v1');
    }
}
