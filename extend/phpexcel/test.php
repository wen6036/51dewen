<?php 
require_once './Classes/PHPExcel.php';
// https://blog.csdn.net/pengone/article/details/47724423    实例
//首先创建一个新的对象  PHPExcelobject
$objPHPExcel = new PHPExcel();

//设置文件的一些属性，在xls文件——>属性——>详细信息里可以看到这些值，xml表格里是没有这些值的
$objPHPExcel
      ->getProperties()  //获得文件属性对象，给下文提供设置资源
      ->setCreator( "MaartenBalliauw")             //设置文件的创建者
      ->setLastModifiedBy( "MaartenBalliauw")       //设置最后修改者
      ->setTitle( "Office2007 XLSX Test Document" )    //设置标题
      ->setSubject( "Office2007 XLSX Test Document" )  //设置主题
      ->setDescription( "Test document for Office2007 XLSX, generated using PHP classes.") //设置备注
      ->setKeywords( "office 2007 openxmlphp")        //设置标记
      ->setCategory( "Test resultfile");                //设置类别
// 位置aaa *为下文代码位置提供锚
//给表格添加数据
$objPHPExcel->setActiveSheetIndex(0)             //设置第一个内置表（一个xls文件里可以有多个表）为活动的
           ->setCellValue( 'A1', 'Hello' )       //给表的单元格设置数据
           ->setCellValue( 'B2', 'world!' )      //数据格式可以为字符串
           ->setCellValue( 'C1',12)            //数字型
           ->setCellValue( 'D2',12)            //
           ->setCellValue( 'D3', true )           //布尔型
           ->setCellValue( 'D4', '=SUM(C1:D2)' );//公式

//得到当前活动的表,注意下文教程中会经常用到$objActSheet
$objActSheet =$objPHPExcel->getActiveSheet();
// 位置bbb *为下文代码位置提供锚
//给当前活动的表设置名称
$objActSheet->setTitle('Simple2222');
// 代码还没有结束，可以复制下面的代码来决定我们将要做什么

// 1 直接生成一个文件
// $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// $objWriter->save('myexchel.xlsx');


// 2、提示下载文件
// excel 2003 .xls
//生成2003excel格式的xls文件
// header('Content-Type:application/vnd.ms-excel');
// header('Content-Disposition:attachment;filename="01simple.xls"');
// header('Cache-Control:max-age=0');

// $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// $objWriter->save('php://output');
// exit;

// excel 2007 .xlsx
//生成2007excel格式的xlsx文件
// header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition:attachment;filename="01simple.xlsx"');
// header('Cache-Control:max-age=0');

// $objWriter =PHPExcel_IOFactory:: createWriter($objPHPExcel, 'Excel2007');
// $objWriter->save( 'php://output');
// 
// pdf 文件
// 下载一个pdf文件
// header('Content-Type:application/pdf');
// header('Content-Disposition:attachment;filename="01simple.pdf"');
// header('Cache-Control:max-age=0');

// $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
// $objWriter->save('php://output');
 

// CSV文件
// $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV')->setDelimiter(',' ) //设置分隔符
//    ->setEnclosure('"' )  //设置包围符
//    ->setLineEnding("\r\n" )//设置行分隔符
//    ->setSheetIndex(0)      //设置活动表
//    ->save(str_replace('.php' , '.csv' ,__FILE__));


// HTML文件
// $objWriter =PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');       //将$objPHPEcel对象转换成html格式的
// $objWriter->setSheetIndex(0);  //设置活动表
// //$objWriter->setImagesRoot('http://www.example.com');
// $objWriter->save(str_replace('.php', '.htm',__FILE__));     //保存文件
// 
// 设置表格样式和数据格式
// 设置默认的字体和文字大小   锚：aaa
// $objPHPExcel->getDefaultStyle()->getFont()->setName( 'Arial');
// $objPHPExcel->getDefaultStyle()->getFont()->setSize(20);
 
 
 
// 设置列的宽度     锚：bbb
$objActSheet->getColumnDimension( 'B')->setAutoSize(true);   //内容自适应
$objActSheet->getColumnDimension( 'A')->setWidth(30);        //30宽