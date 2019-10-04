<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Custom extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("custom_model","custom");
		$this->permission->admin();
		$this->load->library('getlanguage');
	}

	public function index($type = 'news'){
		// Type data
		// News 1,2
		// Publicities 3
		// Seminars 4,5

		$data = array();
		$data['type'] = $type;

		$condition = array();
		$condition['fide'] = "*";
		if($type == 'news'){
			$condition['where'] = "(article_type = 1 OR article_type = 2)";
		}else if($type == 'publicities'){
			$condition['where'] = "article_type = 3";
		}else if($type == 'seminars'){
			$condition['where'] = "(article_type = 4 OR article_type = 5)";
		}
		$condition['where'].= " AND article_status != 0";
		$condition['orderby'] = "article_status DESC,article_lastedit DESC";
		$data['listdata'] = $this->custom->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('custom/main',$data);
	}

	public function form($type = 'news',$id = ""){
		$data = array();
		$data['type'] = $type;

		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('article_id' => $id, 'article_status !=' => 0);
			$data['listdata'] = $this->custom->listData($condition);
			if(count($data['listdata']) == 0){
				show_404();
			}
		}

		$this->template->css(array(
			base_url('assets/inspinia/css/plugins/summernote/summernote'),
			base_url('assets/inspinia/css/plugins/summernote/summernote-bs3'),
			base_url('assets/inspinia/css/plugins/codemirror/codemirror'),
			base_url('assets/inspinia/css/plugins/codemirror/ambiance')
		));

		// Language
		$data['lg'] = $this->getlanguage->get();

		$data['crfnews'] = $this->tokens->token('crfnews');
		$this->template->backend('custom/form',$data);
	}

	public function create($type){

		if($this->tokens->verify('crfnews')){
			$data = $this->_setArticle();
			$data['article_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
			$data['article_datecreate'] = date('Y-m-d', strtotime($this->input->post('Text_date')));
			$Id = $this->custom->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('article/custom/form/'.$type.'/'.$Id)
			);
			echo json_encode($result);
		}else{
			$result = array(
				'error' => true,
				'title' => "Error",
				'msg' => "No tokens"
			);
			echo json_encode($result);
		}
		die;

	}

	public function update($type){
		if($this->tokens->verify('crfnews')){
			$data = $this->_setArticle();
			$data['article_id'] = $this->input->post('Id');
			$data['article_datecreate'] = date('Y-m-d', strtotime($this->input->post('Text_date')));
			$Id = $this->custom->updateData($data);
			$result = array(
				'error' => false,
				'title' => "Update data completed",
				'msg' => ""
			);
			echo json_encode($result);
		}else{
			$result = array(
				'error' => true,
				'title' => "Error",
				'msg' => "No tokens"
			);
			echo json_encode($result);
		}
		die;
	}

	private function _setArticle(){
			return array(
				'article_type' => $this->input->post('Text_type'),
				'article_image' => $this->upfileimages('File_images'),
				'article_url' => $this->input->post('Text_url'),
				'article_title' => $this->input->post('Text_title'),
				'article_detail' => $this->input->post('Text_detail'),
				'article_sort' => $this->input->post('Text_sort'),
				'article_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'article_lastedit' => date('Y-m-d H:i:s'),
				'article_show' => $this->input->post('Text_eye'),
				'article_status' => $this->input->post('Text_check')
			);
	}

	public function delete($type,$Id){
		$data = array(
			'article_id' => $Id,
			'article_status' => 0,
			'article_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'article_lastedit' => date('Y-m-d H:i:s')
		);
		$this->custom->updateData($data);
		header("location:".site_url('article/custom/index/'.$type));
		die;
	}

	private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name])){
			$new_name = time();
			$config['upload_path'] = './uploads/custom/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $new_name;
			$config['max_size']	= '35000';
			$this->load->library('upload', $config ,'upbanner');
			$this->upbanner->initialize($config);
			if ( ! $this->upbanner->do_upload($Fild_Name)){
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => $this->upbanner->display_errors()
				);
				echo json_encode($result);
				die;
			}else{
				if(!empty($fileold)){
					@unlink($config['upload_path'].$fileold);
				}
				$img = $this->upbanner->data();
				return $img['file_name'];
			}
		}else{
			return $fileold;
		}
	}

}
