<?php

require_once 'Connection.php'; 

$id = $_GET['divid'];

if ($conn) {

	$query = "SELECT object_id FROM divulgacao WHERE divid =".$id;
	$res = pg_query ( $conn, $query ) or die ( pg_last_error ( $conn ) );
	$row = pg_fetch_row($res);
	readfile("imagens/".$row[0].".png");

	pg_close ( $conn );
} else {
	echo "Erro ao tentar conectar com banco de dados!";
}
?>
