<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activity extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->load->model("activity_model","activity");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "gallery_id,gallery_title_en,gallery_sort,gallery_detail_en,gallery_title_th,gallery_detail_th,gallery_createby,gallery_datecreate,gallery_lastedit,gallery_editby,gallery_show,gallery_status";
		$condition['where'] = array('gallery_status !=' => 0);
		$condition['orderby'] = "gallery_sort ASC,gallery_status DESC,gallery_lastedit DESC";
		$data['listdata'] = $this->activity->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('activity/main',$data);
	}

	public function form($id = ""){

		$data = array();
		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('gallery_id' => $id, 'gallery_status !=' => 0);
			$data['listdata'] = $this->activity->listData($condition);
			if(count($data['listdata']) == 0){
				show_404();
			}

			$condition = array();
			$condition['fide'] = "subgallery_id,subgallery_name,subgallery_images,subgallery_editby,subgallery_lastedit,subgallery_status";
			$condition['where'] = array('gallery_id' => $data['listdata'][0]['gallery_id'],'subgallery_status !=' => 0);
			$condition['orderby'] = "subgallery_status DESC,subgallery_lastedit DESC";
			$data['listimages'] = $this->activity->listsubData($condition);

		}

		$this->template->css(array(
			base_url('assets/inspinia/css/plugins/summernote/summernote'),
			base_url('assets/inspinia/css/plugins/summernote/summernote-bs3'),
			base_url('assets/inspinia/css/plugins/codemirror/codemirror'),
			base_url('assets/inspinia/css/plugins/codemirror/ambiance')
		));

		// Language
		$data['lg'] = $this->getlanguage->get();

		$data['crfactivity'] = $this->tokens->token('crfactivity');
		$this->template->backend('activity/form',$data);
	}

	public function create($type = ""){

		if($this->tokens->verify('crfactivity')){
			if($type == "en"){
				$data = array(
					'gallery_title_en' => $this->input->post('Text_titleEN'),
					'gallery_detail_en' => $this->input->post('Text_detailEN'),
					'gallery_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_datecreate' => date('Y-m-d', strtotime($this->input->post('Text_date'))),
					'gallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_lastedit' => date('Y-m-d H:i:s'),
					'gallery_show' => $this->input->post('Text_eye'),
					'gallery_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'gallery_title_th' => $this->input->post('Text_titleTH'),
					'gallery_detail_th' => $this->input->post('Text_detailTH'),
					'gallery_sort' => $this->input->post('Text_sort'),
					'gallery_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_datecreate' => date('Y-m-d', strtotime($this->input->post('Text_date'))),
					'gallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_lastedit' => date('Y-m-d H:i:s'),
					'gallery_show' => $this->input->post('Text_eye'),
					'gallery_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->activity->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('gallery/activity/form/'.$Id)
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

	public function update($type = "en"){
		if($this->tokens->verify('crfactivity')){
			if($type == "en"){
				$data = array(
					'gallery_id' => $this->input->post('Id'),
					'gallery_title_en' => $this->input->post('Text_titleEN'),
					'gallery_detail_en' => $this->input->post('Text_detailEN'),
					'gallery_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_datecreate' => date('Y-m-d', strtotime($this->input->post('Text_date'))),
					'gallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_lastedit' => date('Y-m-d H:i:s'),
					'gallery_show' => $this->input->post('Text_eye'),
					'gallery_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'gallery_id' => $this->input->post('Id'),
					'gallery_title_th' => $this->input->post('Text_titleTH'),
					'gallery_detail_th' => $this->input->post('Text_detailTH'),
					'gallery_sort' => $this->input->post('Text_sort'),
					'gallery_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_datecreate' => date('Y-m-d', strtotime($this->input->post('Text_date'))),
					'gallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'gallery_lastedit' => date('Y-m-d H:i:s'),
					'gallery_show' => $this->input->post('Text_eye'),
					'gallery_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->activity->updateData($data);
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

	public function delete($Id){
		$data = array(
			'gallery_id' => $Id,
			'gallery_status' => 0,
			'gallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'gallery_lastedit' => date('Y-m-d H:i:s')
		);
		$this->activity->updateData($data);
		header("location:".site_url('gallery/activity/index'));
		die;
	}

	public function deleteimg($activity,$Id){
		$data = array(
			'subgallery_id' => $Id,
			'subgallery_status' => 0,
			'subgallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'subgallery_lastedit' => date('Y-m-d H:i:s')
		);
		$this->activity->updateImage($data);
		header("location:".site_url('gallery/activity/form/'.$activity."/?tab=tab-3"));
		die;
	}

	public function favoriteimg($activity,$Id,$status){
		if($status == 1){
			$s = 2;
		}else{
			$s = 1;
		}
		$data = array(
			'subgallery_id' => $Id,
			'subgallery_status' => $s,
			'subgallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'subgallery_lastedit' => date('Y-m-d H:i:s')
		);
		$this->activity->updateImage($data);
		header("location:".site_url('gallery/activity/form/'.$activity."/?tab=tab-3"));
		die;
	}

	public function images(){
		if($this->tokens->verify('crfactivity')){
			$data = array(
				'gallery_id' => $this->input->post('Id'),
				'subgallery_name' => $this->input->post('Text_title'),
				'subgallery_images' => $this->upfileimages('File_images',$this->input->post('Id')),
				'subgallery_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'subgallery_datecreate' => date('Y-m-d H:i:s'),
				'subgallery_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'subgallery_lastedit' => date('Y-m-d H:i:s'),
				'subgallery_status' => 1
			);
			$Id = $this->activity->images($data);
			$result = array(
				'error' => false,
				'url' => site_url('gallery/activity/form/'.$this->input->post('Id')."/?tab=tab-3")
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

	private function upfileimages($Fild_Name,$Id){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name])){
			$new_name = $Id."_".time();
			$config['upload_path'] = './uploads/gallery/';
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
