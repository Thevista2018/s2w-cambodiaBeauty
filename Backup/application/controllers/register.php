<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/register_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'mail_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index()
    {
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
                $id = $this->register_model->register_save();

                /* -- Get : Insert id -- */
                if ($id) {
                    /* --- Send : Email --- */
                    $subject = "ระบบแจ้งความคิดเห็น Contact us";
                    $message = $this->load->view('user/mail_template/mail_contact.php', $_POST, TRUE);
                    $callback = '/';

                    /* --- Case : Success --- */
                    if ($this->mail_lib->sendEmail("info@udamotor.co.th", $subject, $message)) {
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
        
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php', $head);
        $this->load->view('user/register.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    private function _check_post()
    {
        /* -- Username -- */
        if (empty($_POST['fullname'])) 
            $error['fullname'] = 'กรุณากรอก ชื่อ-นามสุกล';

        /* -- เบอร์ติดต่อ -- */
        if (empty($_POST['tel'])) 
            $error['tel'] = 'กรุณากรอก เบอร์ติดต่อ';
        elseif (!is_numeric($_POST['tel']))
            $error['tel'] = 'กรุณากรอก ด้วยตัวเลขเท่านั้น';

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
        $data['website'] = $_POST['website'];
        $data['tel'] = $_POST['tel'];
        $data['desc'] = $_POST['desc'];
        
        /* -- Return -- */
        return $data;
    }    
    
}
/* End of file register.php */
/* Location: ./application/controllers/register.php */