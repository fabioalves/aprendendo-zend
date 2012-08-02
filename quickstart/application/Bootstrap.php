<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initDoctype() {
		$this->_bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');		
	}
	

}

