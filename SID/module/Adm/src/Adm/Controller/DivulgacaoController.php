<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Adm\Controller\Configure;
use Zend\Session\Container;


class DivulgacaoController extends AbstractActionController
{
  public function listarAction(){
    $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

    $query = $em->createQuery('SELECT d.divId FROM Adm\Entity\Divulgacao d order by d.divId');
    $divs = $query->getResult();

    return new ViewModel(array(
      'divulgacoes' => $divs
    ));
  }

  // INSERIR NO FACEBOOK E NO BANCO DE DADOS
  public function inserirAction(){
    if ($this->getRequest()->isPost()) {
      // Recupera os parâmetros do HTML (module/Adm/view/adm/divulgacao/inserir.phtml)
      $legenda = $_POST ['legenda'];
      $textoPublicacao = $_POST ['textoPublicacao'];
      $prioridade = $_POST ['prioridade'];

      //NAO PUBLICA SE ALGUM CAMPO NAO ESTIVER PREENCHIDO NO SERVIDOR
      if (isset ( $_FILES ['imagem'] ['name'] ) && $_POST ['ano'] != null && $_POST ['mes'] != null && $_POST ['dia'] != null && $_FILES ["imagem"] ["error"] == 0) {
        // Recupera os dados necessarios para conexão com o facebook
        $configure = new Configure();
        $newFacebook = $configure->newFacebook();
        $infPagina = $configure->infPagina();
        $fb = new \Facebook\Facebook($newFacebook);


        $arquivo_tmp = $_FILES ['imagem'] ['tmp_name'];// ARAMAZENA A IMAGEM INCLUIDA EM UM BUFFER
        $nome = $_FILES ['imagem'] ['name'];
        $myFileToUpload = $fb->fileToUpload($arquivo_tmp); // prepara o arquivo passando para base64
        $extensao = strrchr($nome, ".");
        $extensao = strtolower($extensao); // Converte a extensao para mimusculo

        //BLOQUEIA EXTENSOES QUE A GRAPH API NAO ACEITA
        if (strstr('.jpg;.jpeg;.png;.gif', $extensao)) {

          // ARMAZENA AS INFORMAÇOES REFERENTES A LENGENDA E AO LINK COLOCADO NA PUBLICAÇÃO
          if ($textoPublicacao != null) {
            $text = $textoPublicacao;
          }

          $dataTermino = $_POST ['ano'] . "-" . $_POST ['mes'] . "-" . $_POST ['dia'];

          $dados = [
            //'url' => 'http://1.bp.blogspot.com/-nyE7Y4y-fzg/TlA6gdkxMmI/AAAAAAAAA-4/Y-tWAbDsrDw/s1600/legal.png', // ENVIA UMA IMAGEM A PARTIR DE UM LINK ONLINE
            'message' => $text,
            'source' => $myFileToUpload,
            'caption' => $_POST ['textoPublicacao'],
            //'picture' => $myFileToUpload
          ];

          // ENVIA PARA A PAGINA DO FACE
          $response = $fb->post('/'.$infPagina['idPagina'].'/photos/', $dados, $infPagina['tokenPagina']);
          $facebookPost = $response->getGraphNode();

          // Recupera o link e o da publicação feita usando o ID
          $postagens = ($fb->get('/'.$facebookPost['id'].'/?fields=link', $infPagina['tokenPagina']))->getDecodedBody();
          $object_id = $postagens['id'];
          $linkQr = $postagens['link'];

          //ARMAZENA O ARQUIVO LOCALMENTE NA PASTA SID/public/
          //Local definido no arquivo Configure, no metodo infPagina()
          $arquivo_destino = $infPagina['destinoLocal'].$object_id.".png";
          move_uploaded_file($arquivo_tmp, $arquivo_destino);

          $fbId = $infPagina['idPagina'];

          //ENVIA PARA O BANCO
          require_once 'public/Connection.php'; // arquivo de conexão com banco de dados como arquivo externo ao Zend

          $sql = "INSERT INTO divulgacao(legenda, fbid, linkqr, prioridade, object_id, datatermino)
          VALUES('$legenda', '$fbId', '$linkQr', '$prioridade', '$object_id', '$dataTermino');";

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
        echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Não é permitido publicação sem imagem e sem data de término.</div>";
      }
    }
  }

  public function editarDadosAction(){
    if ($this->getRequest()->isPost()) {
      $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");

      $divid = $this->getRequest()->getPost('divid');
      $legenda = $this->getRequest()->getPost('legenda');
      $prioridade = $this->getRequest()->getPost('prioridade');
      $dia = $this->getRequest()->getPost('dia');
      $mes = $this->getRequest()->getPost('mes');
      $ano = $this->getRequest()->getPost('ano');

      $datatermino = $ano . "-" . $mes . "-" . $dia;

      $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

      try {
        $divulgacao->setLegenda($legenda);
        $divulgacao->setPrioridade($prioridade);
        $divulgacao->setDatatermino($datatermino);

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

  public function editarImagemAction(){
    if ($this->getRequest()->isPost()) {


      $divid = $_POST ['divid'];

      $arquivo_tmp = $_FILES ['imagem'] ['tmp_name'];
      $nome = $_FILES ['imagem'] ['name'];

      $extensao = strrchr($nome, ".");

      // Converte a extensao para mimusculo
      $extensao = strtolower($extensao);

      if (strstr('.jpg;.jpeg;.png', $extensao)) {
        $file_name = $arquivo_tmp;

        $img = fopen($file_name, 'r') or die("<div style='background-color: #e78686b3;width: 50%; float: right;'>Não foi possível abrir a Imagem!\n</div>");
        $data = fread($img, filesize($file_name));

        $imagemBd = pg_escape_bytea($data);
        fclose($img);

        require_once 'public/Connection.php'; // arquivo de conexão com banco de dados

        // Antes de enviar para o banco, deverá enfiar para o facebook

        $sql = "UPDATE divulgacao SET imagem='$imagemBd' WHERE divId = '$divid';";

        $res = pg_exec($conn, $sql);

        if ($res) {
          echo 'Imagem atualizada!';
        } else {
          echo 'Erro ao tentar Atualizar Imagem!';
        }
      } else {
        echo "<div style='background-color: #e78686b3;width: 50%; float: right;'>Erro de extensão da imagem, só é permitido '.jpg; .jpeg; .png'</div>";
      }
    }

    return $this->redirect()->toRoute('divulgacao', array(
      'controller' => 'divulgacao',
      'action' => 'listar'
    ));
  }

  public function deletarAction(){
    $divid = $_GET ['divid'];

    $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
    $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);
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
