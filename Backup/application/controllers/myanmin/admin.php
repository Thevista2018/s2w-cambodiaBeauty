<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
              
        /* -- Load : Model -- */
        $this->load->model(array('admin/admin_model'));
    }
    
    ///////////////////////////////////////////////// Admin : List /////////////////////////////////////////////////
    function list_admin()
    {
        /* -- Select : List -- */
        $data['list'] = $this->admin_model->admin_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Admin';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/admin/list_admin', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Admin : Add /////////////////////////////////////////////////
    function add_admin()
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
                $id = $this->admin_model->admin_save();

                /* -- Get : Insert id -- */
                if ($id) { 
                    /* -- Alert && Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/admin/list_admin'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Admin';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/admin/add_admin', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Admin : Edit /////////////////////////////////////////////////
    function edit_admin()
    {
        /* -- Set : $id -- */
        $id = $_GET['admin_id'];
        
        /* -- ================= Case : Submit form ================= -- */
        if (!empty($_POST['action']) && $_POST['action']=='update') {
            
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
                /* -- Update : Data -- */
                $this->admin_model->admin_update($id);
                
                /* -- Alert && Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->admin_model->admin_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Admin';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/admin/edit_admin', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Admin : Check post /////////////////////////////////////////////////
    function _check_post()
    {    
        /* -- Username -- */
        if (empty($_POST['admin_user'])) 
            $error['admin_user'] = 'กรุณากรอก Username';
        elseif (!preg_match('/^[0-9A-Za-z]+$/i', $_POST['admin_user']))
            $error['admin_user'] = 'Username ใช้ตัวอักษรภาษาอังกฤษและตัวเลข เท่านั้น';
        elseif (strlen($_POST['admin_user'])>10)
            $error['admin_user'] = 'Username ไม่เกิน 10 ตัวอักษร';
//            elseif ($this->admin_model->check_admin_exist($_POST['admin_user'])>0)
//                $error['admin_user'] = 'Username ซ้ำ กรุณาลองใหม่';

        /* -- Password -- */
        if (empty($_POST['admin_pass'])) 
            $error['admin_pass'] = 'กรุณากรอก Password';
        elseif (strlen($_POST['admin_pass'])<8)
            $error['admin_pass'] = 'Password ไม่ต่ำกว่า 8 ตัวอักษร';
        elseif (strlen($_POST['admin_pass'])>12)
            $error['admin_pass'] = 'Password ไม่เกิน 12 ตัวอักษร';

        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        /* -- Set : Latest variables -- */
        $data['admin_user'] = $_POST['admin_user'];
        $data['admin_status'] = $_POST['admin_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file admin.php */
/* Location: ./application/controllers/udamin/admin.php */