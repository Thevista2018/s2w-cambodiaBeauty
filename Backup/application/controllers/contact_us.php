<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/contact_us_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'mail_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index($type=null)
    {

        if ($type == 'sales_agent') {
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/page/sales_agent.tpl.php');
            $this->load->view('user/foot.tpl.php');
        }
        elseif ($type == 'organizer') {
            /* -- ================= Case : Submit form ================= -- */
            if (!empty($_POST['action']) && $_POST['action']=='save') {
                
                /* -- Check : Empty $_POST -- */
                $data['error'] = $this->_check_post();

                /* -- ===== Condition : Error !! ===== -- */
                if (!empty($data['error'])) { 
                    /* -- Set : Alert error -- */
                    $head['alert_error'] = "<script>alert('เกิดข้อผิดพลาด เนื่องจากข้อมูลไม่ถูกต้อง')</script>";

                    /* -- Set : Latest variables -- */
                    $data['data'] = $this->_set_var();
                }

                /* -- ===== Condition : OK ===== -- */
                else {
                    /* -- Save : Data -- */
                    $id = $this->contact_us_model->contact_us_save($type);

                    /* -- Get : Insert id -- */
                    if ($id) {
                        /* --- Send : Email --- */
                        $subject = "Contact us";
                        $message = $this->load->view('user/mail_template/mail_contact.php', $_POST, TRUE);
                        $callback = BASE_HREF;
//                        if ($type=='organizer') $emailto = 'info@icvex.com';
//                        else $emailto = 'wendy@annexhibition.com';
                        $emailto = 'info@icvex.com';
//                        $emailto = 'parinya_watta@outlook.com';

                        /* --- Case : Success --- */
//                        if ($this->mail_lib->sendEmail($emailto, $subject, $message)) {
                        // if ($this->mail_lib->sendEmail($emailto, $subject, $message, 'info@icvex.com')) {
                        if ($this->mail_lib->sendEmail($emailto, $subject, $message, $_POST['email'])) {
                            echo "<script>alert('ส่งเมล์เรียบร้อย')</script>";
                            echo "<script>window.location='".$callback."'</script>";
                            exit;
                        }

                        /* --- Case : Error !! --- */
                        else {
                            /* --- Alert & Redirect --- */
                            echo "<script>alert('ระบบส่งอีเมล์ขัดข้อง')</script>";
                            echo "<script>window.location='".$callback."'</script>";
                            exit;
                        }
                    }
                }
            }
            
            else {
                if ($_GET['init']) $data['data'] = self::_set_var_init();
            }
                    
            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php', $head);
            $this->load->view('user/contact.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        
        else {
            parent::blank();
        }
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    private function _check_post()
    {
        /* -- Username -- */
        if (empty($_POST['name'])) 
            $error['name'] = 'กรุณากรอก ชื่อ-นามสุกล';

        /* -- Email -- */
        if (empty($_POST['email'])) 
            $error['email'] = 'กรุณากรอก Email';
        elseif (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $_POST['email']))
            $error['email'] = 'รูปแบบ Email ไม่ถูกต้อง';

        /* -- ข้อความ -- */
        if (empty($_POST['desc'])) 
            $error['desc'] = 'กรุณากรอก ข้อความ';
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    private function _set_var()
    {    
        /* -- Set : Latest variables -- */
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['desc'] = $_POST['desc'];
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    private function _set_var_init()
    {    
        /* -- Set : Latest variables -- */
        $data['name'] = 'ปริญญา';
        $data['email'] = 'parinya_watta@hotmail.com';
        $data['desc'] = 'รายละเอียด';
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file contact_us.php */
/* Location: ./application/controllers/contact_us.php */