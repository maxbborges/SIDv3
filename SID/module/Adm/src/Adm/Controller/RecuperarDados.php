<?php

// error_reporting( E_ALL | E_NOTICE | E_STRICT );
// ini_set( "display_errors" , '1' );
// namespace Adm\Controller;
//
// class RecuperarDados {
  // header('Content-Type: text/html; charset=utf-8');
  //
  // $fbConnect = (new FbConnect())->fbConnect();
  // $fb = $fbConnect['fb'];
  // $infPagina = $fbConnect['infPagina'];
  //
  // $postSelecionado = 1;
  //
  //
  // $response = $fb->get('/415358248866659_434307813638369/comments', $infPagina['tokenPagina']);
  // $comentariosPublicacao = $response->getDecodedBody();
  //
  // $postSelecionado = 0;
  //
  // $infPostagem = array(
  //   'fotoPerfil' => 38,
  //   'nome' => $comentariosPublicacao['data'][$postSelecionado]['from']['name'],
  //   'mensagem' => $comentariosPublicacao['data'][$postSelecionado]['message'],
  //   'datas' => $comentariosPublicacao['data'][$postSelecionado]['created_time']
  // );
  //
  // $jsonString = json_encode($infPostagem);
  // $jsonObj = json_decode($jsonString);
  //
  // //var_dump($jsonObj);
  // echo "aaaa";
  // namespace Adm\Controller;

  // header('Content-Type: text/html; charset=utf-8');

  include("Connection.php");
  if($conn){

    // include("/var/www/html/tcc/SID/module/Adm/src/Adm/Controller/FbConnect.php");
    // if($fbConnect==null){
    // $fbConnect = (new "var/www/html/tcc/SID/module/Adm/src/Adm/Controller/FbConnect()")->Connect();
    //require("/var/www/html/tcc/SID/module/Adm/src/Adm/Controller/FbConnect.php");
    // $xx = new FbConnect;
    //global $fbConnect;

    // $xx->Connect();

    include_once (__DIR__.'/FbConnect.php');
    $fbConnect = (new Adm\Controller\FbConnect())->Connect();

    // $bb = $->Connect();

    $fb = $fbConnect['fb'];
    $infPagina = $fbConnect['infPagina'];



    $query = "SELECT object_id FROM divulgacao WHERE divid = 12";
  	$res = pg_query ( $conn, $query ) or die ( pg_last_error ( $conn ) );
  	$row = pg_fetch_row($res);

    //echo realpath("");
    // require "autoload.php";
    // include_once (__DIR__.'/FbConnect.php');
    // $fbConnect = new \Adm\Controller\FbConnect();
    // $fbConnect = (new __DIR__.FbConnect())->Connect();


    $response = $fb->get('/'.$row[0].'/comments', $infPagina['tokenPagina']);
    $comentariosPublicacao = $response->getDecodedBody();

    $postSelecionado = 0;

    $infPostagem = array(
      'fotoPerfil' => 38,
      'nome' => $comentariosPublicacao['data'][$postSelecionado]['from']['name'],
      'mensagem' => $comentariosPublicacao['data'][$postSelecionado]['message'],
      'datas' => $comentariosPublicacao['data'][$postSelecionado]['created_time']
    );

    // $jsonString = json_encode($infPostagem);
    // $jsonObj = json_decode($jsonString);



    echo json_encode($comentariosPublicacao['data']);






  	// readfile("imagens/".$row[0].".png");



    // echo "<script>console.log(".$aa.");</script>";
    // echo $aaa->['fb'];

    // echo "aa";


    // $aa = Connect();

    //$bb = new $FbConnect();

    // echo $aa['fb'];
    // $bb = $aa.Connect();
    // echo realpath(__DIR__.'/FbConnect.php');
    // Connect();
    pg_close();
  }else{
    echo "Erro ao carregar Lista de Imagens";
  }
//  }
?>
