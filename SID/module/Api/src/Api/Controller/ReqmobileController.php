<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Client as HttpClient;

class ReqmobileController extends AbstractActionController
{

  public function indexAction()	{
    $client = new HttpClient();
    $client->setAdapter('Zend\Http\Client\Adapter\Curl');

    $method = $this->getRequest()->getServer('REQUEST_METHOD');
    $id = $this->params()->fromQuery('id', 'get');

    $client->setUri("http://".$_SERVER['HTTP_HOST'].$this->getRequest()->getBaseUrl().'/mobile');

    switch($method) {
      case 'GET':
        $client->setMethod('GET');
        $client->setParameterGET(array('id'=>$id));
        break;
      case 'POST' :
        $data = array (
          'id_professor'=>$this->params()->fromQuery('matricula', 'get'),
          'id_turma'=>$this->params()->fromQuery('id', 'get'),
          'menssagem'=>$this->params()->fromQuery('menssagem', 'get')
        );
        $client->setMethod('POST');
        $client->setParameterPOST($data);
        break;
    }

    $response = $client->send();
    if (!$response->isSuccess()) {
      $message = $response->getStatusCode() . ': ' . $response->getReasonPhrase();

      $response = $this->getResponse();
      $response->setContent($message);
      return $response;
    }
    $body = $response->getBody();

    $response = $this->getResponse();
    $response->setContent($body);

    header('Content-Type: application/json;charset=UTF-8');

    return $response;
  }


}
