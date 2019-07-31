<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\Request;
use think\Db;
use think\Loader;
class User extends Common
{
	public function index(){
		$list = Db::name('admin_user')->select();
		dump($list);
		return $this->fetch();
	}
	public function rec_user(){
		echo "rec_user";
	}
	public function bac_user(){
		echo "bac_menu";
	}
	
}