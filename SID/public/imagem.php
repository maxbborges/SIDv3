<?php

require_once 'Connection.php';

$id = $_GET['divid'];

if ($conn) {

	$query = "SELECT object_id FROM divulgacao WHERE divid = 2";

	$res = pg_query ( $conn, $query ) or die ( pg_last_error ( $conn ) );

	$row = pg_fetch_row($res);

	//header ( 'Content-type: image/png' );
	$teste = "/var/www/html/tcc/SID/public/imagens/".$row[0].".png";
	//echo "/var/www/html/tcc/SID/public/imagens/".$row[0].".png";
	echo $teste;



	//echo '/var/www/html/tcc/SID/public/imagens/'.$row[0].'.png';



	//header ( 'Content-type: text/html' );
	// $data = pg_fetch_result ( $res, 'object_id' );
	// $imagedata = file_get_contents("/var/www/html/tcc/SID/public/imagens/425328364536314.png");
  // $base64 = base64_encode($imagedata);
	//
	// header ( 'Content-type: image/png' );
	// $unes_image = pg_unescape_bytea ( $base64 );
	// //
	// // 					 echo $unes_image;
	// //
	// //$src = 'data: '.mime_content_type($imagedata).';base64,'.$base64;
	// echo $unes_image;
	//echo '<img src="'.$src.'">';



	//echo '<img src="/var/www/html/tcc/SID/public/imagens/425328364536314.png" />';

	pg_close ( $conn );
} else {
	echo "Erro ao tentar conectar com banco de dados!";
}
?>
