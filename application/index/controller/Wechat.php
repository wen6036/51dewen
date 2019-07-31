<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use app\auth\controller\WechatCommon;
use Wechat\Loader;
use Wechat\Lib\Common;
use Wechat\Lib\Cache;

//集成wechatcommon必须是微信网页 不能用于异步请求
class Wechat extends WechatCommon
{
    public function index(){
        // $userinfo = session('userinfo');
        // $this->assign('userinfo',$userinfo);
        // dump($userinfo);
        return view();
    }




    

}
