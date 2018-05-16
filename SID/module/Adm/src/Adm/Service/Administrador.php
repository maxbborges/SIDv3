 <?php

namespace Adm\Service;

use Doctrine\ORM\EntityManager;
use Adm\Entity\Divulgacao as div;

class Administrador {
	
	/**
	 * @var EntityManager
	 */
	protected $em;
	
	public function __construct(EntityManager $em){
		$this->em = $em;
	}
	
	public function insert($entity){
		
		$this->em->persist($entity);
		$this->em->flush();
		
		return $entity;
	}
}