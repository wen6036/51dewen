<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use app\auth\controller\Qrcode;
// use test\test;
use phpqrcode\qrtest;

use app\index\controller\Info;
// use think\controller\Rest;
// use think\Request;
use think\Db;
// use think\Loader;
// use think\phpqrcode;
class Index extends Controller
{
    public function index()
    {	
        dump($_SERVER['HTTP_HOST']);
        // echo 123;exit;
        // echo  phpinfo();exit;
        // extend里面的二维码
        // $myFoo=new Qrtest;
        // echo $myFoo->msg_qrcode();exit();
        // auth里面的二维码 第三方composer下载的 
        // $a = new Qrcode;
        // $a->make_qrcode(); 
 
        // $list = Db::name('menu_set')->select();
        // $list = arrtree($list);
        // dump($list);




        // redis()->set('task_num_1',3);//helper.php文件写里面写入的redis函数，即读取extend里面module写redis.php
        // $num = redis()->get('task_num_1');
        // $list = DB::name('classification')->where('type=1')->select();
        // $this->assign('list',$list);

        // $a = new Info;
        // $info = $a->index();
        // $this->assign('info', $info);
        // $this->info();
        // return view();
    }

    public function info(){
        $list = DB::name('classification')->where('type=1')->select();
        $this->assign('list',$list);
        $this->assign('info', 123123);
        
        return $this->fetch();
    }
    public function  imgupload(){
        return $this->fetch();
    }

    public function softdown(){
        return $this->fetch();
    }

    public function percollect(){
        return $this->fetch();
    }

    public function introduction(){
        return $this->fetch();
    }

    public function contact(){
        return $this->fetch();
    }


    

}
