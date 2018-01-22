<?php
namespace Adm\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Adm\Controller\Configure;
use Zend\Session\Container;
// use Facebook\FacebookRequest;
  class FbConnect{
    public function Connect(){
      // $sessao = new Container('Auth');
      include_once (__DIR__.'/Configure.php');
      $configure = new Configure();
      $newFacebook = $configure->newFacebook();
      $infPagina = $configure->infPagina();

      // echo realpath("");
      require ('../vendor/autoload.php');
      $fb = new \Facebook\Facebook($newFacebook);
      //
      // echo "aa";
      $fbConnect = array(
        'fb' => $fb,
        'infPagina' => $infPagina,
      );
      return($fbConnect);

      // echo var_dump($fbxConnect);

      // echo json_encode($newFacebook);

      // echo "aa";
      // echo "<script>console.log(".$configure.");</script>";

    }

  }
?>
