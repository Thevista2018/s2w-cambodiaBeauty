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

	public function update(){
		if($this->tokens->verify('formcrf')){
				$data = array(
					'set_id' => $this->input->post('Id'),
					'set_urllanguage' => $this->input->post('Text_UrlLanguage'),
					'set_keywords' => $this->input->post('Text_Keywords'),
					'set_description' => $this->input->post('Text_Description'),
					// 'set_emailhr' => $this->input->post('Text_Emailhr'),
					'set_emailcontact' => $this->input->post('Text_Emailcontact'),
					'set_linkfacebook' => $this->input->post('Text_Linkfacebook'),
					'set_linktwitter' => $this->input->post('Text_Linktwitter'),
					'set_linkyoutube' => $this->input->post('Text_Linkyoutube'),
					'set_linkgoogleplus' => $this->input->post('Text_Linkgoogle'),
					'set_linkinstagram' => $this->input->post('Text_Linkinstagram'),
					// 'set_perpage_news' => $this->input->post('Num_Perpagenews'),
					// 'set_perpage_gallery' => $this->input->post('Num_Perpagegallery'),
					// 'set_perpage_knowledge' => $this->input->post('Num_Perpageknowledge'),
					// 'set_apply_online' => $this->input->post('Select_Apply'),
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
			die;
		}
	}
}
