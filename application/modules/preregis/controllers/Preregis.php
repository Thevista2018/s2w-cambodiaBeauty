<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Preregis extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("preregis_model","preregis");
		$this->permission->admin();
		$this->load->library('getlanguage');
	}

	public function index(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['orderby'] = "visitor_id DESC";
		$data['listdata'] = $this->preregis->listData($condition);

		$this->template->backend('preregi/main',$data);
	}

	public function detail($id = ""){
		if(!empty($id)){
			$condition = array();
			$condition['fide'] = "*";
			$condition['where'] = array('visitor_id' => $id);
			$condition['orderby'] = "visitor_id DESC";
			$data['listdata'] = $this->preregis->listData($condition);

			$data['Question'] = $this->_setQuestion();

			$data['formCrfvisitor'] = $this->tokens->token('formCrfvisitor');
			$this->template->css(array(
				base_url('assets/canvas/easyautocomplete/easy-autocomplete')
			));
			$this->template->backend('preregi/detail',$data);
		}else{
			show_404();
		}
	}

	public function updateData(){
		if($this->tokens->verify('formCrfvisitor')){
			$data = array(
				'visitor_id' => $this->input->post('Id'),
				'visitor_title' => $this->input->post('Text_title'),
                'visitor_firstname' => $this->input->post('Text_firstname'),
                'visitor_lastname' => $this->input->post('Text_lastname'),
                'visitor_jobtitle' => $this->input->post('Text_jobtitle'),
                'visitor_company' => $this->input->post('Text_company'),
                'visitor_address' => $this->input->post('Text_address'),
                'visitor_postcode' => $this->input->post('Text_postcode'),
                'visitor_country' => strtoupper($this->input->post('Text_country')),
                'visitor_province' => $this->input->post('Text_province'),
                'visitor_phone1' => $this->input->post('Text_phone1'),
                'visitor_phone2' => $this->input->post('Text_phone2'),
                'visitor_phone3' => $this->input->post('Text_phone3'),
                'visitor_fax1' => $this->input->post('Text_fax1'),
                'visitor_fax2' => $this->input->post('Text_fax2'),
                'visitor_fax3' => $this->input->post('Text_fax3'),
                'visitor_mobile1' => $this->input->post('Text_mobile1'),
                'visitor_mobile2' => $this->input->post('Text_mobile2'),
                'visitor_mobile3' => $this->input->post('Text_mobile3'),
                'visitor_email' => $this->input->post('Text_email'),
				'visitor_web' => $this->input->post('Text_web'),
				'visitor_lastedit' => date('Y-m-d H:i:s')
			);
			$this->preregis->updateData($data);
			$result = array(
				'error' => false,
				'url' => site_url('preregis/index')
			);
			echo json_encode($result);
			die;
		}
	}

	public function wexcel(){
		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();

		// Set properties
		$objPHPExcel->getProperties()->setCreator("Myanmarbuilddecor");
		$objPHPExcel->getProperties()->setLastModifiedBy("Myanmarbuilddecor");
		$objPHPExcel->getProperties()->setTitle("Myanmarbuilddecor");
		$objPHPExcel->getProperties()->setSubject("Myanmarbuilddecor");
		$objPHPExcel->getProperties()->setDescription("Myanmarbuilddecor");

		$condition = array();
		$condition['fide'] = "CONCAT('MBD',LPAD(visitor_id, 5, '0')) As URN,visitor_title,visitor_firstname,visitor_lastname,visitor_jobtitle,visitor_company,visitor_address,visitor_address2,visitor_postcode,visitor_country,visitor_nationality,visitor_province,CONCAT(visitor_phone1,'-',visitor_phone2,'-',visitor_phone3) As Phone,";
		$condition['fide'].= "CONCAT(visitor_fax1,'-',visitor_fax2,'-',visitor_fax3) As Fax,";
		$condition['fide'].= "CONCAT(visitor_mobile1,'-',visitor_mobile2,'-',visitor_mobile3) As Mobile,visitor_email,visitor_web";
		$dataArray = $this->preregis->listData($condition);
		$objPHPExcel->getActiveSheet()->fromArray(array_keys(current($dataArray)), null, 'A1');

		$objPHPExcel->getActiveSheet()->fromArray($dataArray,null, 'A2');

		$objPHPExcel->getActiveSheet()->setTitle('Visitor');

		$name = "datavisitor_".date('H:i:s');
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($_SERVER['DOCUMENT_ROOT']."/export"."/".$name.".xlsx");

		header("location:".base_url("export/".$name.".xlsx"));

		// Echo done
	}

	private function _setQuestion(){
		$Question = array(
			array(
				'Id' => 1,
				'Type' => 'SelectBox',
				'Question' => '1. Your organization’s main activity (Please tick only one)',
				'Answer' => array(
								1 => 'Architecture / Interior Design',
								2 => 'Building & Maintenance',
								3 => 'Construction Company',
								4 => 'Commercial Building/ Apartment/ Condominium/ Hotel /Resort',
								5 => 'Contractors',
								6 => 'Engineer',
								7 => 'Real Estate / Project Developer',
								8 => 'Trader/ Distributor/ Importer',
								9 => 'Manufacturer',
								'1_10' => 'Others, please specify'
							  ),
			  ),
			  array(
				'Id' => 2,
				'Type' => 'SelectBox',
				'Question' => '2. What is your role in your organization (Please tick only one)',
				'Answer' => array(
								1 => 'Owner / CEO',
								2 => 'Managing Director / General Manager',
								3 => 'Director / Department Head',
								4 => 'Manager',
								5 => 'Executive',
								6 => 'Purchasing Manager ',
								'2_6' => 'Others, please specify'
							  ),
			  ),
			  array(
				'Id' => 3,
				'Type' => 'SelectBox',
				'Question' => '3. What is your job function (Please tick only one)',
				'Answer' => array(
								1 => 'Sales & Marketing',
								2 => 'Purchasing',
								3 => 'Project Management',
								4 => 'Operation',
								5 => 'Engineer',
								6 => 'Architect/ Interior Design',
								7 => 'Maintenance',
								8 => 'Finance/ Account ',
								9 => 'Administrative',
								'3_10' => 'Others, please specify',
							  ),
			  ),
			  array(
				'Id' => 4,
				'Type' => 'SelectBox',
				'Question' => '4. How did you get the information about Myanmar Build & Décor 2019?  (You may tick more than one)',
				'Answer' => array(
								1 => 'Direct mail / email from organizer',
								2 => 'Invitation from exhibitor',
								3 => 'Newspaper/ Journal',
								4 => 'Outdoor Billboards/ Banners',
								5 => 'Magazine',
								6 => 'Radio Spot',
								7 => 'TV news',
								8 => 'Facebook',
								'4_9' => 'Others, please specify',
							  ),
			  ),
			  array(
				'Id' => 5,
				'Type' => 'SelectBox',
				'Question' => '5. Your purpose of visit (You may tick more than one)',
				'Answer' => array(
								1 => 'Evaluation for next year participation',
								2 => 'Gather product information',
								3 => 'Procurement',
								4 => 'Seeking architect/ interior designer/ consultant',
								5 => 'Seminar',
								'5_6' => 'Others, please specify',
							  ),
			  ),
		//   array(
		// 	'Id' => 6,
		// 	'Type' => 'SelectBox',
		// 	'Question' => '6. Is this your first time to visit Myanmar Build & Décor',
		// 	'Answer' => array(
		// 					1 => 'Yes',
		// 					2 => 'No'
		// 				  ),
		//   ),
		//   array(
		// 	'Id' => 7,
		// 	'Type' => 'CheckBox',
		// 	'Question' => '7. How did you get the information about Myanmar Build & Décor 2018',
		// 	'Answer' => array(
		// 					1 => 'Direct mail / email from organizer',
		// 					2 => 'Invitation from exhibitor',
		// 					3 => 'Newspaper/ Journal',
		// 					4 => 'Outdoor Billboards/ Banners',
		// 					5 => 'Magazine',
		// 					6 => 'Radio Spot',
		// 					7 => 'TV news',
		// 					8 => 'Facebook',
		// 					'7_9' => 'Others, please specify',
		// 				  ),
		//   ),
		//   array(
		// 	'Id' => 8,
		// 	'Type' => 'CheckBox',
		// 	'Question' => '8. Your purpose of visit',
		// 	'Answer' => array(
		// 					1 => 'Evaluation for next year participation',
		// 					2 => 'Gather product information',
		// 					3 => 'Procurement',
		// 					4 => 'Seeking architect/ interior designer/ consultant',
		// 					5 => 'Seminar',
		// 					'6_8' => 'Others, please specify',
		// 				  ),
		//   )
		);
		return $Question;
	  }

}
