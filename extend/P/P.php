<?php

namespace P;

use PHPQRCode\QRcode;

class P
{
    public static function create()
    {
        QRcode::png('微信支付12元','./tmp/1.png','L',4,2);
    }
}