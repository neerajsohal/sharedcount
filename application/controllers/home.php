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
			$this->data['url'] = $url;
		}
		$this->load->view('home/index', $this->data);
	}
	
	private function get_counts($url = null) {
		$result = array();
		
		$fb_counts = @file_get_contents('http://graph.facebook.com/'.$url);
		$fb_counts = json_decode($fb_counts, true);
		
		(isset($fb_counts['comments']) && $fb_counts['comments'] > 0) ? : $fb_counts['comments'] = 0 ;
		(isset($fb_counts['shares']) && $fb_counts['shares'] > 0) ? : $fb_counts['shares'] = 0 ;

		$result['facebook'] = $fb_counts;

		$tw_counts = @file_get_contents('http://cdn.api.twitter.com/1/urls/count.json?url='.$url);
		$result['twitter'] = json_decode($tw_counts);

		$pin_counts = @file_get_contents('http://api.pinterest.com/v1/urls/count.json?callback=&url='.$url);
		$result['pinterest'] = json_decode(trim( $pin_counts, '()'));
		
		return $result;
		
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
