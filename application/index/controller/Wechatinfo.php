<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use Wechat\Loader;
use Wechat\Lib\Common;
use Wechat\Lib\Cache;

//集成wechatcommon必须是微信网页 不能用于异步请求
class Wechatinfo extends Controller
{

    //菜单
    public function menu(){
        $loader = new Loader();
        $menu = $loader->get('Menu');
        $jsonmenu = '{
                "button": [

                    {
                        "type": "view", 
                        "name": "我的博客", 
                        "url": "http://www.wangdewen1992.cn"
                     },


                    {
                        "type": "view", 
                        "name": "百度", 
                        "url": "http://www.baidu.com"
                    }, 
                    {
                        "name": "娱乐专享", 
                        "sub_button": [
                            {
                                "type": "view", 
                                "name": "爱奇艺视频", 
                                "url": "http://www.iqiyi.com/"
                            }, 
                            {
                                "type": "view", 
                                "name": "搞笑小段子", 
                                "url": "https://www.qiushibaike.com/"
                            },{    
                                "type":"click",
                                "name":"今日歌曲",
                                "key":"V1001_TODAY_MUSIC"
                            },
                                              
                            {
                                "type": "scancode_waitmsg", 
                                "name": "扫码带提示", 
                                "key": "rselfmenu_0_0", 
                                "sub_button": [ ]
                            }

                        ]
                    }
                ]
        }';
        dump($menu->createMenu($jsonmenu));
    }




    

}
