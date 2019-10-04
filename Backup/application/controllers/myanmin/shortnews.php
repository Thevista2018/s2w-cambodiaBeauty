<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shortnews extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/shortnews_model'));
    }
    
    ///////////////////////////////////////////////// Shortnews : List /////////////////////////////////////////////////
    function list_shortnews()
    {
        /* -- Select : List -- */
        $data['list'] = $this->shortnews_model->shortnews_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Shortnews';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/shortnews/list_shortnews', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Shortnews : Add /////////////////////////////////////////////////
    function add_shortnews()
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
                $id = $this->shortnews_model->shortnews_save();

                /* -- Get : Insert id -- */
                if ($id) {
                    /* -- Alert & Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/shortnews/list_shortnews'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Shortnews';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/shortnews/add_shortnews', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Shortnews : Edit /////////////////////////////////////////////////
    function edit_shortnews()
    {
        /* -- Set : $id -- */
        $id = $_GET['short_id'];
        
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
                $this->shortnews_model->shortnews_update($id);
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->shortnews_model->shortnews_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Shortnews';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/shortnews/edit_shortnews', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post($check_edit=null)
    {
        /* -- Title -- */
        if (empty($_POST['short_title']) || trim($_POST['short_title']) == '') 
            $error['short_title'] = 'กรุณากรอก Title';
        
        /* -- Link -- */
        if (empty($_POST['short_link']) || trim($_POST['short_link']) == '') 
            $error['short_link'] = 'กรุณากรอก Link';
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['short_title'] = $_POST['short_title'];
        $data['short_link'] = $_POST['short_link'];
        $data['short_status'] = $_POST['short_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file shortnews.php */
/* Location: ./application/controllers/myanmin/shortnews.php */