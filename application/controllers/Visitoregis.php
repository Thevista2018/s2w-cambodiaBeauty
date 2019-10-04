<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Visitoregis extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        $this->load->model("visitoregis_model","visitoregis");

    }

    public function index(){
		echo '
		<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Visitor Registration</title>
</head>

<body>
<div class="col_full" style="margin:20px;">
<p>The visitor registration will be available soon</p>
<p>for more information please contact  <a href="mailto:varinthorn@icvex.com">varinthorn@icvex.com</a></p>
</div>
</body>
</html>
		';
		die;

      $data['question'] = $this->_setQuestion();

      $this->load->view('visitor/main',$data);

    }

    public function createvisitor(){
      $visitor = array(
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
                  'visitor_question1' => $this->input->post('Question_1'),
                  'visitor_text1' => $this->input->post('Text_1'),
                  'visitor_question2' => $this->input->post('Question_2'),
                  'visitor_text2' => $this->input->post('Text_2'),
                  'visitor_question3' => $this->input->post('Question_3'),
                  'visitor_text3' => $this->input->post('Text_3'),
                  // 'visitor_question4' => $this->input->post('Question_4'),
                  'visitor_question4' => implode(",",$this->input->post('Question_4')),
                  // 'visitor_text4' => $this->input->post('Text_4'),
                  // 'visitor_question5' => $this->input->post('Question_5'),
                  'visitor_question5' => implode(",",$this->input->post('Question_5')),
                  // 'visitor_text5' => $this->input->post('Text_5'),
                  // 'visitor_question4' => implode(",",$this->input->post('Question_4')),
                  // 'visitor_question5' => $this->input->post('Question_5'),
                  // 'visitor_question6' => $this->input->post('Question_6'),
                  // 'visitor_question7' => implode(",",$this->input->post('Question_7')),
                  // 'visitor_text7' => $this->input->post('Text_7'),
                  // 'visitor_question8' => implode(",",$this->input->post('Question_8')),
                  // 'visitor_text8' => $this->input->post('Text_8'),
                  'visitor_datecreate' => date('Y-m-d H:i:s'),
                  'visitor_lastedit' => date('Y-m-d H:i:s'),
                  'visitor_status' => 1
                );
      $id = $this->visitoregis->insertData($visitor);

      $condition = array();
      $condition['fide'] = "*";
      $condition['where'] = array('visitor_id' => 2);
      $listvisitordetail = $this->visitoregis->listVisitordetail($condition);
    
      $title				= $listvisitordetail[0]['visitor_title']; 
      $firstname		= $listvisitordetail[0]['visitor_firstname']; 
      $lastname			= $listvisitordetail[0]['visitor_lastname']; 
    
      if($id != ""){
        // $data_mailinfo['subject'] = 'Myanmarbuilddecor : Visitor Registration';
        // $data_mailinfo['mail'] = 'naowarat@icvex.com';
        // $data_mailinfo['html'] = $this->getcurl_data(site_url('visitoregis/formemailinfo/'.$id));
        // $this->sentemail($data_mailinfo);
        $data_mailvisitor['subject'] = 'Myanmarbuilddecor : Pre-registration Confirmation';
        $data_mailvisitor['mail'] = $this->input->post('Text_email');

        // $data_mailvisitor['html'] = $this->getcurl_data(site_url('visitoregis/formemailvisitor/'.$id));

        $data_mailvisitor['subject'] = 'Myanmarbuilddecor : Pre-registration Confirmation';
        $data_mailvisitor['mail'] = $this->input->post('Text_email');
        $data_mailvisitor['html'] = '<html>';
        $data_mailvisitor['html'] .= '<head>';
        $data_mailvisitor['html'] .= '<meta charset="utf-8">';
        $data_mailvisitor['html'] .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $data_mailvisitor['html'] .= '<title>Visitor Registration</title>';
        $data_mailvisitor['html'] .= '</head>';
        $data_mailvisitor['html'] .= '<body>';
        $data_mailvisitor['html'] .= '<div style="width: 750px; padding:20px;">';
        $data_mailvisitor['html'] .= '<div style="text-align: center;">';
        $data_mailvisitor['html'] .= '<a href="#"><img src="http://www.myanmarbuilddecor.com/assets/canvas/images/logo.png" alt=""></a><br />';
        $data_mailvisitor['html'] .= '<h2 style="margin: 0px;">Confirmation of Visitor Pre-registration</h2><br />';
        $data_mailvisitor['html'] .= '</div>';
        $data_mailvisitor['html'] .= '<b>Dear </b> '.$title.' '.$firstname.' '.$lastname.'<br/>';
        $data_mailvisitor['html'] .= '<b>Pre- registration code is  : MBD'.str_pad($id,5,"0",STR_PAD_LEFT).'</b><br/>';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= 'Thank you for registering to attend Myanmar Build & Décor 2019. On behalf of exhibitors and ICVeX Co.,Ltd - show organizer, we look forward to welcome you during 3-5 October 2019 at Myanmar Expo, Yangon, Myanmar.';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= 'For your convenience, please print out this confirmation and show at Pre-registration counter during show days to receive your visitor pass.';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= 'For any question, please contact Ms. Naowarat at <a href="mailto:naowarat@icvex.com">naowarat@icvex.com</a>';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= 'For more information about the show, please visit <a href="http://www.myanmarbuilddecor.com/">www.myanmarbuilddecor.com</a>';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= 'Best regards,';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '<img src="http://www.myanmarbuilddecor.com/filemanager/Pictures/customer011.jpg" alt=""><br />';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= '<I>Remarks :</I>';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '<p>';
        $data_mailvisitor['html'] .= '<I>Show hours  :  Thur 3 – Sat 5 October 2019,  10.00 am – 5.30 pm</I>';
        $data_mailvisitor['html'] .= '</p>';
        $data_mailvisitor['html'] .= '</div>';
        $data_mailvisitor['html'] .= '</body>';
        $data_mailvisitor['html'] .= '</html>';

        $this->sentemail($data_mailvisitor);
        header('location:'.site_url('visitoregis/success'));
      }else{
        echo "Error";
      }
    }

    public function success(){
      $this->load->view('visitor/success');
    }

    public function jsoncountries(){
  		$country_name = $this->input->post('country_name');
  		if(!empty($country_name)){
  			$condition = array();
  			$condition['fide'] = "*";
  			$condition['like'] = array('country_name' => $country_name);
  			$condition['orderby'] = "country_name ASC";
  			$data = $this->visitoregis->listCountry($condition);
  			echo json_encode($data);
        die;
  		}else{
  			show_404();
  		}
  	}

    public function sentemail($data){
      require_once APPPATH . 'third_party/class.phpmailer.php';
      require_once APPPATH . 'third_party/class.smtp.php';
      $mail = new PHPMailer();
      $mail->CharSet = "utf-8";
      $mail->IsSMTP();
      $mail->SMTPDebug = 0;
      $mail->SMTPAuth = true;
      $mail->Host = "mail.porar.com";
      $mail->Port = 25;
      $mail->Username = "booking@cambodiaarchitectdecor.com";
      $mail->Password = "TheV1st@";

      $mail->SetFrom("booking@cambodiaarchitectdecor.com" , "Myanmarbuilddecor");
      $mail->AddAddress( $data['mail'] );
      // $mail->AddAddress("info@icvex.com");
      // $mail->AddCC($this->input->post('template-contactform-email') , $this->input->post('template-contactform-firstname') .' ['.$this->input->post('template-contactform-email').']');
      $mail->Subject = $data['subject'];
      $mail->MsgHTML( $data['html'] );
      $sendEmail = $mail->Send();
      return $sendEmail;
      // if( $sendEmail == true ){
      //   echo 'Success';
      // }else{
      //   echo 'Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '';
      // }
    }

    public function formemailinfo($id = ""){
      $data = array();
      $dmvisitor=array(
  			'visitor_id' => $id
  		);
  		$data['result'] = $this->visitoregis->get_visitordetail($dmvisitor);
      $data['Question'] = $this->_setQuestion();
      $this->load->view('visitor/mailinfo',$data);
    }

    public function formemailvisitor($id = ""){
      $data = array();
      $dmvisitor=array(
  			'visitor_id' => $id
  		);
  		$data['result'] = $this->visitoregis->get_visitordetail($dmvisitor);
      $this->load->view('visitor/mailvisitor',$data);
    }

    public function getcurl_data($url) {
  		$ch = curl_init();
  		$timeout = 5;
  		curl_setopt($ch, CURLOPT_URL, $url);
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  		$data = curl_exec($ch);
      curl_close($ch);
      
  		return $data;
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
                          '01_10' => 'Others, please specify'
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
                          '02_6' => 'Others, please specify'
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
                          '03_10' => 'Others, please specify',
                        ),
        ),
        array(
          'Id' => 4,
          'Type' => 'CheckBox',
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
                          '04_9' => 'Others, please specify',
                        ),
        ),
        array(
          'Id' => 5,
          'Type' => 'CheckBox',
          'Question' => '5. Your purpose of visit (You may tick more than one)',
          'Answer' => array(
                          1 => 'Evaluation for next year participation',
                          2 => 'Gather product information',
                          3 => 'Procurement',
                          4 => 'Seeking architect/ interior designer/ consultant',
                          5 => 'Seminar',
                          '05_6' => 'Others, please specify',
                        ),
        ),
        // array(
        //   'Id' => 8,
        //   'Type' => 'CheckBox',
        //   'Question' => '8. Your purpose of visit (You may tick more than one)',
        //   'Answer' => array(
        //                   1 => 'Evaluation for next year participation',
        //                   2 => 'Gather product information',
        //                   3 => 'Procurement',
        //                   4 => 'Seeking architect/ interior designer/ consultant',
        //                   5 => 'Seminar',
        //                   '6_8' => 'Others, please specify',
        //                 ),
        // )
        // array(
        //   'Id' => 4,
        //   'Type' => 'CheckBox',
        //   'Question' => '4. Products of your interest (You may tick more than one)',
        //   'Answer' => array(
        //                   1 => 'Home Finishes/ Furniture',
        //                   2 => 'Home Decoration & Interior Design',
        //                   3 => 'Color',
        //                   4 => 'Curtains',
        //                   5 => 'Glass',
        //                   6 => 'Lumber',
        //                   7 => 'Flooring',
        //                   8 => 'Wall / Door',
        //                   9 => 'Concrete Materials & Sealants',
        //                   10 => 'Roof-Insulation / Awning/ Steel/ Metal',
        //                   11 => 'Sanitary Ware/ Kitchen Ware',
        //                   12 => 'Swimming Pool/ Sauna & Spa',
        //                   13 => 'Lighting',
        //                   14 => 'CCTV',
        //                   15 => 'Construction Materials/ Tools & Equipment',
        //                   16 => 'Outdoor Furniture & Decoration/ Landscaping',
        //                   17 => 'Home Theatre/ Sound Equipment / Computer & Software',
        //                   '4_18' => 'Others, please specify',
        //                 ),
        // ),
        // array(
        //   'Id' => 5,
        //   'Type' => 'SelectBox',
        //   'Question' => '5. What is your involvement in purchasing',
        //   'Answer' => array(
        //                   1 => 'Decisive role',
        //                   2 => 'Influence decision',
        //                   3 => 'Advisory role',
        //                   4 => 'Not involved'
        //                 ),
        // ),
        // array(
        //   'Id' => 6,
        //   'Type' => 'SelectBox',
        //   'Question' => '6. Is this your first time to visit Myanmar Build & Décor',
        //   'Answer' => array(
        //                   1 => 'Yes',
        //                   2 => 'No'
        //                 ),
        // ),
        // array(
        //   'Id' => 7,
        //   'Type' => 'CheckBox',
        //   'Question' => '7. How did you get the information about Myanmar Build & Décor 2018 (You may tick more than one)',
        //   'Answer' => array(
        //                   1 => 'Direct mail / email from organizer',
        //                   2 => 'Invitation from exhibitor',
        //                   3 => 'Newspaper/ Journal',
        //                   4 => 'Outdoor Billboards/ Banners',
        //                   5 => 'Magazine',
        //                   6 => 'Radio Spot',
        //                   7 => 'TV news',
        //                   8 => 'Facebook',
        //                   '7_9' => 'Others, please specify',
        //                 ),
        // ),
        // array(
        //   'Id' => 8,
        //   'Type' => 'CheckBox',
        //   'Question' => '8. Your purpose of visit (You may tick more than one)',
        //   'Answer' => array(
        //                   1 => 'Evaluation for next year participation',
        //                   2 => 'Gather product information',
        //                   3 => 'Procurement',
        //                   4 => 'Seeking architect/ interior designer/ consultant',
        //                   5 => 'Seminar',
        //                   '6_8' => 'Others, please specify',
        //                 ),
        // )
      );
      return $Question;
    }

}
