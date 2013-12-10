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
		
		$fql  = "SELECT url, normalized_url, share_count, like_count, comment_count, ";
		$fql .= "total_count, commentsbox_count, comments_fbid, click_count FROM ";
		$fql .= "link_stat WHERE url = '".$url."'";

		$apifql="https://api.facebook.com/method/fql.query?format=json&query=".urlencode($fql);
		$json=file_get_contents($apifql);
		$result['facebook'] = json_decode($json, true);
		/*$fb_counts = @file_get_contents('http://graph.facebook.com/'.$url);
		$fb_counts = json_decode($fb_counts, true);
		
		(isset($fb_counts['comments']) && $fb_counts['comments'] > 0) ? : $fb_counts['comments'] = 0 ;
		(isset($fb_counts['shares']) && $fb_counts['shares'] > 0) ? : $fb_counts['shares'] = 0 ;
		(isset($fb_counts['likes']) && $fb_counts['likes'] > 0) ? : $fb_counts['likes'] = 0 ;

		*/

		$result['facebook'] = $result['facebook'][0];

		$tw_counts = @file_get_contents('http://cdn.api.twitter.com/1/urls/count.json?url='.$url);
		$result['twitter'] = json_decode($tw_counts);

		$pin_counts = @file_get_contents('http://api.pinterest.com/v1/urls/count.json?callback=processpins&url='.$url);
		$result['pinterest'] = json_decode(trim( $pin_counts, 'processpins()'));

		$linkedin_counts = @file_get_contents('http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json');
		$result['linkedin'] = json_decode($linkedin_counts);

		$su_counts = @file_get_contents('http://www.stumbleupon.com/services/1.01/badge.getinfo?url='.$url);
		$su_counts = json_decode($su_counts, true);
		(isset($su_counts['result']['views']) && $su_counts['result']['views'] > 0) ? : $su_counts['result']['views'] = 0 ;

		$result['stumbleupon'] = $su_counts;

		return $result;
		
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
