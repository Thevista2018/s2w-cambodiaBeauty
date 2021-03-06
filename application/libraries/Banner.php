<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner {

	function __construct(){
		$this->CI =& get_instance();
		log_message('debug', 'Getlanguage Class Initialized');
	}

	public function show(){
		// Settings page
		$this->CI->db->select("*");
		$this->CI->db->where(array('banner_status !=' => 0,'banner_show' => 1));
		$this->CI->db->order_by('banner_sort ASC,banner_id ASC');
		$query = $this->CI->db->get('tb_banner');
		$listbanner = $query->result_array();
		$html = '';
		if(count($listbanner) != 0){
			foreach ($listbanner as $key => $value) {
				$html.= '<div class="widget margin-Top-wedget clearfix">
				  <a href="'.$value['banner_link'].'" class="hvr-radial-out">
					<img class="border-color-menuLeft" src="'.base_url('uploads/banner/'.$value['banner_image']).'" alt="">
				  </a>
				</div>';
			}
		}

		return $html;
	}

}
