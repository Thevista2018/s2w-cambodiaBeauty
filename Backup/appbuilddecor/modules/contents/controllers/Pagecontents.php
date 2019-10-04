<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagecontents extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("pagecontents_model","pagecontents");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		// List data contents
		$condition = array();
		$condition['fide'] = "con_id,con_page_en,con_decision_en,con_page_th,con_decision_th,con_page_en,con_editby,con_lastedit";
		$condition['where'] = array('con_status' => 1);
		$condition['orderby'] = "con_sort asc";
		$data['listdata'] = $this->pagecontents->listData($condition);

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$this->template->backend('pagecontents/main',$data);
	}

	public function form($id = ""){
		if(!empty($id)){
			$data = array();

			//Data in case update
			$condition = array();
			$condition['fide'] = "con_id,con_page_th,con_decision_th,con_detail_th,con_page_en,con_decision_en,con_detail_en";
			$condition['where'] = array('con_id' => $id, 'con_status' => 1);
			$data['listdata'] = $this->pagecontents->listData($condition);
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

		$this->template->backend('pagecontents/form',$data);
	}
	public function create($type = ""){
		if($this->tokens->verify('crfcontents')){
			if($type == "en"){
				$data = $this->_setContentEN();
			}else if($type == "th"){
				$data = $this->_setContentTH();
			}else{
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => "No type"
				);
				echo json_encode($result);
			}
			$data['con_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
			$data['con_datecreate'] = date('Y-m-d H:i:s');
			$Id = $this->pagecontents->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('contents/pagecontents/form/'.$Id)
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
				if($type == "en"){
					$data = $this->_setContentEN();
				}else if("th"){
					$data = $this->_setContentTH();
				}
				$data['con_id'] = $this->input->post('Id');
				$this->pagecontents->updateData($data);
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

	private function _setContentEN(){
			return array(
				'con_page_en' => $this->input->post('Text_namePageEN'),
				'con_decision_en' => $this->input->post('Text_decisionEN'),
				'con_detail_en' => $this->input->post('Text_detailPageEN'),
				'con_status' => 1,
				'con_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'con_lastedit' => date('Y-m-d H:i:s')
			);
	}

	private function _setContentTH(){
			return array(
				'con_page_th' => $this->input->post('Text_namePageTH'),
				'con_decision_th' => $this->input->post('Text_decisionTH'),
				'con_detail_th' => $this->input->post('Text_detailPageTH'),
				'con_status' => 1,
				'con_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'con_lastedit' => date('Y-m-d H:i:s')
			);
	}

	public function delete($Id){
		$data = array(
			'con_id' => $Id,
			'con_status' => 0,
			'con_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'con_lastedit' => date('Y-m-d H:i:s')
		);
		$this->pagecontents->updateData($data);
		header("location:".site_url('contents/pagecontents/index'));
		die;
	}

}
