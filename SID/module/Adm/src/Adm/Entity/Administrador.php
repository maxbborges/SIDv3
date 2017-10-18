<?php

namespace Adm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="adm")
 * @ORM\Entity(repositoryClass="Adm\Entity\AdministradorRepository")
 */
class Administrador {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	public $admId;
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	public $nome;
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	public $email;
	
	/**
	 * @ORM\Column(type="string")
	 * @var string
	 */
	public $senha;
	
	public function getAmdId(){
		return $this->admId;
	}
	
	public function setAdmId($admId){
		$this->admId  = $admId;
		return $this;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}
	public function getSenha(){
		return $this->senha;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
		return $this;
	}
	
	public function toArray(){
		return array(
			'usuId' =>$this->getAdmId(),
			'nome'  =>$this->getNome(),
			'email' =>$this->getEmail(),
			'password' => $this->getSenha()
		);
	}
	
}