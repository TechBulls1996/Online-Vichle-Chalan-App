<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');

$file=time().'.pdf';
$mpdf->Output();
//$mpdf->Output($file,'D');

?>