<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/slide_model'));
    }
    
    ///////////////////////////////////////////////// Slide : List /////////////////////////////////////////////////
    function list_slide()
    {
        /* -- Select : List -- */
        $data['list'] = $this->slide_model->slide_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Slide';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/slide/list_slide', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Slide : Add /////////////////////////////////////////////////
    function add_slide()
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
                /* -- Update : Data -- */
                $id = $this->slide_model->slide_save();

                /* -- Upload : Pic -- */
                $folder = 'slide';
                $this->_upload_pic($id, $_FILES['slide_pic']['tmp_name'], 2, 'large', $folder, PATH_UPLOADS, 620, 349, 'slide');
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Slide';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/slide/add_slide', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Slide : Edit /////////////////////////////////////////////////
    function edit_slide()
    {
        /* -- Set : $id -- */
        $id = $_GET['slide_id'];
        
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
                $this->slide_model->slide_update($id);

                /* -- Upload : Pic -- */
                $folder = 'slide';
                $this->_upload_pic($id, $_FILES['slide_pic']['tmp_name'], 2, 'large', $folder, PATH_UPLOADS, 620, 349, 'slide');
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->slide_model->slide_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Slide';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/slide/edit_slide', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post()
    {
        /* -- Title -- */
        if (empty($_POST['slide_title'])) 
            $error['slide_title'] = 'กรุณากรอก Title';
        
        /* -- Link -- */
        if (empty($_POST['slide_link'])) 
            $error['slide_link'] = 'กรุณากรอก Link';

        /* -- Check files upload -- */
        if (is_file($_FILES['slide_pic']['tmp_name'])) {
            $this->load->library('checkfile_lib');

            $msg = $this->checkfile_lib->check($_FILES['slide_pic'], 1024000);
            if ($msg != 'OK') 
                $error['slide_pic'] = $msg;
        }
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['slide_link'] = $_POST['slide_link'];
        $data['slide_title'] = $_POST['slide_title'];
        $data['slide_pic'] = $_POST['slide_pic'];
        $data['slide_status'] = $_POST['slide_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file slide.php */
/* Location: ./application/controllers/admin/slide.php */