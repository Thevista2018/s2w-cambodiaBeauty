<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dowload extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("dowload_model","dowload");
		$this->load->library("banner");
	}

	public function index(){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";
		$condition['where'] = "download_status != 0 AND download_show = 1";
		$condition['orderby'] = "download_sort ASC, download_id DESC";
		$data['listData'] = $this->dowload->listData($condition);

		$this->template->frontend('dowload/main',$data);
	}

	public function brochure(){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";
		$condition['where'] = "download_status != 0 AND download_show = 1 AND download_type = 1";
		$condition['orderby'] = "download_sort ASC, download_id DESC";
		$data['listData'] = $this->dowload->listData($condition);
		$data['Pages'] = 'Brochure';

		$this->template->frontend('dowload/release',$data);
	}

	public function others(){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";
		$condition['where'] = "download_status != 0 AND download_show = 1 AND download_type = 2";
		$condition['orderby'] = "download_sort ASC, download_id DESC";
		$data['listData'] = $this->dowload->listData($condition);
		$data['Pages'] = 'Others';

		$this->template->frontend('dowload/release',$data);
	}



}
