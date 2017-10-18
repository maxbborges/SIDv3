<?php

require_once 'Connection.php';

$id = $_GET['divid'];

if ($conn) {
	
	$query = "SELECT imagem FROM divulgacao WHERE divid = ".$id;
	
	$res = pg_query ( $conn, $query ) or die ( pg_last_error ( $conn ) );
	
	header ( 'Content-type: image/jpeg' );
	
	$data = pg_fetch_result ( $res, 'imagem' );
	
	$unes_image = pg_unescape_bytea ( $data );
	
	echo "$unes_image";
	
	pg_close ( $conn );
} else {
	echo "Erro ao tentar conectar com banco de dados!";
}
?>

