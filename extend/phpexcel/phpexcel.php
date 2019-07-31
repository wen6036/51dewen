<?php
/**
 *  简单实用Execl
 */
           
set_include_path('.'.get_include_path().PATH_SEPARATOR.dirname(__FILE__).'/PHPExecl/');
/* @func 引入类 */
require './Classes/PHPExcel.php';
           
//模拟数据
$mulit_arr = array(
    array('标题1', '标题2', '标题3'),
    array('a', 'b', 'c'),
    array('d', 'e', 'f')
);
/* @实例化 */
$obpe = new PHPExcel();
           
/* @func 设置文档基本属性 */
$obpe_pro = $obpe->getProperties();
$obpe_pro->setCreator('midoks')//设置创建者
         ->setLastModifiedBy('2013/2/16 15:00')//设置时间
         ->setTitle('data')//设置标题
         ->setSubject('beizhu')//设置备注
         ->setDescription('miaoshu')//设置描述
         ->setKeywords('keyword')//设置关键字 | 标记
         ->setCategory('catagory');//设置类别
           
           
/* 设置宽度 */
//$obpe->getActiveSheet()->getColumnDimension()->setAutoSize(true);
//$obpe->getActiveSheet()->getColumnDimension('B')->setWidth(10);
           
//设置当前sheet索引,用于后续的内容操作
//一般用在对个Sheet的时候才需要显示调用
//缺省情况下,PHPExcel会自动创建第一个SHEET被设置SheetIndex=0
//设置SHEET
$obpe->setactivesheetindex(0);

           
//创建一个新的工作空间(sheet)
$obpe->createSheet();
$obpe->setactivesheetindex(1);
//写入多行数据
foreach($mulit_arr as $k=>$v){
    $k = $k+1;
    /* @func 设置列 */
    $obpe->getactivesheet()->setcellvalue('A'.$k, $v[0]);
    $obpe->getactivesheet()->setcellvalue('B'.$k, $v[1]);
    $obpe->getactivesheet()->setcellvalue('C'.$k, $v[2]);
}
           
//写入类容
$obwrite = PHPExcel_IOFactory::createWriter($obpe, 'Excel5');
//ob_end_clean();
//保存文件
$obwrite->save('文件名称.xls');
           
//or 以下方式
/*******************************************
            直接在浏览器输出
*******************************************/
/**
header('Pragma: public');
header('Expires: 0');
header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
header('Content-Type:application/force-download');
header('Content-Type:application/vnd.ms-execl');
header('Content-Type:application/octet-stream');
header('Content-Type:application/download');
header("Content-Disposition:attachment;filename='mulit_sheet.xls'");
header('Content-Transfer-Encoding:binary');
$obwrite->save('php://output');
?>
*/
?>