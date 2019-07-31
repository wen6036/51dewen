<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use app\auth\controller\WechatCommon;
use Wechat\Loader;
use Wechat\Lib\Common;
use Wechat\Lib\Cache;

// 填写的URL需要正确响应微信发送的Token验证
class Wechatvalid extends Controller
{
    public function valid(){
        $wechat = new Common();
        $wechat->valid();
    }



    

}
