<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/gallery_model'));
    }
    
    ///////////////////////////////////////////////// Gallery : List /////////////////////////////////////////////////
    function list_gallery()
    {
        /* -- Select : List -- */
        $data['list'] = $this->gallery_model->gallery_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Gallery';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/gallery/list_gallery', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Gallery : Add /////////////////////////////////////////////////
    function add_gallery()
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
                $id = $this->gallery_model->gallery_save();

                /* -- Get : Insert id -- */
                if ($id) {
                    
                    /* -- Upload : Pic (Main) -- */
                    $id_full = $this->f_lib->fill_pad($id, 5, 0);
                    $folder = 'gallery/ID_'.$id_full;
                    $this->_upload_pic($id, $_FILES['gallery_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'gallery_pic');
                    
                    /* -- Upload : Pic (Other) -- */
                    $this->_upload_others_pic($id);
                    
                    /* -- Alert & Redirect -- */
                    echo "<script>alert('บันทึกข้อมูลเรียบร้อย')</script>";
                    echo "<script>window.location='".BASE_AM."/gallery/list_gallery'</script>";
                }
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าเพิ่ม Gallery';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/gallery/add_gallery', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Gallery : Edit /////////////////////////////////////////////////
    function edit_gallery()
    {
        /* -- Set : $id -- */
        $id = $_GET['gallery_id'];
        
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
                $this->gallery_model->gallery_update($id);
                
                /* -- Upload : Pic (Main) -- */
                $id_full = $this->f_lib->fill_pad($id, 5, 0);
                $folder = 'gallery/ID_'.$id_full;
                $this->_upload_pic($id, $_FILES['gallery_pic']['tmp_name'], 5, 'ID', $folder, PATH_UPLOADS, 205, 150, 'gallery_pic');
                    
                /* -- Delete : Pic (Other) -- */
                $this->_del_others_pic($id, $_POST['array_photo']);
                    
                /* -- Upload : Pic (Other) -- */
                    $this->_upload_others_pic($id);
                
                /* -- Alert & Redirect -- */
                echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>";
                echo "<script>window.location='".$_POST['url']."'</script>";
            }
        }
        
        /* -- ================= Case : No Submit ================= -- */
        else {
            /* -- Select : Data -- */
            $data['data'] = $this->gallery_model->gallery_select_id($id);
            $data['url'] = $_SERVER['HTTP_REFERER'];
        }
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้าแก้ไข Gallery';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/gallery/edit_gallery', $data);
        $this->load->view('admin/foot');
    }
    
    ///////////////////////////////////////////////// Check post /////////////////////////////////////////////////
    function _check_post()
    {
        /* -- Title -- */
        if (empty($_POST['gallery_title']) || trim($_POST['gallery_title']) == '') 
            $error['gallery_title'] = 'กรุณากรอก Title';
        
        /* -- Description -- */
//        if (empty($_POST['gallery_desc']) || trim($_POST['gallery_desc']) == '') 
//            $error['gallery_desc'] = 'กรุณากรอก Description';
        
        /* -- Return -- */
        return $error;
    }
    
    ///////////////////////////////////////////////// Set vars /////////////////////////////////////////////////
    function _set_var()
    {    
        $data['gallery_title'] = $_POST['gallery_title'];
        $data['gallery_date'] = $_POST['gallery_date'];
        $data['gallery_desc'] = $_POST['gallery_desc'];
        $data['gallery_id'] = $_POST['gallery_id'];
        $data['gallery_pic'] = $_POST['gallery_pic'];
        $data['gallery_pic_other'] = $_POST['gallery_pic_other'];
        $data['gallery_status'] = $_POST['gallery_status'];
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Gallery : Upload main pic /////////////////////////////////////////////////
    function _upload_main_pic($id, $file)
    {
        /* -- Load : Model -- */
        $this->load->model(array('admin/center_model'));
        
        /* -- ===== Upload : Thumb ===== -- */
        if (is_file($file['tmp_name'])) {
            $id_full = $this->f_lib->fill_pad($id, 5, 0);
            $name = 'main_large_'.$id_full;

            /* -- Check : Exist folder -- */
            $folder = 'ID_'.$id_full;
            $path = PATH_UPLOADS.'/gallery';

            if (is_dir($path.'/'.$folder)!=true)
                $this->f_lib->create_folder($path, $folder);

            /* -- Upload : Local -- */
            $filename = $this->resize_lib->resize($file['tmp_name'], $path.'/'.$folder.'/', $name, 156, 156);

            /* -- Update : Data (pic name) -- */
            $this->center_model->update_avatar($id, $filename, 'gallery_pic');
        }   
    }
    
    ///////////////////////////////////////////////// Product : Upload others pic /////////////////////////////////////////////////
    function _upload_others_pic($id=null)
    {
        /* -- ===== Condition : URL ===== -- */
        if ($_POST['add_type']==1) {
            $check_empty_array_URL = array('');
            $result_check_URL = array_diff($_POST['inputURL'], $check_empty_array_URL);

            if (!empty($result_check_URL)) { 
                /* -- Select : Array photo -- */
                $data = $this->gallery_model->gallery_select_id($id);
                if (!empty($data['gallery_pic_other'])) $old_array_photo = unserialize($data['gallery_pic_other']);
                else $old_array_photo = array();

                /* -- Merge : Array photo -- */
                $new_array_photo = array_merge($old_array_photo, $result_check_URL);

                /* -- Update : Data (pic name) -- */
                $this->center_model->update_avatar($id, serialize($new_array_photo), 'gallery_pic_other');
            } 
        }

        /* -- ===== Condition : Browse ===== -- */
        if ($_POST['add_type']==2) {
            $arr_file = $_FILES['inputBrowse']['tmp_name'];
            
            $check_empty_array = array('');
            $result_check = array_diff($arr_file, $check_empty_array);

            if (!empty($result_check)) {
                $id_full = $this->f_lib->fill_pad($id, 5, 0);
                
                /* -- Check : Exist folder -- */
                $folder = 'ID_'.$id_full;
                $path = PATH_UPLOADS.'/gallery';

                if (is_dir($path.'/'.$folder) != true)
                    $this->f_lib->create_folder($path, $folder);

                /* -- Check : Exist folder -- */
                if (is_dir($path.'/'.$folder.'/others') != true) {
                    $this->f_lib->create_folder($path.'/'.$folder, 'others');
                }

                $path_con = $path.'/'.$folder;
                $total = count($arr_file);

                /* -- Loop : Upload รูป inputBrowse -- */
                for ($i=0; $i<=$total; $i++) {
                    if (is_file($arr_file[$i])) {
                        $filename_m = $this->resize_lib->resize($arr_file[$i], $path_con.'/others/', uniqid($id.'_'), '', '');
                        $filename_more[] = $filename_m;
                    }
                }

                /* -- Select : Array photo -- */
                $data = $this->gallery_model->gallery_select_id($id);
                if (!empty($data['gallery_pic_other'])) $old_array_photo = unserialize($data['gallery_pic_other']);
                else $old_array_photo = array();

                /* -- Merge : Array photo -- */
                $new_array_photo = array_merge($old_array_photo, $filename_more);

                /* -- Update : Data (pic name) -- */
                $this->center_model->update_avatar($id, serialize($new_array_photo), 'gallery_pic_other');
            }
        }
    }
    
    ///////////////////////////////////////////////// Gallery : Delete pic other /////////////////////////////////////////////////
    function _del_others_pic($id, $array_photo)
    {
        if (!empty($array_photo)) { 
            /* -- Select : Array photo -- */
            $data = $this->gallery_model->gallery_select_id($id);
            
            if ($data['gallery_pic_other'] != '')
                $old_array_photo = unserialize($data['gallery_pic_other']);
            else 
                $old_array_photo = '';

            /* -- Delete : Array photo -- */
            if ($old_array_photo != '') {
                $new_array_photo = $this->f_lib->delete_some_array($old_array_photo, $array_photo);

                $path = PATH_UPLOADS.'/gallery';
                $folder = 'ID_'.$this->f_lib->fill_pad($id, 5, 0); 

                if ($new_array_photo != '') {
                    foreach ($old_array_photo as $del) {
                        if (in_array($del, $new_array_photo)==FALSE) {
                            if (!preg_match('/http/', $del, $matches))
                                unlink($path.'/'.$folder.'/others/'.$del);
                        }
                    }
                } else {
                    foreach ($old_array_photo as $del) {
                        if (!preg_match('/http/', $del, $matches))
                            unlink($path.'/'.$folder.'/others/'.$del);
                    }
                }

                /* -- Update : Data (pic name) -- */
                if ($new_array_photo=='') 
                    $new_array_photo = '';
                else 
                    $new_array_photo = serialize($new_array_photo);

                $this->gallery_model->gallery_update_pic_others($id, $new_array_photo);
            }
        }
    }
    
}
/* End of file gallery.php */
/* Location: ./application/controllers/admin/gallery.php */