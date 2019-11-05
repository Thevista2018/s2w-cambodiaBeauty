<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Salesrepresentative extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("salesrepresentative_model","salesrepresentative");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		// List data contents
		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('salerep_status !=' => 0);
		$condition['orderby'] = "salerep_sort asc";
		$data['listdata'] = $this->salesrepresentative->listData($condition);

		$this->template->backend('salesrepresentative/main',$data);
	}

	public function form($id = ""){

			$data = array();

			if(!empty($id)){
				//Data in case update
				$condition = array();
				$condition['fide'] = "*";
				$condition['where'] = array('salerep_id' => $id, 'salerep_status !=' => 0);
				$data['listdata'] = $this->salesrepresentative->listData($condition);
				if(count($data['listdata']) == 0){
					show_404();
				}
			}

			$data['crfsalesrepresentative'] = $this->tokens->token('crfsalesrepresentative');
			$this->template->backend('salesrepresentative/form',$data);

	}

	public function create(){

       
		if($this->tokens->verify('crfsalesrepresentative')){
			$data = $this->_setsalesrepresentative();
			$data['salerep_createby'] = $this->encryption->decrypt($this->input->cookie('sysn'));
            $data['salerep_datecreate'] = date('Y-m-d H:i:s');
            $data['salerep_status'] = 1;
            
            $Id = $this->salesrepresentative->insertData($data);
            
			$result = array(
				'error' => false,
				'url' => site_url('contents/salesrepresentative/form/'.$Id)
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

	public function update(){
			if($this->tokens->verify('crfsalesrepresentative')){
				$data = $this->_setsalesrepresentative();
				$data['salerep_id'] = $this->input->post('Id');
				$this->salesrepresentative->updateData($data);
				$result = array(
					'error' => false,
					'title' => "Update data completed",
                    'url' => site_url('contents/salesrepresentative/form/'.$this->input->post('Id'))
				);
				echo json_encode($result);
			}
			die;
	}


    public function show($id){

        $data['salerep_id'] = $id;
        $data['salerep_show'] = 1;

        $this->salesrepresentative->updateData($data);
        
        redirect('contents/salesrepresentative/index');
        
    }

    public function hide($id){
        
        $data['salerep_id'] = $id;
        $data['salerep_show'] = 2;

        $this->salesrepresentative->updateData($data);
        
        redirect('contents/salesrepresentative/index');

    }

	private function _setsalesrepresentative(){
			return array(
				'salerep_image' => $this->upfileimages('Text_file'),
				'salerep_name' => $this->input->post('Text_Title'),
				'salerep_company' => $this->input->post('Text_Company'),
				'salerep_contact' => $this->input->post('Text_Contact'),
				'salerep_email' => $this->input->post('Text_Email'),
				'salerep_tel' => $this->input->post('Text_Tel'),
				'salerep_sort' => $this->input->post('Text_sort'),
				'salerep_address' => $this->input->post('Text_Address'),
				'salerep_width' => $this->input->post('Text_width'),
				'salerep_height' => $this->input->post('Text_height'),
				'salerep_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'salerep_lastedit' => date('Y-m-d H:i:s'),
				'salerep_show' => $this->input->post('Text_eye')
			);
	}

	public function delete($Id){
		$data = array(
			'salerep_id' => $Id,
			'salerep_status' => 0,
			'salerep_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'salerep_lastedit' => date('Y-m-d H:i:s')
		);
		$this->salesrepresentative->updateData($data);
		header("location:".site_url('contents/salesrepresentative/index'));
		die;
	}

	private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name]['name'])){
			$new_name = time();
			$config['upload_path'] = './uploads/salesrepresentative/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $new_name;
			$config['max_size']	= '3500';
			$this->load->library('upload', $config ,'upsalesrepresentative');
			$this->upsalesrepresentative->initialize($config);
			if ( ! $this->upsalesrepresentative->do_upload($Fild_Name)){
				$result = array(
					'error' => true,
					'title' => "Error",
					'msg' => $this->upsalesrepresentative->display_errors()
				);
				echo json_encode($result);
				die;
			}else{
				if(!empty($fileold)){
					@unlink($config['upload_path'].$fileold);
				}
				$img = $this->upsalesrepresentative->data();
				return $img['file_name'];
			}
		}else{
			return $fileold;
		}
	}

}
