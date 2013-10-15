<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends __APP__ {

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view('home/index', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */