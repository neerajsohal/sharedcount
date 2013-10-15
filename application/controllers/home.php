<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends __APP__ {

	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->form_validation->set_rules('url', 'URL', 'required|trim');
		if($this->form_validation->run() === false) {
			;
		} else {
			$url = $this->input->post('url');
			$this->data['counts'] = $this->get_counts($url);
		}
		$this->load->view('home/index', $this->data);
	}
	
	private function get_counts($url = null) {
		
		$fb_counts = @file_get_contents('http://graph.facebook.com/'.$url);
		
		$result = array();
		$result['facebook'] = json_decode($fb_counts);
		
		return $result;
		
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */