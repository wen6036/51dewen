<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use test\test;
use alipay\Alipay;
use think\Db;

class Alipaytest extends Controller
{
    public function index()
    {	
    	// echo 123;
        return view();
    }

    public function pageorder(){
    	$alipay = new AliPay();
    	// dump($alipay);
    	$alipay->order(1,2,0.01,'123123121231214123');

    }

    
   
}
