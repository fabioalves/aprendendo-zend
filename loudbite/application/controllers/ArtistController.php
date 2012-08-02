<?php
class ArtistController extends Zend_Controller_Action {
	
	public function listAllArtistsAction() {
	}
	
	public function artistaffiliatecontentAction()
	{
		
	}
	
	public function newAction() {
		$genres = array(
			"Eletronic",
			"Rock",
			"R & B",
			"Hip-Hop",
			"Heavy-Metal",
			"Alternative Rock",
			"Jazz"
		);
		
		$this->view->genres = $genres;
	}
	
	public function saveArtistAction() {
		$artistName = $this->_request->getPost("artistName");
		$genre = $this->_request->getPost("genre");
		$rating = $this->_request->getPost("rating");
		$isFav = $this->_request->getPost("isFav");
		
		
	}
}