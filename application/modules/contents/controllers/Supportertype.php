<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supportertype extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("supportertype_model","supportertype");
		$this->load->library('getlanguage');
	}

	public function index($Id){
		$data = array();

		//List data contents
		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('supporter_status' => 1, 'supporter_id' => $Id);
		$data['listcontent'] = $this->supportertype->listContents($condition);
		if(count($data['listcontent']) != 0){

			//List data supportertype
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('supportertype_status' => 1, 'supporter_id' => $Id);
			$data['listdata'] = $this->supportertype->listData($condition);

		}else{
			show_404();
		}

		$data['supporter_id'] = $Id;

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$this->template->backend('supportertype/main',$data);
	}

	public function form($supportertype_id = "",$id = ""){
		$this->permission->admin();
		$data = array();

		//Data in case update
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('supportertype_id' => $id, 'supportertype_status' => 1);
			$data['listdata'] = $this->supportertype->listData($condition);
			if(count($data['listdata']) == 0){
				show_404();
			}
		}

		$data['supporter_id'] = $supportertype_id;

		$this->template->css(array(
			base_url('assets/inspinia/css/plugins/summernote/summernote'),
			base_url('assets/inspinia/css/plugins/codemirror/codemirror'),
			base_url('assets/inspinia/css/plugins/codemirror/ambiance')
		));

		// Language
		$data['lg_set'] = $this->getlanguage->set();
		$data['lg_get'] = $this->getlanguage->get();

		$data['crfsubcontent'] = $this->tokens->token('crfsubcontent');
		$this->template->backend('supportertype/form',$data);
	}

	public function create($type = ""){
		if(!empty($type)){
			if($this->tokens->verify('crfsubcontent')){
				
				$data = $this->_setContentTH();
				
				$data['supportertype_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
				$data['supportertype_datecreate'] = date('Y-m-d H:i:s');
				$data['supportertype_show'] = 1;
				$Id = $this->supportertype->insertData($data);

				$supportertype_id = $this->input->post('supporter_id');

				$result = array(
					'error' => false,
					'url' => site_url('contents/supportertype/form/'.$supportertype_id.'/'.$Id)
				);
				echo json_encode($result);

			}
		}
		die;
	}

	public function update($type = ""){
		if(!empty($type)){
			if($this->tokens->verify('crfsubcontent')){
				$data = $this->_setContentTH();
				$data['supportertype_id'] = $this->input->post('Id');

				$this->supportertype->updateData($data);
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
				'supporter_id' => $this->input->post('supporter_id'),
				'supportertype_images' => $this->upfileimages('Text_logo'),
				'supportertype_url' => $this->input->post('Text_url'),
				'supportertype_sort' => $this->input->post('Text_sort'),
				'supportertype_wigth' => $this->input->post('Text_Wigth'),
				'supportertype_height' => $this->input->post('Text_Height'),
				'supportertype_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'supportertype_lastedit' => date('Y-m-d H:i:s'),
				'supportertype_status' => 1,
			);
	}

	public function delete($Id){
		//List data supportertype
		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('supportertype_status' => 1, 'supportertype_id' => $Id);
		$listdata = $this->supportertype->listData($condition);
		if(count($listdata) != 0){
			$data = array(
				'supportertype_id' => $Id,
				'supportertype_status' => 0,
				'supportertype_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'supportertype_lastedit' => date('Y-m-d H:i:s')
			);
			$this->supportertype->updateData($data);
			header("location:".site_url('contents/supportertype/index/'.$listdata[0]['supportertype_id']));
		}
		die;
    }
    
    private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name]['name'])){
			$new_name = time();
			$config['upload_path'] = './uploads/supporter/';
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
