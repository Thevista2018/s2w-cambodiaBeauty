<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/seminar_model'));
    }
    
    ///////////////////////////////////////////////// Seminar : List /////////////////////////////////////////////////
    function list_seminar()
    {
        /* -- Select : List -- */
        $data['list'] = $this->seminar_model->seminar_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Seminar';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/seminar/list_seminar', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Seminar : Add /////////////////////////////////////////////////
    function add_seminar()
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
                $id = $this->seminar_model->seminar_save();

                /* -- Get : Insert id -- */
                if ($id) { 
                    /* -- Upload : Pic -- */
                    $folder = 'seminar';
                    $this->_upload_pic($id, $_FILES['seminar_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'seminar_pic');
                    
                    /* -- Alert & Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/seminar/list_seminar'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Seminar';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/seminar/add_seminar', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Seminar : Edit /////////////////////////////////////////////////
    function edit_seminar()
    {
        /* -- Set : $id -- */
        $id = $_GET['seminar_id'];
        
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
                $this->seminar_model->seminar_update($id);
                
                /* -- Upload : Pic -- */
                $folder = 'seminar';
                $this->_upload_pic($id, $_FILES['seminar_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'seminar_pic');
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->seminar_model->seminar_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Seminar';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/seminar/edit_seminar', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post()
    {    
        /* -- Title -- */
        if (empty($_POST['seminar_title']) || trim($_POST['seminar_title']) == '') 
            $error['seminar_title'] = 'กรุณากรอก Title';

        /* -- Description -- */
        if (empty($_POST['seminar_desc'])) 
            $error['seminar_desc'] = 'กรุณากรอก Description';
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['seminar_title'] = $_POST['seminar_title'];
        $data['seminar_sub_title'] = $_POST['seminar_sub_title'];
        $data['seminar_desc'] = $_POST['seminar_desc'];
        $data['seminar_pic'] = $_POST['seminar_pic'];
        $data['seminar_status'] = $_POST['seminar_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file seminar.php */
/* Location: ./application/controllers/seminar.php */