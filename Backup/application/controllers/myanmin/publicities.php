<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicities extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/publicities_model'));
    }
    
    ///////////////////////////////////////////////// Publicities : List /////////////////////////////////////////////////
    function list_publicities()
    {
        /* -- Select : List -- */
        $data['list'] = $this->publicities_model->publicities_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Publicities';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/publicities/list_publicities', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Publicities : Add /////////////////////////////////////////////////
    function add_publicities()
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
                $id = $this->publicities_model->publicities_save();

                /* -- Get : Insert id -- */
                if ($id) { 
                    /* -- Upload : Pic -- */
                    $folder = 'publicities';
                    $this->_upload_pic($id, $_FILES['publicities_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'publicities_pic');
                    
                    /* -- Alert & Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/publicities/list_publicities'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Publicities';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/publicities/add_publicities', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Publicities : Edit /////////////////////////////////////////////////
    function edit_publicities()
    {
        /* -- Set : $id -- */
        $id = $_GET['publicities_id'];
        
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
                $this->publicities_model->publicities_update($id);
                
                /* -- Upload : Pic -- */
                $folder = 'publicities';
                $this->_upload_pic($id, $_FILES['publicities_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'publicities_pic');
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->publicities_model->publicities_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Publicities';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/publicities/edit_publicities', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post()
    {    
        /* -- Title -- */
        if (empty($_POST['publicities_title']) || trim($_POST['publicities_title']) == '') 
            $error['publicities_title'] = 'กรุณากรอก Title';

        /* -- Description -- */
        if (empty($_POST['publicities_desc'])) 
            $error['publicities_desc'] = 'กรุณากรอก Description';
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['publicities_title'] = $_POST['publicities_title'];
        $data['publicities_sub_title'] = $_POST['publicities_sub_title'];
        $data['publicities_desc'] = $_POST['publicities_desc'];
        $data['publicities_pic'] = $_POST['publicities_pic'];
        $data['publicities_date'] = $_POST['publicities_date'];
        $data['publicities_status'] = $_POST['publicities_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file publicities.php */
/* Location: ./application/controllers/publicities.php */