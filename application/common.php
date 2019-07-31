<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
error_reporting(E_ERROR | E_PARSE );
function random($length = 6, $numeric = 0)//random() 函数返回随机整数。
{
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if ($numeric) {
        $hash = sprintf('%0' . $length . 'd', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}

//树状图
function arrtree($list, $id = 'id', $pid = 'pid', $son = 'sub')
{
    $tree = $map = array();
    foreach ($list as $item) {
        $map[$item[$id]] = $item;
    }
    foreach ($list as $item) {
        if (isset($item[$pid]) && isset($map[$item[$pid]])) {
            $map[$item[$pid]][$son][] = &$map[$item[$id]];
        } else {
            $tree[] = &$map[$item[$id]];
        }
    }
    unset($map);
    return $tree;
}

// base64保存到本地图片
function basepic($img, $fileurl = '') //保存base图片
{
    if ($fileurl) {
        $fileurl = 'Upload/'.$fileurl.'/';
    } else {
        $fileurl = 'Upload/Web/';
    }
    if (!file_exists($fileurl)) {
        mkdir("$fileurl", 0777, true);
    }
    // $img = isset($img ? $img : '';
    list($type, $data) = explode(',', $img);
    if (strstr($type, 'image/jpeg') !== '') {
        $ext = '.jpg';
    } elseif (strstr($type, 'image/gif') !== '') {
        $ext = '.gif';
    } elseif (strstr($type, 'image/png') !== '') {
        $ext = '.png';
    }
    $photo = time() . implode(array_rand(range(1, 30), 5)) . $ext;
    $re = file_put_contents($fileurl . $photo, base64_decode($data), true);
//    var_dump($re);
    if ($re) {
        return $fileurl . $photo;
        // echo $photo;
    } else {
        // echo "请重试";
        return false;
    }
}

/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0,$adv=false) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if($adv){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}
function getIPaddress(){
        $IPaddress='';
        if (isset($_SERVER)){
            if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
                $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $IPaddress = $_SERVER["HTTP_CLIENT_IP"];
            } else {
                $IPaddress = $_SERVER["REMOTE_ADDR"];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")){
                $IPaddress = getenv("HTTP_X_FORWARDED_FOR");
            } else if (getenv("HTTP_CLIENT_IP")) {
                $IPaddress = getenv("HTTP_CLIENT_IP");
            } else {
                $IPaddress = getenv("REMOTE_ADDR");
            }
        }
        return $IPaddress;
    }


//获去浏览器
function getBrowser(){
    $agent=$_SERVER["HTTP_USER_AGENT"];
    if(strpos($agent,'MSIE')!==false || strpos($agent,'rv:11.0')) //ie11判断
    return "ie";
    else if(strpos($agent,'Firefox')!==false)
    return "firefox";
    else if(strpos($agent,'Chrome')!==false)
    return "chrome";
    else if(strpos($agent,'Opera')!==false)
    return 'opera';
    else if((strpos($agent,'Chrome')==false)&&strpos($agent,'Safari')!==false)
    return 'safari';
    else
    return 'unknown';
}

 function taobaoIP($clientIP){
        $taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
        $IPinfo = json_decode(file_get_contents($taobaoIP));
        $province = $IPinfo->data->region;
        $city = $IPinfo->data->city;
        $data = $province.$city;
        return $data;
    }

/**
 * 记录日志输出文件，用于程序无法在浏览器打印调试时调用
 * @param  $output 输出的变量信息
 * @param  $filename 文件名
 * @param  $suffix 文件后缀名
 * @return 
 */
function recordLog($output, $filename="", $suffix = ".log")
{
    $logUrl = "../runtime/Logs/Debug/";
    $filename == "" && $filename = date('ymd');

    !is_dir($logUrl) && mkdir($logUrl , 0777 , true);

    $head_str = '['.date('H:i:s').'] '.ucfirst(gettype($output))."\r\n";

    !is_string($output) && $output = var_export($output, true);

    file_put_contents($logUrl.$filename.$suffix , $head_str.$output."\r\n" ,FILE_APPEND);
}

