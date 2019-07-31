<?php
namespace app\auth\controller;

use think\Controller;
use Wechat\Loader;
use think\Db;
class WechatCommon extends Controller
{
    public function initialize()
    {
    	$loader = new Loader();
        $Wechat = $loader->get('Oauth');
        // dump(session('userinfo'));
        // dump(session('subscribe'));
        if(!session('userinfo') || session('subscribe') != 1 ){
            if(!isset($_GET['code'])){
                // $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $url ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                // $get_code_url = $Wechat->getOauthRedirect($url, random(6));
                $get_code_url = $Wechat->getOauthRedirect($url, random(6), 'snsapi_userinfo');
                header("Location:".$get_code_url);
                exit;
            }else{
                $arr = $Wechat->getOauthAccessToken();
                // dump($arr);
                $access_token = $arr["access_token"];
                $openid = $arr["openid"];
                cookie("openid",$openid,7*24*3600);
                $userinfo =$Wechat->getOauthUserInfo($access_token,$openid);
                session('userinfo',$userinfo);
            
            }
        }
        $userinfo = session('userinfo');
        $userinfo['instruct_time'] = time();
        $openid = $userinfo['openid'];
        $v_info = Db::name('user_info')->where("openid='$openid'")->select();
        if(!$v_info){
            unset($userinfo['privilege']);
            $status = Db::name('user_info')->insert($userinfo);
        }

        // $this->assign('userinfo',$userinfo);
        // 判断关注没关注 用户的相信信息
        $User = $loader->get('User');
        $p = $User->getUserInfo($openid);
        session('userinfo',$p);
        session('subscribe',$p['subscribe']);
        $this->assign('userinfo',$p);
    }

}
