<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\Request;
use think\Db;
use think\Loader;
class System extends Common
{
    public  function menu(){
        $list = Db::name('menu_set')->select();
        $list = arrtree($list);         
        $this->assign('list',$list);
        return $this->fetch();
    }

    //添加菜单页面
    public function addMenu(){
        $info = array('id'=>'','title'=>'','href'=>'','icon'=>'','level'=>'','pid'=>'','model_id'=>'');

        $list = Db::name('menu_set')->select();
        $list = arrtree($list);         
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('list',$list);

        return $this->fetch('add_menu');
    }

    //编辑菜单
    public function edit_menu(){
        $id = input('id');

        $info = Db::name('menu_set')->where('id='.$id)->find();

        $list = Db::name('menu_set')->select();
        $list = arrtree($list);         
        $this->assign('list',$list);
        $this->assign('info',$info);
        return $this->fetch('add_menu');
    }
    //编辑添加菜单 表单提交
    public function add_menu(){
        if(input('post.id')){
            $data=input();
            $res = Db::name('menu_set')->where(['id'=>input('post.id')])->update($data);
            if($res){
                $info['code'] = 1;
                $info['msg'] = '更新成功';
                return json($info);              
            }else{
                $info['code'] = 0;
                $info['msg'] = '更新失败';
                return json($info);                
            }
        }else{
            $data=input();
            $data['status'] = 1;
            $menuId = Db::name('menu_set')->insert($data);
            if($menuId){
                $info['code'] = 1;
                $info['msg'] = '成功';
                return json($info);              
            }else{
                $info['code'] = 0;
                $info['msg'] = '失败';
                return json($info);                
            }       
        }
    }
    // 删除指定菜单
    public function del_menu(){
        $id = input("post.id");
        $res = Db::name('menu_set')->where('id',$id)->delete();
        if($res){
            return json(array('code' => '1','msg'=>'删除成功' ));
        }else{
            return json(array('code' => '0','msg'=>'删除失败' ));
        }
    }

    //日志列表
    public  function ope_log(){
        $loglist = Db::name('admin_log')->field('id,brower,ip,country,user,internet,from_unixtime(login_time) as login_time')->paginate(10);
        // dump($loglist);
        $page = $loglist->render();
        $this->assign('loglist',$loglist);
        $this->assign('page',$page);
        return view();
    }

    //个人信息
    public function info(){
        // dump(session('Userinfo'));
        $name = session('Userinfo');
        $info = Db::name('admin_user')->where("username='$name'")->find();
        $this->assign('info',$info);
        dump($info);
        return view();
    }

    public  function add_info(){
        $arr = Request()->param();
        $id = $arr['id'];
        $password = $arr['password'];
        $status = Db::name('admin_user')->where("id=$id")->update($arr);
        if($status){
                return json(array('code' => '1','msg'=>'更改成功' ));
            }else{
                return json(array('code' => '0','msg'=>'更改失败' ));
            }
    }



    public function group(){
        $info = Db::name('admin_groups')->select();
        $this->assign('info',$info);
        return view();
    }
    public function group_add(){
        if(Request()->isAjax()){
            $data = input('post.');
            $status = Db::name('admin_groups')->insert($data);
            if($status){
                return json(array('code' => '1','msg'=>'添加成功' ));
            }
        }else{
            return view();
        }
    }
    public function group_edit(){
        if(Request()->isAjax()){
            $data = input('post.');
            $status = Db::name('admin_groups')->where('id',input('post.id'))->update($data);
            if($status){
                return json(array('code' => '1','msg'=>'编辑成功' ));
            }
        }else{
            $info = Db::name('admin_groups')->where('id='.Request()->param('id'))->find();
            // dump($info);
            $this->assign('info',$info);
            return view();
        }
    }
    public function access(){
        // dump(Request()->param('id'));
        $id = input();
        // dump($id);
        $id = $id['id'];
        $list = Db::name('menu_set')->select();
        $list = arrtree($list);     
        $info = Db::name('admin_groups')->where("id=$id")->select();
        $arr = explode(',',$info[0]['rules']);
        foreach ($list as $key => $value) {
            if(!$value['sub']){
                if(in_array($value['id'],$arr)){
                    $list[$key]['rules_status']=1;
                }else{
                    $list[$key]['rules_status']=0;
                }
            }else{
                if(in_array($value['id'],$arr)){
                    $list[$key]['rules_status']=1;
                }else{
                    $list[$key]['rules_status']=0;
                }
                foreach ($value['sub'] as $ke => $val) {
                    if(in_array($val['id'],$arr)){
                        $list[$key]['sub'][$ke]['rules_status']=1;
                    }else{
                        $list[$key]['sub'][$ke]['rules_status']=0;
                    }
                }

            }
        } 
        $this->assign('id',Request()->param('id'));
        $this->assign('list',$list);
        return view();
    }
    public function del_group(){
        $data = Request()->param();
        if($domain = strstr($data['id'], ',')){
            $arr = explode(',',$data['id']);
            $status = Db::name('admin_groups')->delete($arr);
            if($status){
                return json(array('code' =>1,'msg'=>'删除成功' ));
            }else{
                return json(array('code' =>0,'msg'=>'删除失败' ));
            }
        }else{
            $id = $data['id'];
            $status = Db::name('admin_groups')->delete($id);
            if($status){
                return json(array('code' =>1,'msg'=>'删除成功' ));
            }else{
                return json(array('code' =>0,'msg'=>'删除失败' ));
            }
        }

    }


}
