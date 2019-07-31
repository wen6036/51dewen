<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\Request;
use think\Db;
use think\Loader;
/**
* 
*/
class Common extends Controller
{
	
	public function initialize()
	{
    	header("Access-Control-Allow-Origin: *");
		$userinfo = session('Userinfo');
		$data['username'] = $userinfo;
		$data['session_id'] = session_id();
		$res = DB::name('admin_user')->where($data)->select();
		if(!$userinfo){
			$this->redirect('admin/Login/index');	
		}

        // $controller = request()->controller().'/'.request()->action();
        // if($controller != "Index/index" && request()->isAjax()==false){
        //     exit('页面不存在');
        // }

		if(!$res){
			$this->success('账号在别处登入，请从新登录','admin/Login/index');	
		}
	}
	public function miss(){
		return view('public/miss');
	}


}