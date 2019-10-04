<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Position extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("position_model","position");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "job_id,job_position_en,job_quantity_en,job_salary_en,job_createby,job_datecreate,job_lastedit,job_editby,job_show,job_status";
		$condition['fide'].= ",job_position_th,job_quantity_th,job_salary_th";
		$condition['where'] = array('job_status !=' => 0);
		$condition['orderby'] = "job_status DESC,job_lastedit DESC";
		$data['listdata'] = $this->position->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('position/main',$data);
	}
	public function form($id = ""){
		$data = array();

		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('job_id' => $id, 'job_status !=' => 0);
			$data['listdata'] = $this->position->listData($condition);
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

		$data['crfposition'] = $this->tokens->token('crfposition');
		$this->template->backend('position/form',$data);

	}

	public function create($type = ""){

		if($this->tokens->verify('crfposition')){
			if($type == "en"){
				$data = array(
					'job_position_en' => $this->input->post('Text_positionEN'),
					'job_detail_en' => $this->input->post('Text_detailEN'),
					'job_attribute_en' => $this->input->post('Text_attributeEN'),
					'job_quantity_en' => $this->input->post('Text_quantityEN'),
					'job_salary_en' => $this->input->post('Text_salaryEN'),
					'job_fileapplication_en' => $this->upfile('File_fileEN'),
					'job_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_datecreate' => date('Y-m-d H:i:s'),
					'job_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_lastedit' => date('Y-m-d H:i:s'),
					'job_show' => $this->input->post('Text_eye'),
					'job_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'job_position_th' => $this->input->post('Text_positionTH'),
					'job_detail_th' => $this->input->post('Text_detailTH'),
					'job_attribute_th' => $this->input->post('Text_attributeTH'),
					'job_quantity_th' => $this->input->post('Text_quantityTH'),
					'job_salary_th' => $this->input->post('Text_salaryTH'),
					'job_fileapplication_th' => $this->upfile('File_fileTH'),
					'job_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_datecreate' => date('Y-m-d H:i:s'),
					'job_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_lastedit' => date('Y-m-d H:i:s'),
					'job_show' => $this->input->post('Text_eye'),
					'job_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->position->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('jobposition/position/form/'.$Id)
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
		if($this->tokens->verify('crfposition')){
			if($type == "en"){
				$data = array(
					'job_id' => $this->input->post('Id'),
					'job_position_en' => $this->input->post('Text_positionEN'),
					'job_detail_en' => $this->input->post('Text_detailEN'),
					'job_attribute_en' => $this->input->post('Text_attributeEN'),
					'job_quantity_en' => $this->input->post('Text_quantityEN'),
					'job_salary_en' => $this->input->post('Text_salaryEN'),
					'job_fileapplication_en' => $this->upfile('File_fileEN'),
					'job_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_datecreate' => date('Y-m-d H:i:s'),
					'job_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_lastedit' => date('Y-m-d H:i:s'),
					'job_show' => $this->input->post('Text_eye'),
					'job_status' => $this->input->post('Text_check')
				);
			}else if($type == "th"){
				$data = array(
					'job_id' => $this->input->post('Id'),
					'job_position_th' => $this->input->post('Text_positionTH'),
					'job_detail_th' => $this->input->post('Text_detailTH'),
					'job_attribute_th' => $this->input->post('Text_attributeTH'),
					'job_quantity_th' => $this->input->post('Text_quantityTH'),
					'job_salary_th' => $this->input->post('Text_salaryTH'),
					'job_fileapplication_th' => $this->upfile('File_fileTH'),
					'job_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_datecreate' => date('Y-m-d H:i:s'),
					'job_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'job_lastedit' => date('Y-m-d H:i:s'),
					'job_show' => $this->input->post('Text_eye'),
					'job_status' => $this->input->post('Text_check')
				);
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$Id = $this->position->updateData($data);
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
			'job_id' => $Id,
			'job_status' => 0,
			'job_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'job_lastedit' => date('Y-m-d H:i:s')
		);
		$this->position->updateData($data);
		header("location:".site_url('jobposition/position/index'));
	}

	private function upfile($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name])){
			$new_name = time();
			$config['upload_path'] = './uploads/application/';
			$config['allowed_types'] = 'pdf';
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
