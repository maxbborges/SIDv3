<?php
namespace Adm\Controller;
    header('Content-Type: application/json');
    include_once (__DIR__.'/FbConnect.php');
    $fbConnect = (new FbConnect())->Connect1();
    $fb = $fbConnect['fb'];
    $infPagina = $fbConnect['infPagina'];

    $response = $fb->get('/'.$object_id.'/comments', $infPagina['tokenPagina']);
    // $response = $fb->get('/'.$row[0].'/comments', $infPagina['tokenPagina']);
    $comentariosPublicacao = $response->getDecodedBody();

    $cont=rand ( 0 , ((count($comentariosPublicacao['data']))-1) );
    $uid =$comentariosPublicacao['data'][$cont]['from']['id'];
    $response1 = $fb->get('/'.$uid.'/?fields=picture.type(large)', $infPagina['tokenPagina']);
    $urlFoto = $response1->getDecodedBody();

    // for($cont = 0; $cont<(count($comentariosPublicacao['data']));$cont++){
      $infPostagem = array(
        'fotoPerfil' => $urlFoto['picture']['data']['url'],
        'nome' => $comentariosPublicacao['data'][$cont]['from']['name'],
        'mensagem' => $comentariosPublicacao['data'][$cont]['message'],
        'datas' => $comentariosPublicacao['data'][$cont]['created_time']
      );

    echo json_encode($infPostagem);

?>
