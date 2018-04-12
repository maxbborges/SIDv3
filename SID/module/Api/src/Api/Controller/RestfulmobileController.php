<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class RestfulmobileController extends AbstractRestfulController
{
    public function get($id)
    {
        require_once 'public/Connection.php';
        $sql = "select matriculado.id_turma, professor.nome as nome_professor, menssagem.menssagem from aluno inner join matriculado on aluno.matricula=matriculado.matricula_aluno inner join menssagem on matriculado.id_turma=menssagem.id_turma inner join professor on menssagem.id_professor=professor.matricula where aluno.matricula='".$id."' order by menssagem.id_menssagem desc;";
        $res = pg_exec($conn, $sql);

        while ($linha = pg_fetch_array($res, $row = null, $result_type = PGSQL_ASSOC)) {
            $vetor[] = array_map('htmlentities', $linha);
        }
        $response = $this->getResponseWithHeader()->setContent(json_encode($vetor));
        return $response;
    }

    public function getList()
    {
        require_once 'public/Connection.php';
        $sql = "select id_menssagem, matricula as matricula_professor, nome as nome_professor, id_turma,menssagem from menssagem left join professor on professor.matricula=id_professor order by id_menssagem desc;";

        $res = pg_exec($conn, $sql);
        while ($linha = pg_fetch_array($res, $row = null, $result_type = PGSQL_ASSOC)) {
            $vetor[] = array_map('htmlentities', $linha);
        }

        $response = $this->getResponseWithHeader()->setContent(json_encode($vetor));
        return $response;
    }

    // configure response
    public function getResponseWithHeader()
    {
        $response = $this->getResponse();
        $response->getHeaders()
    ->addHeaderLine('Access-Control-Allow-Origin', '*')
    ->addHeaderLine('Access-Control-Allow-Methods', 'POST PUT DELETE GET');

        header('Content-Type: application/json;charset=UTF-8');
        return $response;
    }
}
