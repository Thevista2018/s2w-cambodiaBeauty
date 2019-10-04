<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Application extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("application_model","application");
		$this->load->helper('statusapply');
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('apply_status' => 1);
		$condition['orderby'] = "apply_id DESC";
		$data['listdata'] = $this->application->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('application/main',$data);
	}

	public function previewapply($id = ""){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('apply_id' => $id);
		$data['listdata'] = $this->application->listData($condition);
		if(count($data['listdata']) != 0){
			
			// Language
			$data['lg'] = $this->getlanguage->get();

			$this->template->backend('application/previewapply',$data);
		}else{
			show_404();
		}
	}

	public function delete($Id){
		$data = array(
			'apply_id' => $Id,
			'apply_status' => 0,
			'apply_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'apply_lastedit' => date('Y-m-d H:i:s')
		);
		$this->application->updateData($data);
		header("location:".site_url('jobposition/application/index'));
	}

}
