<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

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
		$condition['where'] = array('slider_status' => 1);
		$condition['orderby'] = 'slider_sort ASC,slider_id DESC';
		$data['listSlider'] = $this->main->listSlider($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('industry_status !=' => 0);
		$condition['orderby'] = 'industry_sort ASC,industry_id DESC';
		$data['listIndustry'] = $this->main->listIndustry($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = "(article_type = 1 OR article_type = 2 OR article_type = 3)";
		$condition['where'].= " AND article_status = 2 AND article_show = 1";
		$condition['orderby'] = 'article_sort ASC,article_id DESC';
		$data['listArticle'] = $this->main->listArticle($condition);

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('download_status' => 2, 'download_show' => 1);
		$condition['orderby'] = 'download_sort ASC,download_id DESC';
		$data['listDowload'] = $this->main->listDowload($condition);

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

	public function banner(){
		$this->load->views('main/banner');
	}

	public function contactus(){
		$data = array();

		$condition = array();
		$condition['fide'] = "*";
		$condition['where'] = array('consub_id' => 27);
		$data['listdata'] = $this->main->listSubcontent($condition);

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
		$data = array(
						'TextName' => $this->input->post('TextName'),
						'TextEmail' => $this->input->post('TextEmail'),
						'TextSubject' => $this->input->post('TextSubject'),
						'TextMessage' => $this->input->post('TextMessage')
						);

		// Mail HR
		$condition = array();
		$condition['fide'] = "set_emailcontact";
		$condition['where'] = array('set_id' => 1);
		$listSettings = $this->main->listSettings($condition);

		if(count($listSettings) != 0){
			foreach ($listSettings as $key => $value) {
				if(!empty($value['set_emailcontact'])){
					require_once APPPATH . 'third_party/PHPMailer_v5.0.2/class.phpmailer.php';
					// require_once APPPATH . 'third_party/class.smtp.php';
					$mail = new PHPMailer;
					$mail->CharSet = "utf-8";
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					$mail->Host = "203.154.100.69";
					$mail->Port = 25;
					$mail->Username = "system@myanmartourismexpo.com";
					$mail->Password = "System2560";

					$mail->SetFrom( 'system@myanmartourismexpo.com' , 'myanmartourismexpo.com' );
					$mail->AddAddress($value['set_emailcontact']);
					// $mail->AddAddress('a.w.wirasuk@hotmail.com');
					$mail->Subject = "Message from :".$data['TextName'];
					$message = $this->message_mail($data);
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

	public function testmail(){
		require_once APPPATH . 'third_party/class.phpmailer.php';
		require_once APPPATH . 'third_party/class.smtp.php';
		$mail = new PHPMailer;
		$mail->CharSet = "utf-8";
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->Host = "27.254.131.201";
		$mail->Port = 25;
		$mail->Username = "system@saengareegroup.com";
		$mail->Password = "ehGQNTe6";

		$mail->SetFrom("system@saengareegroup.com" , "Saengareegroup");
		$mail->AddAddress('a.w.wirasuk@hotmail.com');
		$mail->Subject = "มีข้อความติดต่อจาก";
		$message = "Test Data";
		$mail->MsgHTML( $message );
		$sendEmail = $mail->Send();
		if(!$sendEmail){
			echo "not sent";
			echo 'Mailer error: ' . $mail->ErrorInfo;
		}else{
			echo "sent";
		}
	}

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
