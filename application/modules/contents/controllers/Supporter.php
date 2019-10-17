<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supporter extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("supporter_model","supporter");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		// List data contents
		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('supporter_status' => 1);
		$condition['orderby'] = "supporter_sort asc";
		$data['listdata'] = $this->supporter->listData($condition);

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$this->template->backend('supporter/main',$data);
	}

	public function form($id = ""){
		if(!empty($id)){
			$data = array();

			//Data in case update
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('supporter_id' => $id, 'supporter_status' => 1);
			$data['listdata'] = $this->supporter->listData($condition);
			if(count($data['listdata']) == 0){
				show_404();
			}

		}

		$this->template->css(array(
			base_url('assets/inspinia/css/plugins/summernote/summernote'),
			base_url('assets/inspinia/css/plugins/codemirror/codemirror'),
			base_url('assets/inspinia/css/plugins/codemirror/ambiance')
		));

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$data['crfcontents'] = $this->tokens->token('crfcontents');

		$this->template->backend('supporter/form',$data);
	}
	public function create($type = ""){
		if($this->tokens->verify('crfcontents')){
			if($type == "th"){
                $data = $this->_setContentTH();
				$data['supporter_status'] = 1;
                
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$data['supporter_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
			$data['supporter_datecreate'] = date('Y-m-d H:i:s');
			$Id = $this->supporter->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('contents/supporter/form/'.$Id)
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
	public function update($type = ""){
		if(!empty($type)){
			if($this->tokens->verify('crfcontents')){
				if("th"){
					$data = $this->_setContentTH();
				}
				$data['supporter_id'] = $this->input->post('Id');
				$this->supporter->updateData($data);
				$result = array(
					'error' => false,
					'title' => "Update data completed",
					'msg' => ""
				);
				echo json_encode($result);
			}
		}
		die;
	}

	private function _setContentTH(){
			return array(
				'supporter_title' => $this->input->post('Text_Title'),
				'supporter_title2' => $this->input->post('Text_Title2'),
                'supporter_sort' => $this->input->post('Text_sort'),
                'supporter_show' => 1,
				'supporter_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'supporter_lastedit' => date('Y-m-d H:i:s')
			);
	}

	public function delete($Id){
		$data = array(
			'supporter_id' => $Id,
            'supporter_status' => 0,
			'supporter_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'supporter_lastedit' => date('Y-m-d H:i:s')
		);
		$this->supporter->updateData($data);
		header("location:".site_url('contents/supporter/index'));
		die;
	}

}
