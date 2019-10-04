<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Industry extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("industry_model","industry");
		$this->permission->admin();
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('industry_status !=' => 0);
		$condition['orderby'] = "industry_status DESC,industry_sort ASC";
		$data['listdata'] = $this->industry->listData($condition);

		$this->template->backend('industry/main',$data);
	}

	public function form($id = ""){
		$data = array();

		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('industry_id' => $id, 'industry_status !=' => 0);
			$data['listdata'] = $this->industry->listData($condition);
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

		$data['crfindustry'] = $this->tokens->token('crfindustry');
		$this->template->backend('industry/form',$data);
	}

	public function create(){

		if($this->tokens->verify('crfindustry')){
			$data = $this->_setIndustry();
			$data['industry_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
			$data['industry_datecreate'] = date('Y-m-d H:i:s');
			$Id = $this->industry->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('article/industry/form/'.$Id)
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
		if($this->tokens->verify('crfindustry')){
			$data = $this->_setIndustry();
			$data['industry_id'] = $this->input->post('Id');
			$Id = $this->industry->updateData($data);
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

	private function _setIndustry(){
			return array(
				'industry_link' => $this->input->post('Text_link'),
				'industry_title' => $this->input->post('Text_title'),
				'industry_detail' => $this->input->post('Text_detail'),
				'industry_sort' => $this->input->post('Text_sort'),
				'industry_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'industry_lastedit' => date('Y-m-d H:i:s'),
				'industry_show' => $this->input->post('Text_eye'),
				'industry_status' => $this->input->post('Text_check')
			);
	}

	public function delete($Id){
		$data = array(
			'industry_id' => $Id,
			'industry_status' => 0,
			'industry_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'industry_lastedit' => date('Y-m-d H:i:s')
		);
		$this->industry->updateData($data);
		header("location:".site_url('article/industry/index/'));
		die;
	}

}
