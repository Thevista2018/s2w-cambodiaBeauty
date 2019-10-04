<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testmail extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('mail_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index()
    {
        $mail = $_GET['email'];
        /* --- Send : Email --- */
        $subject = "ระบบแจ้งความคิดเห็น Contact us";
        $message = 'ทดสอบ';
        $callback = BASE_HREF;

        /* --- Case : Success --- */
        if ($this->mail_lib->sendEmail($mail, $subject, $message)) {
            echo "<script>alert('ส่งเมล์เรียบร้อย')</script>";
            echo "<script>window.location='".$callback."'</script>";
            exit;
        }
    }
    
}
/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */