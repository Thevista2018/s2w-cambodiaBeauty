<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Knowledge extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->load->model("knowledge_model","knowledge");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "know_id,know_title_en,know_detail_en,know_title_th,know_detail_th,know_lastedit,know_editby,know_createby,know_datecreate,know_show,know_status";
		$condition['where'] = array('know_status !=' => 0);
		$condition['orderby'] = "know_status DESC,know_lastedit DESC";
		$data['listdata'] = $this->knowledge->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('knowledge/main',$data);
	}

	public function form($id = ""){

		$data = array();
		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('know_id' => $id, 'know_status !=' => 0);
			$data['listdata'] = $this->knowledge->listData($condition);
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

		$data['crfknowledge'] = $this->tokens->token('crfknowledge');
		$this->template->backend('knowledge/form',$data);
	}

	public function create($type = ""){

		if($this->tokens->verify('crfknowledge')){
			if($type == "en"){
				$data = array(
					'know_title_en' => $this->input->post('Text_titleEN'),
					'know_images_en' => $this->upfileimages('File_imagesEN'),
					'know_detail_en' => $this->input->post('Text_detailEN'),
					'know_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_datecreate' => date('Y-m-d H:i:s'),
					'know_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_lastedit' => date('Y-m-d H:i:s'),
					'know_show' => $this->input->post('Text_eye'),
					'know_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'know_title_th' => $this->input->post('Text_titleTH'),
					'know_images_th' => $this->upfileimages('File_imagesTH'),
					'know_detail_th' => $this->input->post('Text_detailTH'),
					'know_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_datecreate' => date('Y-m-d H:i:s'),
					'know_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_lastedit' => date('Y-m-d H:i:s'),
					'know_show' => $this->input->post('Text_eye'),
					'know_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->knowledge->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('article/knowledge/form/'.$Id)
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

	}

	public function update($type = "en"){
		if($this->tokens->verify('crfknowledge')){
			if($type == "en"){
				$data = array(
					'know_id' => $this->input->post('Id'),
					'know_title_en' => $this->input->post('Text_titleEN'),
					'know_images_en' => $this->upfileimages('File_imagesEN'),
					'know_detail_en' => $this->input->post('Text_detailEN'),
					'know_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_datecreate' => date('Y-m-d H:i:s'),
					'know_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_lastedit' => date('Y-m-d H:i:s'),
					'know_show' => $this->input->post('Text_eye'),
					'know_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'know_id' => $this->input->post('Id'),
					'know_title_th' => $this->input->post('Text_titleTH'),
					'know_images_th' => $this->upfileimages('File_imagesTH'),
					'know_detail_th' => $this->input->post('Text_detailTH'),
					'know_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_datecreate' => date('Y-m-d H:i:s'),
					'know_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'know_lastedit' => date('Y-m-d H:i:s'),
					'know_show' => $this->input->post('Text_eye'),
					'know_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->knowledge->updateData($data);
			$result = array(
				'error' => false,
				'title' => "Update data completed",
				'msg' => ""
			);
			echo json_encode($result);
			die;
		}else{
			$result = array(
				'error' => true,
				'title' => "Error",
				'msg' => "No tokens"
			);
			echo json_encode($result);
		}
	}

	public function delete($Id){
		$data = array(
			'know_id' => $Id,
			'know_status' => 0,
			'know_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'know_lastedit' => date('Y-m-d H:i:s')
		);
		$this->knowledge->updateData($data);
		header("location:".site_url('article/knowledge/index'));
	}

	private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name])){
			$new_name = time();
			$config['upload_path'] = './uploads/knowledge/';
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
