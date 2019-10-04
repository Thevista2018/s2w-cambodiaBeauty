<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("banner_model","banner");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		// List data contents
		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('banner_status !=' => 0);
		$condition['orderby'] = "banner_sort asc";
		$data['listdata'] = $this->banner->listData($condition);

		$this->template->backend('banner/main',$data);
	}

	public function form($id = ""){

			$data = array();

			if(!empty($id)){
				//Data in case update
				$condition = array();
				$condition['fide'] = "*";
				$condition['where'] = array('banner_id' => $id, 'banner_status !=' => 0);
				$data['listdata'] = $this->banner->listData($condition);
				if(count($data['listdata']) == 0){
					show_404();
				}
			}

			$data['crfbanner'] = $this->tokens->token('crfbanner');
			$this->template->backend('banner/form',$data);

	}

	public function create(){

		if($this->tokens->verify('crfbanner')){
			$data = $this->_setBanner();
			$data['banner_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
			$data['banner_datecreate'] = date('Y-m-d H:i:s');
			$Id = $this->banner->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('contents/banner/form/'.$Id)
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

	public function update(){
			if($this->tokens->verify('crfbanner')){
				$data = $this->_setBanner();
				$data['banner_id'] = $this->input->post('Id');
				$this->banner->updateData($data);
				$result = array(
					'error' => false,
					'title' => "Update data completed",
					'url' => site_url('contents/banner/index')
				);
				echo json_encode($result);
			}
			die;
	}

	private function _setBanner(){
			return array(
				'banner_link' => $this->input->post('Text_link'),
				'banner_image' => $this->upfileimages('File_images'),
				'banner_sort' => $this->input->post('Text_sort'),
				'banner_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'banner_lastedit' => date('Y-m-d H:i:s'),
				'banner_show' => $this->input->post('Text_eye'),
				'banner_status' => $this->input->post('Text_check')
			);
	}

	public function delete($Id){
		$data = array(
			'banner_id' => $Id,
			'banner_status' => 0,
			'banner_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'banner_lastedit' => date('Y-m-d H:i:s')
		);
		$this->banner->updateData($data);
		header("location:".site_url('contents/banner/index'));
		die;
	}

	private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name]['name'])){
			$new_name = time();
			$config['upload_path'] = './uploads/banner/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $new_name;
			$config['max_size']	= '3500';
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
