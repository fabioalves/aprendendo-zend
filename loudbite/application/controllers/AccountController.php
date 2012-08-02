<?php

class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function successAction()
    {
    	if($this->_request->isPost())
    	{
			$email = $this->_request->getPost("email");
			$username = $this->_request->getPost("username");
			$password = $this->_request->getPost("password");
			
			
			require_once "SaveAccount.php";
			$save = new SaveAccount();
			$save->saveAccount($username, $password, $email);
			
    	} else {
    		throw new Exception("Informacao submetida de maneira incorreta.");
    	}
    }

    public function newAction()
    {
		
    }

    public function activateAction()
    {
        $emailToActivate = $this->_request->getQuery("email");
    }
    
    public function updateAction() {
    	$view = new Zend_View();
    	$view->setScriptPath("application/views/scripts/account/");
    	$view->render("update.phtml");
    }


}







