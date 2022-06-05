<?php
/**
 * 生成二维码
 * Created by PhpStorm.
 * Date: 2019/5/30
 * Time: 11:59
 */
 
namespace app\api\controller;
 
use PHPQRCode\QRcode;
use think\Controller;
 
class Orcode extends Controller
{
    /**
     *
     * 功能：生成二维码    
     * @param string $qrData 手机扫描后要跳转的网址
     * @param string $qrLevel 默认纠错比例 分为L、M、Q、H四个等级，H代表最高纠错能力
     * @param string $qrSize 二维码图大小，1－10可选，数字越大图片尺寸越大
     * @param string $savePath 图片存储路径
     * @param string $savePrefix 图片名称前缀
     */
    function createQRcode($savePath, $qrData = 'PHP QR Code :)', $qrLevel = 'L', $qrSize = 4, $savePrefix = 'qrcode')
    {
        if (!isset($savePath)) return '';
        //设置生成png图片的路径
        $PNG_TEMP_DIR = $savePath;
 
        //检测并创建生成文件夹
        if (!file_exists($PNG_TEMP_DIR)) {
            mkdir($PNG_TEMP_DIR);
        }
        $filename = $PNG_TEMP_DIR . 'qrcode.png';
        $errorCorrectionLevel = 'L';
        if (isset($qrLevel) && in_array($qrLevel, ['L', 'M', 'Q', 'H'])) {
            $errorCorrectionLevel = $qrLevel;
        }
        $matrixPointSize = 4;
        if (isset($qrSize)) {
            $matrixPointSize = min(max((int)$qrSize, 1), 10);
        }
        if (isset($qrData)) {
            if (trim($qrData) == '') {
                die('data cannot be empty!');
            }
            //生成文件名 文件路径+图片名字前缀+md5(名称)+.png
            $filename = $PNG_TEMP_DIR . $savePrefix . md5($qrData . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
            //开始生成
            QRcode::png($qrData, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        } else {
            //默认生成
            QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        }
        if (file_exists($PNG_TEMP_DIR . basename($filename)))
            return basename($filename);
        else
            return FALSE;
    }
 
}