<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("main_model","main");
		$this->load->helper('fileexist');
		$this->load->library("banner");
	}

	public function index(){

		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('slider_status' => 1,'slider_show' => 1);
		$condition['orderby'] = 'slider_sort ASC,slider_id DESC';
		$data['listSlider'] = $this->main->listSlider($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('industry_status !=' => 0,'industry_show' => 1);
		$condition['orderby'] = 'industry_sort ASC,industry_id DESC';
		$data['listIndustry'] = $this->main->listIndustry($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where']= array('article_status' => 1, 'article_show' => 1 , 'article_showhomepage' => 2);
		$condition['orderby'] = 'article_sort ASC,article_id DESC';
		$data['listArticle'] = $this->main->listArticle($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('download_status' => 2, 'download_show' => 1);
		$condition['orderby'] = 'download_sort ASC,download_id DESC';
		$data['listDowload'] = $this->main->listDowload($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('supporter_show' => 1, 'supporter_status' => 1);
		$condition['orderby'] = 'supporter_sort ASC';
		$data['listSupporter'] = $this->main->listSupporter($condition);

		$this->template->frontend('main/main',$data);
	}

	public function pageDetail($Id){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('con_id' => $Id);
		$data['listdata'] = $this->main->listData($condition);

		$this->template->frontend('main/pagedetail',$data);
	}

	public function pagesubDetail($Id){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('consub_id' => $Id);
		$data['listdata'] = $this->main->listSubcontent($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('industry_status' => 1);
		$condition['orderby'] = 'industry_sort ASC,industry_id DESC';
		$data['listIndustry'] = $this->main->listIndustry($condition);

		$this->template->frontend('main/pagesubdetail',$data);
	}

	public function salesrepresentative(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('consub_id' => 22);
		$data['listdata'] = $this->main->listSubcontent($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('salerep_status' => 1, 'salerep_show'=>1);
		$condition['orderby'] = "salerep_show asc";
		$data['listsalesrepresentative'] = $this->main->listSalesrepresentative($condition);

		$this->template->frontend('main/salesrepresentative',$data);
	}

	public function banner(){
		$this->load->views('main/banner');
	}

	public function organizer(){
		$data = array();

		// $condition = array();
		// $condition['fide'] = "*";
		// $condition['where'] = array('consub_id' => 27);
		// $data['listdata'] = $this->main->listSubcontent($condition);

		$this->template->frontend('main/contactus',$data);
	}

	public function message_mail($data){
		$html = '<b>Name : </b> '.$data['TextName'].'<br />';
		$html.= '<b>Email : </b> '.$data['TextEmail'].'<br />';
		$html.= '<b>Subject : </b> '.$data['TextSubject'].'<br />';
		$html.= '<b>Message : </b> '.$data['TextMessage'].'<br />';
		return $html;
	}

	public function sentmailcontact(){
		// $data = array(
		// 	'TextName' => $this->input->post('TextName'),
		// 	'TextEmail' => $this->input->post('TextEmail'),
		// 	'TextSubject' => $this->input->post('TextSubject'),
		// 	'TextMessage' => $this->input->post('TextMessage')
		// );

		$data = array(
			'TextName' => 'TEST',
			'TextEmail' => 'TEST@EMAIL.COM',
			'TextSubject' => 'TEST',
			'TextMessage' => 'TEST'
		);

		// Mail HR
		$condition = array();
		$condition['fide'] = "set_emailcompany";
		$listSettings = $this->main->listSettings($condition);

		if(count($listSettings) != 0){
			foreach ($listSettings as $key => $value) {
				if(!empty($value['set_emailcompany'])){
					require_once APPPATH . 'third_party/PHPMailer_v5.0.2/class.phpmailer.php';
					// require_once APPPATH . 'third_party/class.smtp.php';
					$mail = new PHPMailer;
					$mail->CharSet = "utf-8";
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					$mail->Host = "27.254.158.19";
					$mail->Port = 587;
					$mail->Username = "system@cambodiahealthbeauty.com";
					$mail->Password = "klfo@!klbf5";

					$mail->SetFrom( 'system@cambodiahealthbeauty.com' , 'cambodiahealthbeauty.com' );
					$mail->AddAddress($value['set_emailcompany']);
					// $mail->AddAddress('a.w.wirasuk@hotmail.com');
					$mail->Subject = "Message from :".$data['TextName'];
					$message = $this->message_mail($data);

					// print_r($message);
					// die;

					$mail->MsgHTML( $message );
					if(!$mail->send()) {
						$data_return = array(
							'alert' => 'error',
							'message' => 'Mailer error: '.$mail->ErrorInfo
						);
					} else {
						$data_return = array(
							'alert' => 'success',
							'message' => 'Message has been sent.'
						);
					}
					echo json_encode($data_return);
					die;
				}
			}
		}
	}

	// public function testmail(){
	// 	require_once APPPATH . 'third_party/PHPMailer_v5.0.2/class.phpmailer.php';
	// 	// require_once APPPATH . 'third_party/class.smtp.php';
	// 	$mail = new PHPMailer;
	// 	$mail->CharSet = "utf-8";
	// 	$mail->IsSMTP();
	// 	$mail->SMTPDebug = 0;
	// 	$mail->SMTPAuth = true;
	// 	$mail->Host = "27.254.141.55";
	// 	$mail->Port = 25;
	// 	$mail->Username = "ems";
	// 	$mail->Password = "b45ddcNu5";
  //
	// 	$mail->SetFrom( 'ems@gp-events.com' , 'Test mail' );
	// 	$mail->AddAddress('a.w.wirasuk@gmail.com');
	// 	// $mail->AddAddress('a.w.wirasuk@hotmail.com');
	// 	$mail->Subject = "Message from test";
	// 	$mail->MsgHTML( "Message from test" );
	// 	if(!$mail->send()) {
	// 		$data_return = array(
	// 			'alert' => 'error',
	// 			'message' => 'Mailer error: '.$mail->ErrorInfo
	// 		);
	// 	} else {
	// 		$data_return = array(
	// 			'alert' => 'success',
	// 			'message' => 'Message has been sent.'
	// 		);
	// 	}
	// 	echo json_encode($data_return);
	// 	die;
	// }

	public function getptt(){
		$data = array();
		$client = new SoapClient("http://www.pttplc.com/webservice/pttinfo.asmx?WSDL");
    $params = array(
                   'Language' => "en"
               );
    $data = $client->CurrentOilPrice($params);
    $ob = $data->CurrentOilPriceResult;
    $xml = new SimpleXMLElement($ob);
    foreach ($xml  as  $key =>$val) {
    	if($val->PRICE != ''){
				if($val->PRODUCT == "Blue Diesel"){
					$data['Diesel'] = $val->PRICE;
				}else if($val->PRODUCT == "Blue Gasohol E85"){
					$data['E85'] = $val->PRICE;
				}else if($val->PRODUCT == "Blue Gasohol E20"){
					$data['E20'] = $val->PRICE;
				}else if($val->PRODUCT == "Blue Gasohol 91"){
					$data['91'] = $val->PRICE;
				}else if($val->PRODUCT == "Blue Gasohol 95"){
					$data['95'] = $val->PRICE;
				}
      }
    }
		return $data;
	}

}
