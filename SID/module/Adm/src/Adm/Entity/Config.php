<?php

namespace Adm\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="config")
 * @ORM\Entity(repositoryClass="Adm\Entity\DivulgacaoRepository")
 */
class Config {
  /**
  * @ORM\Id
  * @ORM\Column(type="string")
  */
  public $app_id;

  /**
   * @ORM\Column(type="string")
   */
  public $app_secret;

  /**
   * @ORM\Column(type="string")
   */
  public $default_graph_version;

  /**
   * @ORM\Column(type="boolean")
   */
  public $fileupload;

  /**
   * @ORM\Column(type="string")
   */
  public $id_pagina;

  /**
   * @ORM\Column(type="string")
   */
  public $tokenPagina;

  /**
   * @ORM\Column(type="string")
   */
  public $destinoLocal;
}
