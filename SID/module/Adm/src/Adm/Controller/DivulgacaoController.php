<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;


class DivulgacaoController extends AbstractActionController
{
  // se for clicado no botão home, a rota será listar: http://IP:porta/adm/divulgacao/listar
  public function listarAction(){
    // Usando o Doctrine para fazer conexão, recupera as DIVID's presentes no BANCO
    // listando todas as publicaçoes presentes, ordenando-as pelo seu divId
    $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    $query = $em->createQuery('SELECT d.divId FROM Adm\Entity\Divulgacao d order by d.divId');
    $divs = $query->getResult();

    // Apresenta na tela cada uma das publicaçoes.
    return new ViewModel(array(
      'divulgacoes' => $divs
    ));
  }

  // INSERIR NO FACEBOOK E NO BANCO DE DADOS
  public function inserirAction(){
    $sessao = new Container ( 'Auth' );

    if ($this->getRequest()->isPost()) {
      // Recupera os parâmetros do HTML (module/Adm/view/adm/divulgacao/inserir.phtml)
      $legenda = $_POST ['legenda'];
      $textoPublicacao = $_POST ['textoPublicacao'];

      if ((include_once 'public/Connection.php') == true){
        //NAO PUBLICA SE ESTIVER SEM IMAGEM SELECIONADA.
        if (isset ( $_FILES ['imagem'] ['name'] ) && $_FILES ["imagem"]["error"] == 0) {
          //NAO PUBLICA SE ANO, MES OU DIA DE TERMINO E INICIO NÃO ESTIVER SEM PREENCHER
          if ($_POST ['ano'] != null && $_POST ['mes'] != null && $_POST ['dia'] != null && $_POST ['ano_inicio'] != null && $_POST ['mes_inicio'] != null && $_POST ['dia_inicio'] != null ){
            //NAO PUBLICA SE LEGENDA E TEXTO DA PUBLICAÇÃO NAO ESTIVER PREENCHIDA.
            if($_POST ['textoPublicacao']!=null && $_POST ['legenda']!=null){
              $fb = new \Facebook\Facebook($sessao->newFacebook);

              $arquivo_tmp = $_FILES ['imagem'] ['tmp_name'];// ARAMAZENA A IMAGEM INCLUIDA EM UM BUFFER
              $nome = $_FILES ['imagem'] ['name'];
              $myFileToUpload = $fb->fileToUpload($arquivo_tmp); // prepara o arquivo passando para base64
              $extensao = strrchr($nome, ".");
              $extensao = strtolower($extensao); // Converte a extensao para mimusculo

              //BLOQUEIA EXTENSOES QUE A GRAPH API NAO ACEITA
              if (strstr('.jpg;.jpeg;.png;.gif', $extensao)) {
                //GERAR TOKEN DE ACESSO DA PÁGINA E O ID DELA USANDO TOKEN DE USUÁRIO.
                $response = $fb->get(
                  '/me/accounts',
                  $sessao->fb_access_token
                )->getDecodedBody();
                $page_acess_token = $response['data'][0]['access_token'];
                $id_pagina = $response['data'][0]['id'];

                // Dados a serem inseridos no facebook.
                $dados = [
                  'message' => $_POST ['textoPublicacao'],
                  'source' => $myFileToUpload,
                ];

                // ENVIA PARA A PAGINA DO FACE
                $response = $fb->post('/'.$id_pagina.'/photos/', $dados, $page_acess_token);
                $facebookPost = $response->getGraphNode();

                // Recupera o link e o object_id da publicação feita, usando o ID
                $postagens = ($fb->get('/'.$facebookPost['id'].'/?fields=link', $page_acess_token))->getDecodedBody();
                $object_id = $postagens['id'];
                $linkQr = $postagens['link'];

                //Armazena a foto original localmente
                $arquivo_destino = "./public/imagens/".$object_id.".png";
                move_uploaded_file($arquivo_tmp, $arquivo_destino);

                //Recupera a imagem que foi criada
                $imagem = imagecreatefrompng($arquivo_destino);
                list( $largura, $altura ) = getimagesize($arquivo_destino);
                $proporcao = 0.4;
                if($largura>1000){
                  $proporcao = 0.4;
                  $nova_largura = $largura * $proporcao;
                  $nova_altura = $altura * $proporcao;

                  $nova_imagem = imagecreatetruecolor( $nova_largura, $nova_altura );
                  imagecopyresampled($nova_imagem, $imagem, 0, 0, 0, 0,
                  $nova_largura, $nova_altura, $largura, $altura);

                  //Substitui a imagem original pela imagem com tamanho reduzido
                  imagepng($nova_imagem, $arquivo_destino , 1 );
                  imagedestroy($nova_imagem);
                }
                imagedestroy($imagem);

                // Define as datas de inicio e de termino da publicação no SID.
                $dataInicio = $_POST ['ano_inicio'] . "-" . $_POST ['mes_inicio'] . "-" . $_POST ['dia_inicio'];
                $dataTermino = $_POST ['ano'] . "-" . $_POST ['mes'] . "-" . $_POST ['dia'];

                //ENVIA PARA O BANCO
                $sql = "INSERT INTO divulgacao(legenda, fbid, linkqr, object_id, datatermino, datainicio)
                VALUES('$legenda', '$id_pagina', '$linkQr', '$object_id', '$dataTermino', '$dataInicio');";

                $res = pg_exec($conn, $sql);

                if ($res) {
                  echo "<div style='background-color: #14D700CC;width: 16%;float: right;padding: 1%;border-radius: 5%;'> Divulgação inserida com sucesso!</div>";
                } else {
                  echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'> Erro ao tentar enviar para o banco de dados!</div>";
                }
              } else {
                echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Erro de extensão da imagem, só é permitido '.jpg; .jpeg; .png'</div>";
              }
            } else {
              echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Não é permitido publicação sem legenda e/ou texto para a publicação.</div>";
            }
          } else {
            echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Não é permitido publicação sem data de inicio e/ou de término.</div>";
          }
        } else {
          echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Não é permitido publicação sem imagem.</div>";
        }
      } else {
        echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Erro de conexão com o banco.</div>";
      }
    }
  }

