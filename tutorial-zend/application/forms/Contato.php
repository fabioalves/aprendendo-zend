<?php

class Application_Form_Contato extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setName('Contato');
    	$this->setAction('contato');
    	$this->setMethod('post');
    	$this->setAttrib('enctype', 'multipart/form-data');
    	$this->setAttrib('id', 'form-contato');

    	
    	$tratamento = new Zend_Form_Element_Radio('tratamento');
    	$tratamento->setLabel('Como gostaria de ser atendido?');
    	$tratamento->addMultiOptions(
    			array(
    				'Você' => 'Você',
    				'Sr(a).' => 'Sr(a)',
    				'Pelo Nome' => 'Pelo Nome'
    			)
    		)->setValue('Pelo Nome');
    		
    	$nome = new Zend_Form_Element_Text('nome');
    	$nome->setLabel('Nome')
    		 ->setRequired(TRUE)
    		 ->addValidator('NotEmpty')
    		 ->addFilter('StripTags')
    		 ->addFilter('StringTrim')
    		 ->addErrorMessage('Informe o seu nome');
    		 
    	
    	$email = new Zend_Form_Element_Text('email');
    	$email->setLabel('E-Mail');
    	
    	$assunto = new Zend_Form_Element_Select('assunto');
    	$assunto->setLabel('Assunto')
    		->addMultiOptions(
    			array(
    				'' => ' -- Escolha um Assunto -- ',
    				'Dúvidas' => 'Dúvidas',
    				'Elogios' => 'Elogios',
    				'Reclamações' => 'Reclamações',
    				'Outros' => 'Outros'
    			)
    		);
    		
    	$mensagem = new Zend_Form_Element_Textarea('mensagem');
    	$mensagem->setLabel('Mensagem');
    	
    	$newsletter = new Zend_Form_Element_MultiCheckbox('newsletter');
    	$newsletter->setLabel('Gostaria de Assinar Nosso Newsletter?')
    		->addMultiOptions(
    			array(
    				'Tecnologia' => 'Tecnologia',
    				'Entretenimento' => 'Entretenimento',
    				'Cursiosidades' => 'Cursiosidades',
    				'Produtos' => 'Produtos',
    				'Nenhum' => 'Não quero receber'
    			)
    		)->setValue('Nenhum');
    	
    	$submit = new Zend_Form_Element_Submit('submit');
    	$submit->setLabel('Enviar');
    	
    	$this->addElements(
    		array(
    			$tratamento,
    			$nome,
    			$email,
    			$assunto,
    			$mensagem,
    			$newsletter,
    			$submit
    		)
    	);
    		
    	
    }


}












