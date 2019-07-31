<?php
/**
 * Created by PhpStorm.
 * User: cdjyj21
 * Date: 2018/9/4
 * Time: 11:57
 */
namespace app\auth\controller;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode as QrCodeExt;

use think\Controller;

/**
 * php713
 * php.ini扩展
 * extension=gd
 * extension=iconv
 * composer require endroid/qr-code
 * https://github.com/endroid/qr-code
 */
class Qrcode extends Controller
{
    /**
     * 生成二维码
     * @param  string $text    [字符]
     * @param  [type] $is_save [是否保存]
     * @param  [type] $pid     [唯一标识符]
     * @return [type]          [description]
     */
    public function make_qrcode($text = 'hello 我是稳哥', $is_save = 1, $pid = 0)
    {
        $qrCode = new QrCodeExt($text);
        $a = new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
        $qrCode->setSize(300);
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(10);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel($a);


        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setLogoSize(150, 200);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);
        $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
        // Directly output the QR code
        header('Content-Type: ' . $qrCode->getContentType());
        if ($is_save) {
            // Save it to a file
            $qrCode->writeFile('../runtime/qrcode/qrcode' . $pid . '.png');
        }
        die($qrCode->writeString());
    }
}
