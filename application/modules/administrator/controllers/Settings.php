<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->permission->admin();
		$this->lang->load(array('admin_page_lang','admin_form_lang'), 'english');
		$this->load->model("settings_model","settings");
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('set_id' => 1);
		$data['listdata'] = $this->settings->listData($condition);

		$data['formcrf'] = $this->tokens->token('formcrf');
		$this->template->backend('settings/main',$data);
	}

	public function contact(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('set_id' => 1);
		$data['listdata'] = $this->settings->listData($condition);

		$data['formcrf'] = $this->tokens->token('formcrf');
		$this->template->backend('settings/contact',$data);
	}

	public function extensions(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('set_id' => 1);
		$data['listdata'] = $this->settings->listData($condition);

		$data['formcrf'] = $this->tokens->token('formcrf');
		$this->template->backend('settings/extensions',$data);
	}
	public function updatewebsite(){
		if($this->tokens->verify('formcrf')){
				$data = array(
					'set_id' => $this->input->post('Id'),
					'set_nameweb_th' => $this->input->post('Text_nameweb_th'),
					'set_address_th' => $this->input->post('Text_address_th'),
					'set_emailcompany' => $this->input->post('Text_Email'),
					'set_phoncompany' => $this->input->post('Text_Phon'),
					'set_mobilecompany' => $this->input->post('Text_Mobilephon'),
					'set_faxcompany' => $this->input->post('Text_Fax'),
					'set_date_event' => $this->input->post('Text_date_event'),
					'set_detail_event' => $this->input->post('Text_detail_event'),
					'set_time_event' => $this->input->post('Text_time_event'),
					'set_place_event' => $this->input->post('Text_place_event'),
					'set_logo' => $this->upfileimages('Fild_Name'),
					'set_logo_footer' => $this->upfileimages2('Fild_Name_footer'),
					'set_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'set_lastedit' => date('Y-m-d H:i:s')
				);
			$this->settings->updateData($data);
			$cookie_i = array(
	                'name'   => 'lg',
	                'value'  => $this->input->post('Select_Language'),
	                'expire' => '86500',
	                'path'   => '/'
	            );
			$this->input->set_cookie($cookie_i);
			$result = array(
				'error' => false,
				'title' => "Update data completed",
				'msg' => "",
				'url' => base_url('administrator/settings/index'),
			);
			echo json_encode($result);
		}
		die;
	}
	public function updatecontact(){
		if($this->tokens->verify('formcrf')){
				$data = array(
					'set_id' 				=> $this->input->post('Id'),
					'set_linkfacebook' 		=> $this->input->post('Text_linkfacebook'),
					'set_linktwitter' 		=> $this->input->post('Text_linktwitter'),
					'set_linkyoutube' 		=> $this->input->post('Text_linkyoutube'),
					'set_linkgoogleplus' 	=> $this->input->post('Text_linkgoogleplus'),
					'set_linkinstagram' 	=> $this->input->post('Text_linkinstagram'),

					'set_fullnamecontact' 	=> $this->input->post('Text_Fullname'),
					'set_positioncontact' 	=> $this->input->post('Text_Position'),
					'set_phonecontact' 		=> $this->input->post('Text_Phone'),
					'set_phoneextcontact' 	=> $this->input->post('Text_Phone_ext'),
					'set_mobilecontact' 	=> $this->input->post('Text_Mobile'),

					'set_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'set_lastedit' => date('Y-m-d H:i:s')
				);
			$this->settings->updateData($data);
			$cookie_i = array(
	                'name'   => 'lg',
	                'value'  => $this->input->post('Select_Language'),
	                'expire' => '86500',
	                'path'   => '/'
	            );
			$this->input->set_cookie($cookie_i);
			$result = array(
				'error' => false,
				'title' => "Update data completed",
				'msg' => ""
			);
			echo json_encode($result);
		}
		die;
	}
	public function updateextensions(){
		if($this->tokens->verify('formcrf')){
				$data = array(
					'set_id' => $this->input->post('Id'),
					'set_keywords' => $this->input->post('Text_Keywords'),
					'set_description' => $this->input->post('Text_Description'),
					'set_googletool' => $this->input->post('Text_Webmaster'),
					'set_googleanalytics' => $this->input->post('Text_Analytics'),
					'set_editby' => $this->encryption->decrypt($this->input->cookie('sysn')),
					'set_lastedit' => date('Y-m-d H:i:s')
				);
			$this->settings->updateData($data);
			$cookie_i = array(
	                'name'   => 'lg',
	                'value'  => $this->input->post('Select_Language'),
	                'expire' => '86500',
	                'path'   => '/'
	            );
			$this->input->set_cookie($cookie_i);
			$result = array(
				'error' => false,
				'title' => "Update data completed",
				'msg' => ""
			);
			echo json_encode($result);
		}
		die;
	}
	private function upfileimages($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name]['name'])){
			$new_name = time();
			$config['upload_path'] = './uploads/logo/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
	private function upfileimages2($Fild_Name){
		$fileold = $this->input->post($Fild_Name.'_old');
		if(!empty($_FILES[$Fild_Name]['name'])){
			$new_name = time();
			$config['upload_path'] = './uploads/logo/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
