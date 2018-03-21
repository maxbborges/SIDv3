<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class LoginController extends AbstractRestfulController
{
  public function create($data){
    require_once 'public/Connection.php';
    $senhas = "select senha from aluno where matricula='".$data['matricula']."';";
    $resposta = pg_fetch_array(pg_exec($conn,$senhas),0,$result_type = PGSQL_ASSOC);

    if(md5($data['senha'])==$resposta['senha']){
      $resposta = true;
    } else {
      $senhas = "select senha from professor where matricula='".$data['matricula']."';";
      $resposta = pg_fetch_array(pg_exec($conn,$senhas),0,$result_type = PGSQL_ASSOC);
      if(md5($data['senha'])==$resposta['senha']){
        $resposta = true;
      } else {
        $resposta = false;
      }
    }

    $response = $this->getResponseWithHeader()->setContent(json_encode($resposta));
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
