<?php
include ('../vendor/phpqrcode/qrlib.php');

$link = $_GET ['link'];
QRcode::png ( "$link" );
