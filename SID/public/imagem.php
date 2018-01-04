<?php

require_once 'Connection.php';

$id = $_GET['divid'];

if ($conn) {

	$query = "SELECT object_id FROM divulgacao WHERE divid =".$id;

	$res = pg_query ( $conn, $query ) or die ( pg_last_error ( $conn ) );

	$row = pg_fetch_row($res);

	// $name = $row[0].".png";

	$teste1 = "imagens/".$row[0].".png";
	//$teste = "/imagens/".$row[0].".png";
	// return $teste;
	// $teste = "https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/19702411_1290395001069450_5097736575801189523_n.jpg?oh=b527ae34484db745f70b65c1bae81a69&oe=5AF82C68";
//echo $teste;
//echo "<img src=".$teste.">";


// echo $teste;

// var_dump($teste);

//header ('content-type: image/png');
readfile($teste1);


//$json = json_decode(file_get_contents('./imagens/'.$row[0].'.php'));
// $im = file_get_contents('./imagens/'.$row[0].'.php');
// header('content-type: image/png');
//echo file_get_contents('./imagens/'.$row[0].'.php');


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
