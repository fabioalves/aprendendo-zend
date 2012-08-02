<?php

class Default_ErrorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    

    public function errorAction()
    {
    	$errors = $this->_getParam('error_handler');
    	
    	if($errors) {
    		$this->view->message = "Você está na página de erro";
    		return;
    	}
    	
    	switch ($errors) {    		
    		case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
   			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
			case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:				
	    		$this->getResponse()->setHttpResponseCode(404);
	    		$priority = Zend_Log::NOTICE;
	    		$this->view->message = "Página não encontrada";
    		break;    		
    		default:    			
    			$this->getResponse()->setHttpResponseCode(500);
    			$priority = Zend_Log::CRIT;
    			$this->view->message = "Erro de aplicação";    			
    		break;
    	}
    	
    	if($log = $this->getLog()) {
    		$log->log($this->view->message, $priority, $errors->exception);
    		$log->log('Request Parameters', $priority, $request->getParams());
    	}
    	
    	$this->view->request = $errors->request;
    }
    
    public function getLog() {
    	$bootstrap = $this->getInvokeArg('bootstrap');
    	if(!$bootstrap->hasResource('Log')) {
    		return false;
    	}
    	
    	$log = $bootstrap->getResource('Log');
    	return $log;
    }
}