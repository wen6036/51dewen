<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use app\auth\controller\Qrcode;
// use think\controller\Rest;
// use think\Request;
// use think\Db;
// use think\Loader;
// use think\phpqrcode;
class Test extends Controller
{
    //二维码
    public function index()
    {	
        return view();
    }

    public function qrcode(){
        $a = new Qrcode;
        $a->make_qrcode();        
    }

    public function get_main(){
        $data = input('post.data');
        return $this->fetch($data);
    }
    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
    public function test(){
    }
}
