<?php
   	header('Content-Type: text/html; charset=utf-8');

    include("Connection.php");

    if($conn){
    	$vetor = null;
        $sql = "SELECT * FROM divulgacao;";

        $res = pg_exec($conn, $sql);
        // pegar linha por linha da query
        while($linha = pg_fetch_array($res)){
            // esse joga o diretorio em um vetor no formato json
            $vetor[] = array_map('htmlentities', $linha); 
        }

        if($vetor != null){
            echo json_encode($vetor);
        }else{
             echo "";
        }

    	pg_close();
    }else{
    	echo "Erro ao carregar Lista de Imagens";
    }

?>
