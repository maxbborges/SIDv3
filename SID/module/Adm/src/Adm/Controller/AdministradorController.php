<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AdministradorController extends AbstractActionController {
	public function indexAction() {
		return new ViewModel ();
	}
	
	public function editarAction() {
		if($this->getRequest()->isPost()){
			
			$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
			
			$nome = $this->getRequest()->getPost('nome');
			$email = $this->getRequest()->getPost('email');
			$senha = $this->getRequest()->getPost('senha');
			$senhaConf = $this->getRequest()->getPost('senhaConf');
			
			$administrador = new \Adm\Entity\Administrador();
			$administrador->setNome($nome);
			$administrador->setEmail($email);
				
			if(empty($senha) && empty($senhaConf)){
				echo 'sem senha';
				// altera dados sem alterar a senha no banco
				
				$admid = 0;
					
				$administrador = $em->find("Adm\Entity\Administrador", $admid);
				$administrador->setNome($nome);
				$administrador->setEmail($email);
				
				$em->merge ($administrador);
				$em->flush ();
				
				return $this->redirect ()->toRoute ( 'divulgacao', array (
						'controller' => 'divulgacao',
						'action' => 'listar'
				) );
			}else if($senha === $senhaConf){
				echo 'senhas iguais';
				// joga a senha no banco
				
				$admid = 0;
				
				$codificada = hash('whirlpool', $senha);
				$administrador->setSenha($codificada);
			
				$administrador = $em->find("Adm\Entity\Administrador", $admid);
				$administrador->setNome($nome);
				$administrador->setEmail($email);
				$administrador->setSenha($codificada);
				
				$em->merge ($administrador);
				$em->flush ();
				
				return $this->redirect ()->toRoute ( 'divulgacao', array (
						'controller' => 'divulgacao',
						'action' => 'listar'
				) );
				
			}else{
				echo "Senhas não conferem!";
			}
			
			return new ViewModel (array('editar' => $administrador));
		}else{
			$admid = 0;
			
			$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
			$administrador = $em->find("Adm\Entity\Administrador", $admid);
			
			return new ViewModel (array('editar' => $administrador));
		}
		
	}
}