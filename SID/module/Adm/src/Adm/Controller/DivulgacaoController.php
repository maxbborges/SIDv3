<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Adm\Controller\Configure;
use Zend\Session\Container;

class DivulgacaoController extends AbstractActionController
{
    public function listarAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $query = $em->createQuery('SELECT d.divId FROM Adm\Entity\Divulgacao d');
        $divs = $query->getResult();

        return new ViewModel(array(
            'divulgacoes' => $divs
        ));
    }

    public function inserirAction(){
        if ($this->getRequest()->isPost()) {

            // Parâmetros do Cliente
            $legenda = $_POST ['legenda'];
            $linkQr = $_POST ['linkqr'];
            $prioridade = $_POST ['prioridade'];



            //if (isset ( $_FILES ['imagem'] ['name'] ) && $_POST ['ano'] != null && $_POST ['mes'] != null && $_POST ['dia'] != null && $_FILES ["imagem"] ["error"] == 0) {
            if (isset ( $_FILES ['imagem'] ['name'] ) && $_FILES ["imagem"] ["error"] == 0) {
                $sessao = new Container('Auth');// Obtem a sessão do usuário

                // Parâmetros do facebook -> vide class Cofigure
                $configure = new Configure();
                $newFacebook = $configure->newFacebook();
                $infPagina = $configure->infPagina();

                $fb = new \Facebook\Facebook($newFacebook);// passa parâmetros para a classe principal da Graph

                $arquivo_tmp = $_FILES ['imagem'] ['tmp_name'];// imagem do buffer temporário
                $nome = $_FILES ['imagem'] ['name'];
                $myFileToUpload = $fb->fileToUpload($arquivo_tmp); // prepara o arquivo passando para base64
                $extensao = strrchr($nome, ".");
                $extensao = strtolower($extensao); // Converte a extensao para mimusculo

                //BLOQUEIA EXTENSOES QUE A GRAPH API NAO ACEITA
                if (strstr('.jpg;.jpeg;.png;.gif', $extensao)) {

                    // ARMAZENA AS INFORMAÇOES REFERENTES A LENGENDA E AO LINK COLOCADO NA PUBLICAÇÃO
                    if ($legenda != null && $linkQr != null) {
                        $text = $legenda.". Para mais detalhes acesse: ".$linkQr;
                    }

                    if ($_POST ['prioridade'] == null) {
                        $prioridade = 'alta';
                    }

                    $dataTermino = $_POST ['ano'] . "-" . $_POST ['mes'] . "-" . $_POST ['dia'];

                    $dados = [
                        //'url' => 'http://1.bp.blogspot.com/-nyE7Y4y-fzg/TlA6gdkxMmI/AAAAAAAAA-4/Y-tWAbDsrDw/s1600/legal.png', // ENVIA UMA IMAGEM A PARTIR DE UM LINK ONLINE
                        'message' => $text,
                        'source' => $myFileToUpload,
                        'caption' => $_POST ['linkqr'],
                        //'picture' => $myFileToUpload
                    ];

                    // ENVIA PARA O FACE COM FOTO
                    $response = $fb->post('/'.$infPagina['idPagina'].'/photos/', $dados, $infPagina['tokenPagina']);
                    $graphNode = $response->getGraphNode();



                    // $data = [
                    // 	'message' => $text,
                    // 	'caption' => $_POST ['linkqr'],
                    // 	'source' => $myFileToUpload,
                    //  'access_token' => $sessao->fb_access_token
                    // ];


                    //Publicar na Pagina pessoal
                    // try {
                    //  $response = $fb->post ( '/me/photos', $data );// Envio para o Perfil do SID
                    // } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
                    //  echo 'Error: ' . $e->getMessage ();
                    //  exit();
                    // }

                    // PEGAR OUTRO RESPONSE PARA PAGINA PESSOAL

                    //if ($erro == 0){
                    //$graphNode = $response->getGraphNode (); // resposta
                    //}


                    //Recuperar Albuns
                    // try {
                    //  $response = $fb->get ( '/'.$idPagina.'/albums/', $tokenPagina);// Envio para o Perfil do SID
                    // } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
                    //  echo 'Error: ' . $e->getMessage ();
                    //  exit();
                    // }

                    // $array = $response->getDecodedBody();

                    // $teste = array();

                    // foreach ($array as $value) {
                    //  echo $value[$postSelecionado]['created_time']."<br>";
                    //  echo $value[$postSelecionado]['name']."<br>";
                    //  echo $teste[] = $value[$postSelecionado]['id'];
                    // }

                    //                              //Recupera 1 Album

                    // try {
                    //  $response = $fb->get ( '/'.$teste[0].'/photos?fields=link,id,created_time,name', $tokenPagina);// Envio para o Perfil do SID
                    // } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
                    //  echo 'Error: ' . $e->getMessage ();
                    //  exit();
                    // }

                    // $array = $response->getDecodedBody();

                    // $teste = array();

                    // foreach ($array as $value) {
                    //  echo $value[$postSelecionado]['created_time']."<br>";
                    //  echo $value[$postSelecionado]['name']."<br>";
                    //  echo $value[$postSelecionado]['link']."<br>";
                    //  echo $teste[] = $value[$postSelecionado]['id'];
                    // }




                    //RECUPERA AS PUBLICAÇOES
                    $response = $fb->get('/'.$infPagina['idPagina'].'/feed/', $infPagina['tokenPagina']);
                    $postagens = $response->getDecodedBody();

                    //count($postagens['data']);
                    //INFORMAÇOES RECUPERADAS:
                    $idPublicacao = $postagens['data'][0]['id'];
                    $msgPublicacao = $postagens['data'][0]['message'];

                    //RECUPERA O object_id
                    $object_id = str_replace($infPagina['idPagina']."_", "", $idPublicacao);

                    //RECUPERA A URL DA FOTO DA PUBLICACAO
                    $response = $fb->get('/'.$object_id.'/picture/?redirect=false', $infPagina['tokenPagina']);
                    $fotoPublicacao = $response->getGraphNode();
                    $urlFoto = $fotoPublicacao['url'];

                    //RECUPERA INFORMAÇOES DA PUBLICACAO (idPublicacao ou object_id) (comments ou likes)
                    $response = $fb->get ( '/'.$idPublicacao.'/likes' , $infPagina['tokenPagina']);
                    $response = $fb->get('/'.$idPublicacao.'/comments', $infPagina['tokenPagina']);
                    $comentariosPublicacao = $response->getDecodedBody();
                    //$likesPublicacao = $response->getDecodedBody();
                    // foreach ($comentariosPublicacao as $value) {
                    //  echo $value[$postSelecionado]['created_time']."<br>";
                    //  echo $value[$postSelecionado]['from']['name']."<br>";
                    //  echo $value[$postSelecionado]['from']['id']."<br>";
                    //  echo $value[$postSelecionado]['message']."<br>";
                    //  echo $value[$postSelecionado]['id']."<br>";
                    // }

                    // foreach ($array as $value) {
                    //  echo $value[$postSelecionado]['id']."<br>";
                    //  echo $value[$postSelecionado]['name']."<br>";
                    // }

                    // echo '<pre>';
                    // var_dump($value[1]['id']);
                    // echo '<pre>';
                    // die;

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
            $linkqr = $this->getRequest()->getPost('linkqr');
            $prioridade = $this->getRequest()->getPost('prioridade');
            $dia = $this->getRequest()->getPost('dia');
            $mes = $this->getRequest()->getPost('mes');
            $ano = $this->getRequest()->getPost('ano');

            $datatermino = $ano . "-" . $mes . "-" . $dia;

            $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

            try {
                $divulgacao->setLegenda($legenda);
                $divulgacao->setLinkqr($linkqr);
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


    public function editarImagemAction()
    {
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


    public function deletarAction()
    {
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

    public function detalhesAction()
    {
        $divid = $_GET ['divid'];

        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $divulgacao = $em->find("Adm\Entity\Divulgacao", $divid);

        return new ViewModel(array(
            'detalhes' => $divulgacao
        ));
    }
}
