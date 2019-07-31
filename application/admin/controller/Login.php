<?php 
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\facade\Request;
use think\Db;
use think\Loader;
class Login extends Controller
{
    public function index(){
        return view();
    }
    public function register(){
    	return view();
    }
    public function login_check(){

        $User = Db::name('admin_user');
        $con['username'] = input('post.username');
        $con['password'] = md5(input('post.password'));
        $info = $User->where($con)->select();

        if(!$info){
            return json(array('code' =>0,'msg'=>'用户名或密码错误','session'=>session('Userinfo') ));
        }else{
            session(null);
            session_regenerate_id(true); 
            $session_id = session_id();
            session('Userinfo',input('post.username'));
            $this->add_log();
            $info = $User->where($con)->data(['session_id'=>$session_id])->update();
            if($info){
                return json(array('code' =>1,'msg'=>'登录成功','session'=>session_id() ));
            }else{
                return json(array('code' =>0,'msg'=>'登录失败','session'=>session_id() ));
            }
           
            
        }
    }
    public function login_out(){
        session(null);
        $this->success('退出成功','index');
    }
    public function add_log(){
        $data['ip']  = request()->ip();
        $data['brower'] = getBrowser();
        $data['user'] = session('Userinfo');
        $data['country'] = taobaoIP(getIPaddress());
        $data['login_time'] = time();
        Db::name('admin_log')->insert($data);
        $len = time() - 60 * 60 * 24 * 30;
        Db::name('admin_log')->where("login_time<$len")->delete();//删除三十天之前的数据
    }



}



