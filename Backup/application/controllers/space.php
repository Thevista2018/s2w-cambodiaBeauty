<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Space extends MY_Controller
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();

        $this->load->model(array('user/space_model'));
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
                $id = $this->space_model->space_save();

                /* -- Get : Insert id -- */
                if ($id) {
                    /* --- Send : Email --- */
                    $subject = "Space Booking ";
                    $message = $this->load->view('user/mail_template/mail_space.php', $_POST, TRUE);
                    $callback = BASE_HREF;
					// $emailto = 'support@thevista.co.th';
                    // $emailto = 'info@icvex.com';
//                    $emailto = 'parinya_watta@outlook.com';

                    /* --- Case : Success --- */
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
        $this->load->view('user/space.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }

    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    private function _check_post()
    {
        $arr[] = 'firstname';
        $arr[] = 'lastname';
//        $arr[] = 'company';
//        $arr[] = 'job';
        $arr[] = 'address1';
//        $arr[] = 'address2';
        $arr[] = 'city';
        $arr[] = 'state';
        $arr[] = 'zip';
        $arr[] = 'country';
        $arr[] = 'tel';

        foreach ($arr as $p) {
        if (empty($_POST[$p]))
            $error[$p] = "Please Fill : ".ucfirst($p);
        }

        /* -- Email -- */
        if (empty($_POST['email']))
            $error['email'] = 'Please Fill : Email';
        elseif (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $_POST['email']))
            $error['email'] = 'Email is invalid pattern';

        /* -- Confirm Email -- */
        if (empty($_POST['email_confirm']))
            $error['email_confirm'] = 'Please Fill : Email Confirm';
        elseif (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $_POST['email_confirm']))
            $error['email_confirm'] = 'Email is invalid pattern';
        elseif ($_POST['email'] != $_POST['email_confirm'])
            $error['email_confirm'] = 'Both email is not same';

        /* -- Return -- */
        return $error;
    }

    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    private function _set_var()
    {
        /* -- Set : Latest variables -- */
        $data['firstname'] = $_POST['firstname'];
        $data['lastname'] = $_POST['lastname'];
        $data['company'] = $_POST['company'];
        $data['job'] = $_POST['job'];

        $data['email'] = $_POST['email'];
        $data['email_confirm'] = $_POST['email_confirm'];
        $data['address1'] = $_POST['address1'];
        $data['address2'] = $_POST['address2'];
        $data['city'] = $_POST['tel'];
        $data['state'] = $_POST['state'];
        $data['zip'] = $_POST['zip'];
        $data['country'] = $_POST['country'];
        $data['tel'] = $_POST['tel'];

        $data['expected'] = $_POST['expected'];
        $data['choice2'] = $_POST['choice2'];
        $data['choice2_info'] = $_POST['choice2_info'];

        /* -- Return -- */
        return $data;
    }

    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    private function _set_var_init()
    {
        /* -- Set : Latest variables -- */
        $data['firstname'] = 'ปริญญา';
        $data['lastname'] = 'วรรธนะประทีป';
        $data['company'] = 'Kapook';
        $data['job'] = 'Programmer';

        $data['email'] = 'parinya_watta@hotmail.com';
        $data['email_confirm'] = 'parinya_watta@hotmail.com';
        $data['address1'] = '77/58 ม.ดิ เอ็มเมอรัลด์ การ์เดน';
        $data['address2'] = 'ถ.เทศบาล 2 ต.บางพลับ';
        $data['city'] = 'ปากเกร็ด';
        $data['state'] = 'กทม.';
        $data['zip'] = '11120';
        $data['country'] = 'ไทย';
        $data['tel'] = '0830102551';

        $data['expected'] = 'test';
        $data['choice2'] = array(1,2);
        $data['choice2_info'] = 'standard';

        /* -- Return -- */
        return $data;
    }

}
/* End of file space.php */
/* Location: ./application/controllers/space.php */