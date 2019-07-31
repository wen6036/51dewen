<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use app\auth\controller\Qrcode;
use think\Request;
class Wxplp extends Controller
{
    //二维码
    public function index()
    {	
        $arr = [1,2,3];
        return json($arr);
    }

}
