<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/download_model'));
    }
    
    ///////////////////////////////////////////////// Download : List /////////////////////////////////////////////////
    function list_download()
    {
        /* -- Select : List -- */
        $data['list'] = $this->download_model->download_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Download';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/download/list_download', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Download : Add /////////////////////////////////////////////////
    function add_download()
    {
        /* -- ================= Case : Submit form ================= -- */
        if (!empty($_POST['action']) && $_POST['action']=='save') {
            
            /* -- Check : Empty $_POST -- */
            $data['error'] = $this->_check_post(true);
            
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
                $id = $this->download_model->download_save();

                /* -- Get : Insert id -- */
                if ($id) {
                    /* -- Upload : Pic (Main) -- */
                    $id_full = $this->f_lib->fill_pad($id, 5, 0);
                    $folder = 'download/ID_'.$id_full;
                    $this->_upload_pic($id, $_FILES['download_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 220, 194, 'download_pic');
                    
                    /* -- Upload : File -- */
                    $folder = 'download';
                    $this->_upload_file($id, $_FILES['download_file'], 3, 'ID', $folder, PATH_UPLOADS, 'download');
                
                    /* -- Alert & Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/download/list_download'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Download';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/download/add_download', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Download : Edit /////////////////////////////////////////////////
    function edit_download()
    {
        /* -- Set : $id -- */
        $id = $_GET['download_id'];
        
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
                $this->download_model->download_update($id);
                
                /* -- Upload : Pic (Main) -- */
                $id_full = $this->f_lib->fill_pad($id, 5, 0);
                $folder = 'download/ID_'.$id_full;
                $this->_upload_pic($id, $_FILES['download_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 220, 194, 'download_pic');
                
                /* -- Upload : File -- */
                $folder = 'download';
                $this->_upload_file($id, $_FILES['download_file'], 3, 'ID', $folder, PATH_UPLOADS, 'download');
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->download_model->download_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Download';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/download/edit_download', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post($check_edit=null)
    {
        /* -- Title -- */
        if (empty($_POST['download_title']) || trim($_POST['download_title']) == '') 
            $error['download_title'] = 'กรุณากรอก Title';
        
        /* -- Description -- */
        if (empty($_POST['download_desc']) || trim($_POST['download_desc']) == '') 
            $error['download_desc'] = 'กรุณากรอก Description';
        
        /* -- Check files upload -- */
        if (is_file($_FILES['download_file']['tmp_name'])) {
            /* -- Check files upload -- */
            if ($_FILES['download_file']['error'] > 0) {
                $error['download_file'] = 'ขนาดไฟล์ใหญ่เกินกว่าที่ระบบกำหนด';
            }
        
            $this->load->library('checkfile_lib');

            $msg = $this->checkfile_lib->checkPDF($_FILES['download_file'], 5048000);
            if ($msg != 'OK') {
                $error['download_file'] = $msg;
            }
        } elseif (!empty($check_edit)) {
            $error['download_file'] = 'กรุณาอัพโหลดไฟล์ด้วย';
        }
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['download_title'] = $_POST['download_title'];
        $data['download_desc'] = $_POST['download_desc'];
        $data['download_status'] = $_POST['download_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file download.php */
/* Location: ./application/controllers/download.php */