<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("news_model","news");
		$this->permission->admin();
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('news_status !=' => 0);
		$condition['orderby'] = "news_status DESC,news_lastedit DESC";
		$data['listdata'] = $this->news->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('news/main',$data);
	}

	public function form($id = ""){
		$data = array();

		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('news_id' => $id, 'news_status !=' => 0);
			$data['listdata'] = $this->news->listData($condition);
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
		$this->template->backend('news/form',$data);
	}

	public function create($type = ""){

		if($this->tokens->verify('crfnews')){
			if($type == "en"){
				$data = array(
					'news_title_en' => $this->input->post('Text_titleEN'),
					'news_images_en' => $this->upfileimages('File_imagesEN'),
					'news_detail_en' => $this->input->post('Text_detailEN'),
					'news_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'news_datecreate' => date('Y-m-d H:i:s'),
					'news_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'news_lastedit' => date('Y-m-d H:i:s'),
					'news_show' => $this->input->post('Text_eye'),
					'news_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'news_title_th' => $this->input->post('Text_titleTH'),
					'news_images_th' => $this->upfileimages('File_imagesTH'),
					'news_detail_th' => $this->input->post('Text_detailTH'),
					'news_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'news_datecreate' => date('Y-m-d H:i:s'),
					'news_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'news_lastedit' => date('Y-m-d H:i:s'),
					'news_show' => $this->input->post('Text_eye'),
					'news_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->news->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('article/news/form/'.$Id)
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
		if($this->tokens->verify('crfnews')){
			if($type == "en"){
				$data = array(
					'news_id' => $this->input->post('Id'),
					'news_title_en' => $this->input->post('Text_titleEN'),
					'news_images_en' => $this->upfileimages('File_imagesEN'),
					'news_detail_en' => $this->input->post('Text_detailEN'),
					'news_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'news_lastedit' => date('Y-m-d H:i:s'),
					'news_show' => $this->input->post('Text_eye'),
					'news_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'news_id' => $this->input->post('Id'),
					'news_title_th' => $this->input->post('Text_titleTH'),
					'news_images_th' => $this->upfileimages('File_imagesTH'),
					'news_detail_th' => $this->input->post('Text_detailTH'),
					'news_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'news_lastedit' => date('Y-m-d H:i:s'),
					'news_show' => $this->input->post('Text_eye'),
					'news_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
				die;
			}
			$Id = $this->news->updateData($data);
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
			'news_id' => $Id,
			'news_status' => 0,
			'news_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'news_lastedit' => date('Y-m-d H:i:s')
		);
		$this->news->updateData($data);
		header("location:".site_url('article/news/index'));
	}

	private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name])){
			$new_name = time();
			$config['upload_path'] = './uploads/news/';
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
