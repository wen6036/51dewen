<?php
namespace app\admin\controller;
use think\Controller;
use think\View;
use think\controller\Rest;
use think\Request;
use think\Db;
use think\Loader;
class Article extends Common
{
    //列表页面
    public  function artlist(){
        return view();
    }
    //添加文章
    public  function  article_add(){
    	if(input()){
    		$data = input();
    		$data['create_time'] = time();
            if($_POST['titleimg']){
                $data['titleimg'] = basepic($_POST['titleimg']); 
            }
    		$res = Db::name('article')->insert($data);
    		if($res){
    			return json(array('code' => 1));
    		}else{
    			return json(array('code' => 0));
    		}
    	}else{
            $res = Db::name('classification')->where('type=1')->select();
            $this->assign('info',$res);
	    	return $this->fetch();
    	}
    }

    //请求列表
    public  function article(){
        $cur = input('get.cur');
        $cur = !empty($cur) ? $cur : 1;
        $size = input("get.size");
        $size = !empty($size) ? $size : 10;
        $key = input("get.key");
        if($key){
            $where = "title LIKE '%$key%'" ;
        }else{
            $where="";
        }
        $data['data'] = Db::name('article')->where($where)->field('id,title,FROM_UNIXTIME(create_time) as create_time,description,leclass')->order("id desc")->page($cur, $size)->select();
    	$data['count'] = Db::name('article')->where($where)->count();
        return json($data);
    }
    //添加分类
    public function addclass(){
        $_POST['type'] = 1;
        $res = Db::name('classification')->insert($_POST);
        // echo Db::name('classification')->getLastSql();
        if($res){
            return json(['msg'=>'添加成功']);
        }else{
            return json(['msg'=>'添加失败']);
        }
    }
    //分类列表
    public function artclass(){
        $res = Db::name('classification')->where('type=1')->select();
        // dump($res);
        $this->assign('info',$res);
        return $this->fetch();

    }
    //删除分类
    public function del_artclass(){
        $id = input("post.id");
        $res = Db::name('classification')->where('id',$id)->delete();
        if($res){
            return json(array('code' => '1','msg'=>'删除成功' ));
        }else{
            return json(array('code' => '0','msg'=>'删除失败' ));
        }       
    }
    public function res_artclass(){
        $id = input('post.id');
        $res = Db::name('classification')->where('id='.$id)->find();
        // echo Db::name('classification')->getLastSql();
        return json($res);
       
    }
    public function edit_artclass(){
        $id = input('post.id');
        if($id){
            $res = Db::name('classification')->where('id',$id)->setField('classname',input('post.classname'));
            if($res){
                return json(['msg'=>'更新成功']);
            }else{
                return json(['msg'=>'更新失败']);
            }        
        }else{
            $_POST['type'] = 1;
            $res = Db::name('classification')->insert($_POST);
            if($res){
                return json(['msg'=>'添加成功']);
            }else{
                return json(['msg'=>'添加失败']);
            }             
        }    
    }
}