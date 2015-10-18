<?php
	/**
	* 
	*/
	class AppController extends Controller
	{
		
		protected function setRed($set,$red){
			$this->Session->setFlash($set);
			$his->redirect($red,null,false);
		}
	}
?>