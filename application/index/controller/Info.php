<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use app\auth\controller\Qrcode;
use test\test;
use phpqrcode\qrtest;

// use think\controller\Rest;
// use think\Request;
use think\Db;
// use think\Loader;
// use think\phpqrcode;
class Info extends Controller
{
    public function index(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', 123123);
        return $this->fetch();
    }

    public function divcss()
    {	
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', "divcss");
        return $this->fetch();
    }

    public function javascript(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', "javascript");
        return $this->fetch();
    }

    public function php(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', "php");
        return $this->fetch();
    }

    public  function  server(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', "server");
        return $this->fetch();
    }

    public function git(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', "git");
        return $this->fetch();
    }

    public function internet(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        // dump($list);
        $this->assign('info', "internet");
        return $this->fetch();
    }

}
