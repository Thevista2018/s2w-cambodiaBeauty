<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcontents extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("subcontents_model","subcontents");
		$this->load->library('getlanguage');
	}

	public function index($Id){
		$data = array();

		//List data contents
		$condition = array();
		$condition['fide'] = "con_id";
		$condition['where'] = array('con_status' => 1, 'con_id' => $Id);
		$data['listcontent'] = $this->subcontents->listContents($condition);
		if(count($data['listcontent']) != 0){

			//List data subcontents
			$condition = array();
			$condition['fide'] = "consub_id,consub_page_en,consub_decision_en,consub_page_th,consub_decision_th,consub_page_en,consub_editby,consub_lastedit";
			$condition['where'] = array('consub_status' => 1, 'con_id' => $Id);
			$data['listdata'] = $this->subcontents->listData($condition);

		}else{
			show_404();
		}

		$data['con_id'] = $Id;

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$this->template->backend('subcontents/main',$data);
	}

	public function form($con_id = "",$id = ""){
		$this->permission->admin();
		$data = array();

		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('consub_id' => $id, 'consub_status' => 1);
			$data['listdata'] = $this->subcontents->listData($condition);
			if(count($data['listdata']) == 0){
				show_404();
			}
		}

		$data['con_id'] = $con_id;

		$this->template->css(array(
			base_url('assets/inspinia/css/plugins/summernote/summernote'),
			base_url('assets/inspinia/css/plugins/codemirror/codemirror'),
			base_url('assets/inspinia/css/plugins/codemirror/ambiance')
		));

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$data['crfsubcontent'] = $this->tokens->token('crfsubcontent');
		$this->template->backend('subcontents/form',$data);
	}

	public function create($type = ""){
		if(!empty($type)){
			if($this->tokens->verify('crfsubcontent')){

				if($type == "en"){
					$data = $this->_setContentEN();

				}else if("th"){
					$data = $this->_setContentTH();
				}
				$data['consub_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
				$data['consub_datecreate'] = date('Y-m-d H:i:s');
				$Id = $this->subcontents->insertData($data);

				$con_id = $this->input->post('con_id');

				$result = array(
					'error' => false,
					'url' => site_url('contents/subcontents/form/'.$con_id.'/'.$Id)
				);
				echo json_encode($result);

			}
		}
		die;
	}

	public function update($type = ""){
		if(!empty($type)){
			if($this->tokens->verify('crfsubcontent')){
				if($type == "en"){
					$data = $this->_setContentEN();
				}else if("th"){
					$data = $this->_setContentTH();
				}
				$data['consub_id'] = $this->input->post('Id');
				$con_id = $this->input->post('con_id');

				$this->subcontents->updateData($data);
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
				'con_id' => $this->input->post('con_id'),
				'consub_page_en' => $this->input->post('Text_namePageEN'),
				'consub_decision_en' => $this->input->post('Text_decisionEN'),
				'consub_detail_en' => $this->input->post('Text_detailPageEN'),
				'consub_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'consub_lastedit' => date('Y-m-d H:i:s'),
				'consub_status' => 1
			);
	}
	private function _setContentTH(){
			return array(
				'con_id' => $this->input->post('con_id'),
				'consub_page_th' => $this->input->post('Text_namePageTH'),
				'consub_decision_th' => $this->input->post('Text_decisionTH'),
				'consub_detail_th' => $this->input->post('Text_detailPageTH'),
				'consub_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'consub_lastedit' => date('Y-m-d H:i:s'),
				'consub_status' => 1
			);
	}

	public function delete($Id){
		//List data subcontents
		$condition = array();
		$condition['fide'] = "con_id";
		$condition['where'] = array('consub_status' => 1, 'consub_id' => $Id);
		$listdata = $this->subcontents->listData($condition);
		if(count($listdata) != 0){
			$data = array(
				'consub_id' => $Id,
				'consub_status' => 0,
				'consub_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'consub_lastedit' => date('Y-m-d H:i:s')
			);
			$this->subcontents->updateData($data);
			header("location:".site_url('contents/subcontents/index/'.$listdata[0]['con_id']));
		}
		die;
	}

}
