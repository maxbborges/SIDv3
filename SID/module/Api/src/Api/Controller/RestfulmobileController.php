<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class RestfulmobileController extends AbstractRestfulController
{

  public function get($id){
    require_once 'public/Connection.php';
    $sql = "select aluno.matricula, aluno.nome as nome_aluno, matriculado.id_turma, professor.nome as nome_professor, menssagem.menssagem from aluno inner join matriculado on aluno.matricula=matriculado.matricula_aluno inner join menssagem on matriculado.id_turma=menssagem.id_turma inner join professor on menssagem.id_professor=professor.matricula where aluno.matricula='".$id."'";
    $res = pg_exec($conn, $sql);
    while($linha = pg_fetch_array($res,$row = NULL, $result_type = PGSQL_ASSOC)){
      $vetor[] = array_map('htmlentities', $linha);
    }
    $json = json_encode($vetor);


    $response = $this->getResponseWithHeader()->setContent($json);
    return $response;
  }

  public function getList(){
    require_once 'public/Connection.php';

    $sql = "select matricula,id_turma,menssagem,nome from menssagem left join professor on professor.matricula=id_professor order by matricula;";
    $res = pg_exec($conn, $sql);
    while($linha = pg_fetch_array($res,$row = NULL, $result_type = PGSQL_ASSOC)){
      $vetor[] = array_map('htmlentities', $linha);
    }

    $json = json_encode($vetor);
    $response = $this->getResponseWithHeader()->setContent($json);
    return $response;
  }

  public function create($data){
    require_once 'public/Connection.php';
    $sql = "insert into menssagem values ('".$data['id_professor']."','".$data['id_turma']."','".$data['menssagem']."');";
    $res = pg_query($sql);

    if (!$res) {
      $response = $this->getResponseWithHeader()
      ->setContent(json_encode('Não Inserido'));
      return $response;
    } else {
      $response = $this->getResponseWithHeader()
      ->setContent(json_encode('Inserido com sucesso!'));
      return $response;
    }
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
    ->addHeaderLine('Access-Control-Allow-Origin','*')
    ->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');

    header('Content-Type: application/json;charset=UTF-8');
    return $response;
  }

}
