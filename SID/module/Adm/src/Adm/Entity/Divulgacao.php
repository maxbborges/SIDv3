<?php

namespace Adm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="divulgacao")
 * @ORM\Entity(repositoryClass="Adm\Entity\DivulgacaoRepository")
 */
class Divulgacao {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */
	public $divId;

	/**
	 * @ORM\Column(type="string")
	 */
	public $fbId;

	/**
	 * @ORM\Column(type="string")
	 */
	public $linkqr;

	/**
	 * @ORM\Column(type="string")
	 */
	public $legenda;

	/**
	 * @ORM\Column(type="string")
	 */
	public $object_id;

	/**
	 * @ORM\Column(type="string")
	 */
	public $datatermino;

	/**
	 * @ORM\Column(type="string")
	 */
	public $datainicio;
	public function getDivId() {
		return $this->divId;
	}
	public function setDivId($divId) {
		$this->divId = $divId;
		return $this;
	}
	public function getFbId() {
		return $this->fbId;
	}
	public function setFbId($fbId) {
		$this->fbId = $fbId;
		return $this;
	}
	public function getLinkqr() {
		return $this->linkqr;
	}
	public function setLinkqr($linkqr) {
		$this->linkqr = $linkqr;
		return $this;
	}
	public function getLegenda() {
		return $this->legenda;
	}
	public function setLegenda($legenda) {
		$this->legenda = $legenda;
		return $this;
	}
	public function getObject_id() {
		return $this->object_id;
	}
	public function setObject_id($object_id) {
		$this->object_id = $object_id;
		return $this;
	}
	public function getDatainicio() {
		return $this->datainicio;
	}
	public function setDatainicio($datainicio) {
		$this->datainicio = $datainicio;
		return $this;
	}

	public function getDatatermino() {
		return $this->datatermino;
	}
	public function setDatatermino($datatermino) {
		$this->datatermino = $datatermino;
		return $this;
	}
}
