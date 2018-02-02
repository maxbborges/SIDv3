<?php
namespace Adm\Controller;
  class FbConnect{
    public function Connect(){
      include_once (__DIR__.'/Configure.php');
      $configure = new Configure();
      $newFacebook = $configure->newFacebook();
      $infPagina = $configure->infPagina();

      $fb = new \Facebook\Facebook($newFacebook);

      $fbConnect = array(
        'fb' => $fb,
        'infPagina' => $infPagina,
      );

      return($fbConnect);
    }

    public function Connect1(){
      include_once (__DIR__.'/Configure.php');
      $configure = new Configure();
      $newFacebook = $configure->newFacebook();
      $infPagina = $configure->infPagina();

      require_once ('../vendor/autoload.php');
      $fb = new \Facebook\Facebook($newFacebook);

      $fbConnect = array(
        'fb' => $fb,
        'infPagina' => $infPagina,
      );

      return $fbConnect;
    }
  }
?>
