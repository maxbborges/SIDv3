<?php

namespace Adm\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ImagemController extends AbstractActionController
{
	
    public function indexAction()
    {	
    	
        return new ViewModel();
    }
    
    public function getAction()
    {
    	return new ViewModel(array('data' => "https://www.google.com.br/logos/doodles/2016/2016-doodle-fruit-games-day-7-5190998188621824-res.png"));
    }
}
