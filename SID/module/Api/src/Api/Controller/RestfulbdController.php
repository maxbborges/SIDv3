<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class RestfulbdController extends AbstractRestfulController
{

  public function get($id){
    $response = $this->getResponseWithHeader()->setContent(__METHOD__.'ira buscar id='.$id);
    return $response;
  }

  public function getList(){
    // Realiza a conexão com o banco e pega todas as colunas do banco.
    require_once 'public/Connection.php';
    $sql = "select * from divulgacao order by divid";
    $res = pg_exec($conn, $sql);

    $sql1 = "select tokenpagina,app_id,app_secret,default_graph_version from config";
    $result = pg_exec($conn, $sql1);
    $resultado = pg_fetch_array($result,$row = NULL, $result_type = PGSQL_ASSOC);

    $infPagina['tokenPagina'] = $resultado['tokenpagina'];

    $newFacebook = array(
      'app_id' => $resultado['app_id'], //id do aplicativo do SID
      'app_secret' => $resultado['app_secret'], // Senha do aplicativo SID
      'default_graph_version' => $resultado['default_graph_version'], // Versão da Graph API
    );

    // Faz a leitura de cada linha recuperada do banco
    while($linha = pg_fetch_array($res,$row = NULL, $result_type = PGSQL_ASSOC)){
      // Verifica a data de termino e de inicio de cada linha recuperada do banco.
      // Caso a linha esteja fora do prazo, ela é ignorada.
      if(date('Y-m-d')<$linha['datatermino']&&date('Y-m-d')>$linha['datainicio']){
        // Verifica se a o DIVID não é zero.
        // A posicao 0 é destinada a publicação fixa, não possuindo Comentarios.
        if ($linha['divid']!=0){

          // Requisita os paramentros de conexão com o facebook e faz a conexão.
          $fb = new \Facebook\Facebook($newFacebook);
          $imagem = ($fb->get('/'.$linha['object_id'].'?fields=images', $infPagina['tokenPagina']))->getDecodedBody();

          // Recupera todos os comentarios da publicação, usando o object_id de cada uma.
          $comentarios = ($fb->get('/'.$linha['object_id'].'/comments', $infPagina['tokenPagina']))->getDecodedBody();

          // Percorre todos os comentarios recuperados.
          for($i=0; $i<count($comentarios['data']); $i++){

            // Recupera todas os likes da publicação
            $likes = ($fb->get('/'.$comentarios['data'][$i]['id'].'/likes', $infPagina['tokenPagina']))->getDecodedBody();

            // Percorre todos os likes feitos na publicação
            for($cont=0;$cont<count($likes['data']);$cont++){


              $sqlx = "select fbid from adm";
              $result = pg_exec($conn, $sqlx);
              while($linhaAdm=pg_fetch_array($result)){
                if($likes['data'][$cont]['id']==$linhaAdm[0]){
                  $urlFoto = ($fb->get("/".$comentarios['data'][$i]['from']['id']."/?fields=picture.type(large)", $infPagina['tokenPagina']))->getDecodedBody();
                  $url['urlFoto'] = $urlFoto['picture']['data']['url'];
                  $arrayComentarios[] = array_merge($comentarios['data'][$i], $url);
                  break;
                }
              }

              if($arrayComentarios!=null){
                break;
              }




              // Verifica se a publicação possui o like do administrador.
              // Caso não possua, a publicação não é exibida.
              // if($likes['data'][$cont]['id']=="1371436046298678"){
              //   $urlFoto = ($fb->get("/".$comentarios['data'][$i]['from']['id']."/?fields=picture.type(large)", $infPagina['tokenPagina']))->getDecodedBody();
              //   $url['urlFoto'] = $urlFoto['picture']['data']['url'];
              //   $arrayComentarios[] = array_merge($comentarios['data'][$i], $url);
              // }
            }
          }
        }

        $infobd = array(
          'linkqr' => $linha['linkqr'],
          'legenda' => $linha['legenda'],
        );

        // Cria um Array com as informaçoes recuperadas.
        $json[] = array(
          'bd' => $infobd, // Informaçoes do Banco
          'comentarios' => $arrayComentarios, // Informaçoes do Face
          'imagem' => $imagem['images'][0]['source'],
          // 'imagem' => base64_encode(file_get_contents($infPagina['destinoLocal'].$linha['object_id'].".png")), // base64 da imagem armazenada localmente
        );

        $arrayComentarios=null;
      }
    }

    $json = json_encode($json); // Transforma o Array em JSON
    $response = $this->getResponseWithHeader()->setContent($json);
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

  public function getResponseWithHeader(){
    $response = $this->getResponse();
    $response->getHeaders()
    ->addHeaderLine('Access-Control-Allow-Origin','*')
    ->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');

    header('Content-Type: application/json;charset=UTF-8');
    return $response;
  }


}