  public function editarDadosAction(){
    if ($this->getRequest()->isPost()) {
      $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");

      $divid = $this->getRequest()->getPost('divid');
      $legenda = $this->getRequest()->getPost('legenda');
      $dia = $this->getRequest()->getPost('dia');
      $mes = $this->getRequest()->getPost('mes');
      $ano = $this->getRequest()->getPost('ano');
      $dia_inicio = $this->getRequest()->getPost('dia_inicio');
      $mes_inicio = $this->getRequest()->getPost('mes_inicio');
      $ano_inicio = $this->getRequest()->getPost('ano_inicio');

      $datatermino = $ano . "-" . $mes . "-" . $dia;
      $datainicio = $ano_inicio . "-" . $mes_inicio . "-" . $dia_inicio;

      $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

      try {
        $divulgacao->setLegenda($legenda);
        $divulgacao->setDatatermino($datatermino);
        $divulgacao->setDatainicio($datainicio);

        $em->merge($divulgacao);
        $em->flush();
      } catch (Exception $e) {
      }

      return $this->redirect()->toRoute('divulgacao', array(
        'controller' => 'divulgacao',
        'action' => 'listar'
      ));
    } else {
      $divid = $_GET ['divid'];

      $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
      $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

      return new ViewModel(array(
        'editar' => $divulgacao
      ));
    }
  }

  public function deletarAction(){
    $sessao = new Container ( 'Auth' );
    $divid = $_GET ['divid'];

    // Realiza a conexão usando a API do facebook.
    $fb = new \Facebook\Facebook($sessao->newFacebook);

    $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

    $fb->delete('/'.$divulgacao->getObject_id().'/',array(),$sessao->fb_access_token);
    $em->remove($divulgacao);
    $em->flush();

    return $this->redirect()->toRoute('divulgacao', array(
      'controller' => 'divulgacao',
      'action' => 'listar'
    ));
  }

  public function detalhesAction(){
    $divid = $_GET ['divid'];

    $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

    return new ViewModel(array(
      'detalhes' => $divulgacao
    ));
  }
}
