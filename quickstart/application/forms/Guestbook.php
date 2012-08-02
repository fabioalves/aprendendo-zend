<?php

class Application_Form_Guestbook extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$this->setMethod('post');
    	
    	$this->addElement('text', 'email', 
    		array(
    			'label' => "Seu endereço de e-mail:",
    			'required' => true,
    			'filters' => array('StringTrim'), 
    			'validators' => array(
    				'EmailAddress'
    				)
    		));
    				
    	$this->addElement('textarea', 'comment', 
    		array(
    			'label' => "Comentário",
    			'required' => true,
    			'validators' => array(
    				array(
    					'validator' => 'StringLength',
    					'options' => array(0, 20)
    				)
    			)
    		));
    	
    	$this->addElement('captcha', 'captcha', 
    		array(
    			'label' => 'Digite os caracteres abaixo:',
    			'required' => true,
    			'captcha' => 
    				array(
    					'captcha' => 'Figlet',
    					'wordLen' => 5,
    					'timeout' => 300
    				)
    		));
    		
    	$this->addElement('submit', 'submit', 
    		array(
    			'ignore' => true,
    			'label' => 'Assinar Guestbook'
    		));
    		
    	$this->addElement('hash', 'csrf', array('ignore' => true));
    	
    	
    }


}

