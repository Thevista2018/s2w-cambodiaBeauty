<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallerys extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("gallerys_model","gallerys");
		$this->load->library("banner");
	}

	public function index(){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";
		$condition['where'] = "gallery_status != 0 AND gallery_show = 1";
		$condition['orderby'] = "gallery_status DESC,gallery_datecreate DESC";
		$data['listData'] = $this->gallerys->listData($condition);

		$this->template->frontend('gallery/main',$data);
	}

	public function testgallerys(){
		$data = array();

		$condition = array();

		$condition['fide'] = "*";
		$condition['where'] = "gallery_status != 0 AND gallery_show = 1";
		$condition['orderby'] = "gallery_status DESC,gallery_datecreate DESC";
		$data['listData'] = $this->gallerys->listData($condition);

		$this->template->frontend('gallery/testgallerys',$data);
	}

	public function gallerydetail($id){
		$data = array();
		if(!empty($id)){
			$condition = array();

			$condition['fide'] = "*";
			$condition['where'] = "gallery_status != 0 AND gallery_show = 1 AND gallery_id = ".$id;
			$data['listData'] = $this->gallerys->listData($condition);
			if(count($data['listData']) == 0){
				show_404();
			}
		}else{
			show_404();
		}

		$this->template->frontend('gallery/gallerydetail',$data);
	}

}
