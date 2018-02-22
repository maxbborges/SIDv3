<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class RestfulbdController extends AbstractRestfulController
{

  public function get($id){
    // Faz a conexão com o banco, requisita somente a linha especifica e armazena na variavel $linhaBanco
    require_once 'public/Connection.php';
    $sql = "select * from divulgacao order by divid";
    $res = pg_exec($conn, $sql);
    while($linha = pg_fetch_array($res,$row = NULL, $result_type = PGSQL_ASSOC)){
      $vetor[] = array_map('htmlentities', $linha);
    }

    $linhaBanco = $vetor[$id];

    // Requisita os arquivos de configuração da pagina e do Facebook.
    if ($id != 0){
      require_once (__DIR__.'/Configure1.php');
      $configure = new Configure();
      $infPagina = $configure->infPagina();
      $fb = new \Facebook\Facebook($configure->newFacebook());

      // Requisita todos os comentarios da publicação.
      $comentariosPublicacao = ($fb->get('/'.$linhaBanco['object_id'].'/comments', $infPagina['tokenPagina']))->getDecodedBody();

      if ($comentariosPublicacao['data']!= null){
        $comentario=rand (0,((count($comentariosPublicacao['data']))-1));

        // Recupera as informaçoes especificas do comentario.
        $uid = $comentariosPublicacao['data'][$comentario]['from']['id'];
        $urlFoto = ($fb->get('/'.$uid.'/?fields=picture.type(large)', $infPagina['tokenPagina']))->getDecodedBody();

        $infPostagem = array(
          'fotoPerfil' => $urlFoto['picture']['data']['url'],
          'nome' => $comentariosPublicacao['data'][$comentario]['from']['name'],
          'mensagem' => $comentariosPublicacao['data'][$comentario]['message'],
          'datas' => $comentariosPublicacao['data'][$comentario]['created_time'],
        );
      }

    }

    // Cria um Array com as informaçoes
    $json = array(
      'comentario' => $infPostagem,
      'imagem' => [base64_encode(file_get_contents("./public/imagens/".$linhaBanco['object_id'].".png"))],
      'BD' => $linhaBanco,
      'quantidade' => count($vetor),
      'posicao' => $novaPosicao
    );

    // Transforma o Array em JSON
    $json = json_encode($json);
    $response = $this->getResponseWithHeader()->setContent($json);
    return $response;
  }

  public function getList(){
    $posicao = 1;
    require_once 'public/Connection.php';
    $sql = "select * from divulgacao order by divid";
    $res = pg_exec($conn, $sql);

    while($linha = pg_fetch_array($res,$row = NULL, $result_type = PGSQL_ASSOC)){
      if ($linha['divid']!=0){
        require_once (__DIR__.'/Configure1.php');
        $configure = new Configure();
        $infPagina = $configure->infPagina();
        $fb = new \Facebook\Facebook($configure->newFacebook());
        $comentarios = ($fb->get('/'.$linha['object_id'].'/comments', $infPagina['tokenPagina']))->getDecodedBody();

      }
      $json[$posicao] = array(
        'bd' => $linha,
        'comentarios' => (empty($comentarios)) ? null : $comentarios['data'],
      );
      $posicao++;
    }

    $json = json_encode($json);
    $response = $this->getResponseWithHeader()
    ->setContent($json);
    return $response;
  }

  public function create($data){
    $response = $this->getResponseWithHeader()
    ->setContent( __METHOD__.' ira criar');
    return $response;
  }

  public function update($id, $data){
    $response = $this->getResponseWithHeader()
    ->setContent(__METHOD__.'ira atualiza') ;
    return $response;
  }

  public function delete($id){
    $response = $this->getResponseWithHeader()
    ->setContent(__METHOD__.'ira deletar') ;
    return $response;
  }

  // configure response
  public function getResponseWithHeader(){
    $response = $this->getResponse();
    $response->getHeaders()
    //make can accessed by *
    ->addHeaderLine('Access-Control-Allow-Origin','*')
    //set allow methods
    ->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');

    header('Content-Type: application/json;charset=UTF-8');
    return $response;
  }


}
