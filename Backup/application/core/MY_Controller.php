<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        
        /* -- Set header : PHP -- */
        header ('Content-type: text/html; charset=utf-8');
    }
    
    ///////////////////////////////////////////////// Blank : Page /////////////////////////////////////////////////
    public function blank() 
    {
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/_blank.tpl.php');
        $this->load->view('user/foot.tpl.php');
    }
}

///////////////////////////////////////////////// MY_Admin /////////////////////////////////////////////////
class MY_Admin extends MY_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        
        $this->load->model(array('admin/center_model', 'admin/admin_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('admin_lib', 'f_lib', 'pager_lib', 'resize_lib', 'status_lib', 'checkfile_lib'));
        
        /* -- Set : Page authentication by admin level -- */
        $arr_page_admin = array('list_admin', 'add_admin');
        
        /* -- Set : Referer -- */
        if (!empty($_SERVER['HTTP_REFERER']))
            $url = $_SERVER['HTTP_REFERER'];
        else
            $url = BASE_AM;
        
        /* -- Check : Login -- */
        if ($this->router->class != 'authen' && $this->router->method != 'login') {
            if (!$this->admin_lib->is_login()) {
                $this->admin_lib->logout();
            }
        }
        
        /* -- Check : $arr_page_admin -- */
        if (in_array($this->uri->rsegment(2), $arr_page_admin)) {
            if (ADMIN_STATUS != 2) {
                /* -- Alert & Redirect -- */
                echo "<script>alert('หน้าสำหรับ Admin สูงสุดเท่านั้น')</script>";
                echo "<script>window.location='".$url."'</script>";
                exit;
            }
        }
    }
    
    ///////////////////////////////////////////////// Set : Data loop admin /////////////////////////////////////////////////
    function _set_loop_admin($list=null)
    {
        /* -- Loop : Data -- */
        if (!empty($list)) {
            foreach ($list as &$id) {
                $id['admin_add'] = (array)$this->admin_model->admin_select_id($id['add_by']);
                $id['admin_edit'] = (array)$this->admin_model->admin_select_id($id['edit_by']);
            }
        }
        
        /* -- Return -- */
        return $list;
    }
    
    ///////////////////////////////////////////////// Upload : Pic /////////////////////////////////////////////////
    function _upload_pic($id, $file_upload, $fill_pad, $prefix_name, $folder, $path, $width, $height, $type)
    {
        /* -- ===== Upload : Thumb ===== -- */
        if (is_file($file_upload)) {
            
            /* -- Set : Filename -- */
            $id_full = $this->f_lib->fill_pad($id, $fill_pad, 0);
            $name = $prefix_name.'_'.$id_full;

            /* -- Check : Exist folder -- */
            if (is_dir($path.'/'.$folder) != true)
                $this->f_lib->create_folder($path, $folder);

            /* -- Upload : Local -- */
            switch ($type) {
                case 'admin' :
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    break;
                case 'slide' :
                    $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', 'thumb_'.$id_full, 285, 150);
                    break;
                case 'article' :
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    break;
                case 'gallery_pic' :
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    break;
                case 'publicities_pic' :
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    break;
                case 'download_pic' :
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    break;
                case 'seminar_pic' :
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    break;
					
            }

            /* -- Update : Data (pic name) -- */
            $this->center_model->update_avatar($id, $filename, $type);
        }
    }
    
    ///////////////////////////////////////////////// Upload : Pic /////////////////////////////////////////////////
    function _upload_file($id, $file_upload, $fill_pad, $prefix_name, $folder, $path, $type)
    {
        /* -- ===== Upload : Thumb ===== -- */
        if (is_file($file_upload['tmp_name'])) {
            
            $fileupload_name = $file_upload['name'];
            $ext = strtolower(end(explode('.', $fileupload_name)));
            
            /* -- Set : Filename -- */
            $id_full = $this->f_lib->fill_pad($id, $fill_pad, 0);
            $name = "{$prefix_name}_{$id_full}.{$ext}";

            /* -- Check : Exist folder -- */
            if (is_dir($path.'/'.$folder) != true)
                $this->f_lib->create_folder($path, $folder);

            /* -- Upload : Local -- */
            switch ($type) {
                case 'download' :
                    $desPath = PATH_UPLOADS.'/download/'.$name;
                    @copy($file_upload['tmp_name'], $desPath);
                    unlink($file_upload['tmp_name']);
                    break;
                case 'publicities' :
                    $desPath = PATH_UPLOADS.'/publicities/'.$name;
                    @copy($file_upload['tmp_name'], $desPath);
                    unlink($file_upload['tmp_name']);
                    break;
                case 'seminar' :
                    $desPath = PATH_UPLOADS.'/seminar/'.$name;
                    @copy($file_upload['tmp_name'], $desPath);
                    unlink($file_upload['tmp_name']);
                    break;
					
            }

            /* -- Update : Data (pic name) -- */
            $this->center_model->update_avatar($id, $name, $type);
        }
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */