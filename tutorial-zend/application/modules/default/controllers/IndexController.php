<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
    	$this->request = $this->getRequest();
    	
    	$this->view->module = $this->request->getModuleName();
    	$this->view->controller = $this->request->getControllerName();
    	$this->view->action = $this->request->getActionName();
    }

    public function indexAction()
    {
    	$this->view->pageTitle = 'Pagina Inicial - Tutorial Zend';
    	$this->view->contentTitle = 'Bem vindo';
    	
    }

    public function quemSomosAction()
    {
        // action body
    }

    public function servicosAction()
    {
        
    	
    }

    public function produtosAction()
    {
    // action body
        $produtos = array(
        	1 => array(
        		'nome' => 'TV',
        		'descricao' => 'Descrição da TV aqui'
        	),
        	2 => array(
        		'nome' => 'Celular',
        		'descricao' => 'Descrição do Celular aqui'
        	),
        	3 => array(
        		'nome' => 'Notebook',
        		'descricao' => 'Descrição da Notebook aqui'
        	),
        	4 => array(
        		'nome' => 'Aparelho de Som',
        		'descricao' => 'Descrição do Aparelho aqui'
        	)
        );
        
        $id = $this->request->getParam('id');
        
        if($id != false)
        {
        	$this->view->id = $id;
        	$this->view->nome = $produtos[$id]['nome'];
        	$this->view->descricao = $produtos[$id]['descricao'];
        }
    }

    public function contatoAction()
    {
        $form = new Application_Form_Contato();
        $this->view->form = $form;
        
        $dadosFormulario = $this->getRequest()->getPost();
        
        if($this->getRequest()->isPost()){
        	if($form->isValid($dadosFormulario)) {
        		
        	}else {
        		$form->populate($dadosFormulario);
        	}
        }
    }


}









