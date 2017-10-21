<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Adm\Controller\Configure;
use Zend\Session\Container;

class DivulgacaoController extends AbstractActionController {
	public function listarAction() {
		$em = $this->getServiceLocator ()->get ( 'Doctrine\ORM\EntityManager' );
		
		$query = $em->createQuery ( 'SELECT d.divId FROM Adm\Entity\Divulgacao d' );
		$divs = $query->getResult ();
		
		return new ViewModel ( array (
				'divulgacoes' => $divs 
		) );
	}
	
	public function inserirAction() {
		if ($this->getRequest ()->isPost ()) {
			
			// Parâmetros do Cliente
			$legenda = $_POST ['legenda'];
			$linkQr = $_POST ['linkqr'];
			$prioridade = $_POST ['prioridade'];
			$dataTermino = $_POST ['ano'] . "-" . $_POST ['mes'] . "-" . $_POST ['dia'];
			
			// Verificação de campos vazios
			if (isset ( $_FILES ['imagem'] ['name'] ) && $_POST ['legenda'] != null && $_POST ['linkqr'] != null && $_POST ['prioridade'] != null && $_POST ['ano'] != null && $_POST ['mes'] != null && $_POST ['dia'] != null && $_FILES ["imagem"] ["error"] == 0) {
				
				$sessao = new Container ( 'Auth' );// Obtem a sessão do usuário
				
				$arquivo_tmp = $_FILES ['imagem'] ['tmp_name'];// imagem do buffer temporário 
				$nome = $_FILES ['imagem'] ['name'];
				
				// Parâmetros do facebook -> vide class Cofigure
				$configure = new Configure ();
				$newFacebook = $configure->newFacebook ();
				
				$fb = new \Facebook\Facebook ( $newFacebook );// passa parâmetros para a classe principal da Graph
				
				$myFileToUpload = $fb->fileToUpload ( $arquivo_tmp ); // prepara o arquivo passando para base64
				
				$text = $_POST['legenda'].". Para mais detalhes acesse: ".$_POST ['linkqr'];

				$data = [ 
						'message' => $text,
						'caption' => $_POST ['linkqr'],
						'source' => $myFileToUpload,
						'access_token' => $sessao->fb_access_token 
				];


												//Publicar na Pagina pessoal
				
				// try {
				// 	$response = $fb->post ( '/me/photos', $data );// Envio para o Perfil do SID
				// } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
				// 	echo 'Error: ' . $e->getMessage ();
				// 	exit();
				// }


													//Publicar na Pagina


				$tokenPagina = 'EAACVVnZBeZA2YBAEVJv8tkyEsgg7Sz7NRFWjo1K5EASrWOfZAwcJHH9n5nwJDYZBZAOO2ZBNKKRIl8LeWJAz8YJNuKUr7EvHtb4VISMBdloHTNnb2o0aesScxwYOEqYwDj6sBuRJWQfjNqFKtZC0CXBzrf1SXw3h90ZCgoCfrnioFXcndSJK4RS6DZBDcga9xB6QkkYYjimgzjgZDZD';

				$idPagina = '415358248866659';

				// $dados = [
				// 	//'access_token' => $tokenPagina,	
				// 	'message' => $text
				// ];

				// try {
				// 	$response = $fb->post ( '/'.$idPagina.'/feed/', $dados, $tokenPagina );// Envio para o Perfil do SID
				// } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
				// 	echo 'Error: ' . $e->getMessage ();
				// 	exit();
				// }
				
				// $graphNode = $response->getGraphNode (); // resposta



													//Recuperar publicaçoes

				// try {
				// 	$response = $fb->get ( '/'.$idPagina.'/feed/', $tokenPagina );
				// } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
				// 	echo 'Error: ' . $e->getMessage ();
				// 	exit();
				// }			

				// $array = $response->getDecodedBody();

				// foreach ($array as $value) {
				// 	echo $value[0]['created_time']."<br>";
				// 	echo $value[0]['message']."<br>";
				// 	echo $value[0]['id']."<br>";
				// }



												// Recuperar Comentarios

				$idPublicacao = '415358248866659_419055568496927';

				// try {
				// 	$response = $fb->get ( '/'.$idPublicacao.'/comments' , $tokenPagina );// Envio para o Perfil do SID
				// } catch ( Facebook\Exceptions\FacebookSDKException $e ) {
				// 	echo 'Error: ' . $e->getMessage ();
				// 	exit();
				// }

				// $array = $response->getDecodedBody();

				// foreach ($array as $value) {
				// 	echo $value[0]['created_time']."<br>";
				// 	echo $value[0]['from']['name']."<br>";
				// 	echo $value[0]['from']['id']."<br>";
				// 	echo $value[0]['message']."<br>";
				// 	echo $value[0]['id']."<br>";
				// }



											// Recuperar Likes

				try {
					$response = $fb->get ( '/'.$idPublicacao.'/likes' , $tokenPagina );// Envio para o Perfil do SID
				} catch ( Facebook\Exceptions\FacebookSDKException $e ) {
					echo 'Error: ' . $e->getMessage ();
					exit();
				}

				$array = $response->getDecodedBody();

				foreach ($array as $value) {
					echo $value[0]['id']."<br>";
					echo $value[0]['name']."<br>";
				}



				//echo $a;
				//echo $idPublicacao;

				// echo '<pre>';
				// var_dump($value[1]['id']);
				// echo '<pre>';
				// die;

				echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>".$a."</div>";

				$fbId = $graphNode ['id'];
				
				$extensao = strrchr ( $nome, "." );
				
				// Converte a extensao para mimusculo
				$extensao = strtolower ( $extensao );
				
				if (strstr ( '.jpg;.jpeg;.png;.gif', $extensao )) {
					$file_name = $arquivo_tmp;
					
					$img = fopen ( $file_name, 'r' ) or die ( "Não foi possível abrir a Imagem!\n" );
					$data = fread ( $img, filesize ( $file_name ) );
					
					$imagemBd = pg_escape_bytea ( $data );
					fclose ( $img );
					
					require_once 'public/Connection.php'; // arquivo de conexão com banco de dados como arquivo externo ao Zend
					
					$sql = "INSERT INTO divulgacao(legenda, fbid, linkqr, prioridade, datatermino, imagem, thumb) 
					VALUES('$legenda', '$fbId', '$linkQr', '$prioridade', '$dataTermino', '$imagemBd', '$imagemBd');";
					
					$res = pg_exec ( $conn, $sql );
					
					if ($res) {
						echo "<div style='background-color: #14D700CC;width: 16%;float: right;padding: 1%;border-radius: 5%;'> Divulgação inserida com sucesso!</div>";
					} else {
						echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'> Erro ao tentar enviar para o banco de dados!</div>";
					}
				} else {
					echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Erro de extensão da imagem, só é permitido '.jpg; .jpeg; .png'</div>";
				}
			} else {
				echo "<div style='background-color: #e78686b3;width: 16%;float: right;padding: 1%;border-radius: 5%;'>Não é permitido Campos vazios! Tente novamente.</div>";
			}
		}
	}
	public function editarDadosAction() {
		if ($this->getRequest ()->isPost ()) {
			
			$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
			
			$divid = $this->getRequest ()->getPost ( 'divid' );
			$legenda = $this->getRequest ()->getPost ( 'legenda' );
			$linkqr = $this->getRequest ()->getPost ( 'linkqr' );
			$prioridade = $this->getRequest ()->getPost ( 'prioridade' );
			$dia = $this->getRequest ()->getPost ( 'dia' );
			$mes = $this->getRequest ()->getPost ( 'mes' );
			$ano = $this->getRequest ()->getPost ( 'ano' );
			
			$datatermino = $ano . "-" . $mes . "-" . $dia;
			
			$divulgacao = $em->find ( "Adm\Entity\Divulgacao", $divid );
			
			try {
				$divulgacao->setLegenda ( $legenda );
				$divulgacao->setLinkqr ( $linkqr );
				$divulgacao->setPrioridade ( $prioridade );
				$divulgacao->setDatatermino ( $datatermino );
				
				$em->merge ( $divulgacao );
				$em->flush ();
			} catch ( Exception $e ) {
			}
			
			return $this->redirect ()->toRoute ( 'divulgacao', array (
					'controller' => 'divulgacao',
					'action' => 'listar' 
			) );
		} else {
			$divid = $_GET ['divid'];
			
			$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
			$divulgacao = $em->find ( "Adm\Entity\Divulgacao", $divid );
			
			return new ViewModel ( array (
					'editar' => $divulgacao 
			) );
		}
	}
	public function editarImagemAction() {
		if ($this->getRequest ()->isPost ()) {
			
			$divid = $_POST ['divid'];
			
			$arquivo_tmp = $_FILES ['imagem'] ['tmp_name'];
			$nome = $_FILES ['imagem'] ['name'];
			
			$extensao = strrchr ( $nome, "." );
			
			// Converte a extensao para mimusculo
			$extensao = strtolower ( $extensao );
			
			if (strstr ( '.jpg;.jpeg;.png', $extensao )) {
				$file_name = $arquivo_tmp;
				
				$img = fopen ( $file_name, 'r' ) or die ( "<div style='background-color: #e78686b3;width: 50%; float: right;'>Não foi possível abrir a Imagem!\n</div>" );
				$data = fread ( $img, filesize ( $file_name ) );
				
				$imagemBd = pg_escape_bytea ( $data );
				fclose ( $img );
				
				require_once 'public/Connection.php'; // arquivo de conexão com banco de dados
				                                      
				// Antes de enviar para o banco, deverá enfiar para o facebook
				
				$sql = "UPDATE divulgacao SET imagem='$imagemBd' WHERE divId = '$divid';";
				
				$res = pg_exec ( $conn, $sql );
				
				if ($res) {
					echo 'Imagem atualizada!';
				} else {
					echo 'Erro ao tentar Atualizar Imagem!';
				}
			} else {
				echo "<div style='background-color: #e78686b3;width: 50%; float: right;'>Erro de extensão da imagem, só é permitido '.jpg; .jpeg; .png'</div>";
			}
		}
		
		return $this->redirect ()->toRoute ( 'divulgacao', array (
				'controller' => 'divulgacao',
				'action' => 'listar' 
		) );
	}
	public function deletarAction() {
		$divid = $_GET ['divid'];
		
		$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
		$divulgacao = $em->find ( "Adm\Entity\Divulgacao", $divid );
		$em->remove ( $divulgacao );
		$em->flush ();
		
		return $this->redirect ()->toRoute ( 'divulgacao', array (
				'controller' => 'divulgacao',
				'action' => 'listar' 
		) );
	}
	public function detalhesAction() {
		$divid = $_GET ['divid'];
		
		$em = $this->getServiceLocator ()->get ( "Doctrine\ORM\EntityManager" );
		$divulgacao = $em->find ( "Adm\Entity\Divulgacao", $divid );
		
		return new ViewModel ( array (
				'detalhes' => $divulgacao 
		) );
	}
}
