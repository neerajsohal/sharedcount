<?php

class __APP__ extends CI_Controller {
	
	protected $data;
	
	function __construct() {
		parent::__construct();
		$this->__init();
	}
	
	private function __init() {
		$this->form_validation->set_error_delimiters(' <p class="redColor small"><small>', '</small></p> ');
	}
	
}