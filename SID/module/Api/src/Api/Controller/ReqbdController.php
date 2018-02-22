<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Client as HttpClient;

class ReqbdController extends AbstractActionController
{

	public function indexAction()	{
		$client = new HttpClient();
		$client->setAdapter('Zend\Http\Client\Adapter\Curl');

		$method = $this->params()->fromQuery('method', 'get');
		$id = $this->params()->fromQuery('id', 'get');

		$ip = $this->getRequest()->getServer('REMOTE_ADDR');
		$client->setUri("http://".$_SERVER['HTTP_HOST'].$this->getRequest()->getBaseUrl().'/bd');

		switch($method) {
			case 'get' :
			$client->setMethod('GET');
			$client->setParameterGET(array('id'=>$id));
			break;
			case 'get-list' :
			$client->setMethod('GET');
			break;
			case 'create' :
			$client->setMethod('POST');
			$client->setParameterPOST(array('name'=>'samsonasik'));
			break;
			case 'update' :
			$data = array('name'=>'ikhsan');
			$adapter = $client->getAdapter();

			$adapter->connect('localhost', 6670);
			$uri = $client->getUri().'?id=1';
			$adapter->write('PUT', new \Zend\Uri\Uri($uri), 1.1, array(), http_build_query($data));

			$responsecurl = $adapter->read();
			list($headers, $content) = explode("\r\n\r\n", $responsecurl, 2);
			$response = $this->getResponse();

			$response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=utf-8');
			$response->setContent($content);

			return $response;
			case 'delete' :
			$adapter = $client->getAdapter();

			$adapter->connect('localhost', 6670	);
			$uri = $client->getUri().'?id=1';
			$adapter->write('DELETE', new \Zend\Uri\Uri($uri), 1.1, array());

			$responsecurl = $adapter->read();
			list($headers, $content) = explode("\r\n\r\n", $responsecurl, 2);
			$response = $this->getResponse();

			$response->getHeaders()->addHeaderLine('content-type', 'text/html; charset=utf-8');
			$response->setContent($content);

			return $response;
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
