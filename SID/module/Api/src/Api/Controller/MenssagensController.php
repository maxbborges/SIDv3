<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class MenssagensController extends AbstractRestfulController
{

  public function get($id){
    require_once 'public/Connection.php';
    $sql = "select * from menssagem where id_menssagem='".$id."';";
    $res = pg_exec($conn, $sql);

    $response = $this->getResponseWithHeader()->setContent(json_encode(pg_fetch_array($res,0,$result_type = PGSQL_ASSOC)));
    return $response;
  }

  public function getList(){

    // Realiza a conexão com o banco e pega todas as colunas do banco.
    require_once 'public/Connection.php';
    $sql = "select * from menssagem order by id_menssagem;";
    $res = pg_exec($conn, $sql);

    // Faz a leitura de cada linha recuperada do banco
    while($linha = pg_fetch_array($res,$row = NULL, $result_type = PGSQL_ASSOC)){
      $vetor[] = $linha;
    }

    $response = $this->getResponseWithHeader()->setContent(json_encode($vetor));
    return $response;
  }

  public function create($data){
    require_once 'public/Connection.php';
    $sql = "insert into menssagem (id_professor,id_turma,menssagem) values ('".$data['matricula']."','".$data['id']."','".$data['menssagem']."');";
    $res = pg_query($sql);

    if(pg_last_error($conn) == ""){
      $resposta = true;
    } else {
      $resposta = pg_last_error($conn);
    }


    $response = $this->getResponseWithHeader()->setContent(json_encode($resposta));
    return $response;
  }

  public function update($id, $data){
    require_once 'public/Connection.php';
    $sql = "update menssagem SET id_turma = '".$data['id']."', menssagem = '".$data['menssagem']."' where id_menssagem = '".$id."';";
    $res = pg_exec($conn,$sql);

    if(pg_last_error($conn) == ""){
      $resposta = true;
    } else {
      $resposta = pg_last_error($conn);
    }

    $response = $this->getResponseWithHeader()
    ->setContent(json_encode($resposta));
    return $response;
  }

  public function delete($id){
    require_once 'public/Connection.php';
    $sql = "delete from menssagem where id_menssagem = '".$id."';";
    $res = pg_exec($conn,$sql);

    if(pg_result_status($res) == 1){
      $resposta = true;
    } else {
      $resposta = pg_last_error($conn);
    }

    $response = $this->getResponseWithHeader()
    ->setContent(json_encode($resposta));
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
