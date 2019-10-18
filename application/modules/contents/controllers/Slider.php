<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("slider_model","slider");
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		// List data contents
		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('slider_status' => 1);
		$condition['orderby'] = "slider_id asc";
		$data['listdata'] = $this->slider->listData($condition);

		// Language
		$data['lg'] = $this->getlanguage->get();

		$this->template->backend('slider/main',$data);
	}

	public function form($id = ""){

			$data = array();

			if(!empty($id)){
				//Data in case update
				$condition = array();
				$condition['fide'] = "*";
				$condition['where'] = array('slider_id' => $id, 'slider_status' => 1);
				$data['listdata'] = $this->slider->listData($condition);
				if(count($data['listdata']) == 0){
					show_404();
				}
			}

			// Language
			$data['lg'] = $this->getlanguage->get();

			$data['crfslider'] = $this->tokens->token('crfslider');

			$this->template->backend('slider/form',$data);

	}

	public function create(){

		if($this->tokens->verify('crfslider')){

			$data = array(
				'slider_id' => $this->input->post('Id'),
				'slider_type' => $this->input->post('Text_slidertype'),
				'slider_name' => $this->upfile('File_images'),
				'slider_imagesvideo' => $this->upfile('File_videoimages'),
				'slider_video' => $this->upfile('File_video'),
				'slider_url' => $this->input->post('Text_linkurl'),
				'slider_msg_th' => $this->input->post('Text_msgTH'),
				'slider_color' => $this->input->post('Text_colors'),
				'slider_link' => $this->input->post('Text_link'),
				'slider_sort' => $this->input->post('Text_sort'),
				'slider_status' => 1,
				'slider_createby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'slider_datecreate' => date('Y-m-d H:i:s'),
				'slider_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
				'slider_lastedit' => date('Y-m-d H:i:s')
			);

			$Id = $this->slider->insertData($data);
			$result = array(
				'error' => false,
				'url' => site_url('contents/slider/index')
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
			if($this->tokens->verify('crfslider')){
					$data = array(
						'slider_id' => $this->input->post('Id'),
						'slider_type' => $this->input->post('Text_slidertype'),
						'slider_name' => $this->upfile('File_images'),
						'slider_imagesvideo' => $this->upfile('File_videoimages'),
						'slider_video' => $this->upfile('File_video'),
						'slider_url' => $this->input->post('Text_linkurl'),
						'slider_msg_th' => $this->input->post('Text_msgTH'),
						'slider_color' => $this->input->post('Text_colors'),
						'slider_link' => $this->input->post('Text_link'),
						'slider_sort' => $this->input->post('Text_sort'),
						'slider_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
						'slider_lastedit' => date('Y-m-d H:i:s')
					);
				$this->slider->updateData($data);
				$result = array(
					'error' => false,
					'url' => site_url('contents/slider/index')
				);
				echo json_encode($result);
			}
			die;
	}

	public function delete($Id){
		$data = array(
			'slider_id' => $Id,
			'slider_status' => 0,
			'slider_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
			'slider_lastedit' => date('Y-m-d H:i:s')
		);
		$this->slider->updateData($data);
		header("location:".site_url('contents/slider/index'));
		die;
	}

	private function upfile($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name]['name'])){
			$new_name = time();
			$config['upload_path'] = './uploads/slider/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $new_name;
			$config['max_size']	= '0';
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

	public function show($id){

        $data['slider_id'] = $id;
        $data['slider_show'] = 1;

        $this->slider->updateData($data);
        
        redirect('contents/slider/index/'.$id);
        
    }

    public function hide($id){
        
        $data['slider_id'] = $id;
        $data['slider_show'] = 2;

        $this->slider->updateData($data);
        
        redirect('contents/slider/index/'.$id);

    }

}
