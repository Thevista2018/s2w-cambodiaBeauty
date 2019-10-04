<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/article_model'));
    }
    
    ///////////////////////////////////////////////// Article : List /////////////////////////////////////////////////
    function list_article()
    {
        /* -- Select : List -- */
        $data['list'] = $this->article_model->article_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ บทความ';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/article/list_article', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Article : Add /////////////////////////////////////////////////
    function add_article()
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
                $id = $this->article_model->article_save();

                /* -- Get : Insert id -- */
                if ($id) { 
                    /* -- Upload : Pic -- */
                    $folder = 'article';
                    $this->_upload_pic($id, $_FILES['article_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'article');
                    
                    /* -- Alert & Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/article/list_article'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม บทความ';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/article/add_article', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Article : Edit /////////////////////////////////////////////////
    function edit_article()
    {
        /* -- Set : $id -- */
        $id = $_GET['article_id'];
        
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
                $this->article_model->article_update($id);
                
                /* -- Upload : Pic -- */
                $folder = 'article';
                $this->_upload_pic($id, $_FILES['article_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'article');
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->article_model->article_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข บทความ';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/article/edit_article', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post()
    {    
        /* -- Title -- */
        if (empty($_POST['article_title']) || trim($_POST['article_title']) == '') 
            $error['article_title'] = 'กรุณากรอก Title';

        /* -- Description -- */
        if (empty($_POST['article_desc'])) 
            $error['article_desc'] = 'กรุณากรอก Description';
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['article_cat'] = $_POST['article_cat'];
        $data['article_title'] = $_POST['article_title'];
        $data['article_sub_title'] = $_POST['article_sub_title'];
        $data['article_desc'] = $_POST['article_desc'];
        $data['article_pic'] = $_POST['article_pic'];
        $data['article_date'] = $_POST['article_date'];
        $data['article_status'] = $_POST['article_status'];
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file article.php */
/* Location: ./application/controllers/article.php */