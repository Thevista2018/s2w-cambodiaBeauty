<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Center extends My_Admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        /* -- Load : Model -- */
        $this->load->model(array('admin/center_model'));
    }
    
    ///////////////////////////////////////////////// Update : Ajax /////////////////////////////////////////////////
    function update_ajax()
    {
        /* -- Set : $id -- */
        $id = $_POST['id'];
        $status = $_POST['status'];
        $type = $_POST['type'];
        
        /* -- Update : Data -- */
        $this->center_model->update_ajax($id, $status, $type);
        
        /* -- Select : Status -- */
        $data = $this->center_model->select_status($id, $type);
        
        /* -- Return -- */
        echo json_encode($data);
    }
    
    ///////////////////////////////////////////////// Delete : ID /////////////////////////////////////////////////
    function del_id()
    {
        /* -- Load : Model -- */
        $this->load->model(array('admin/admin_model'));
        
        /* -- Set : $id -- */
        $id = $_GET['id'];
        $type = $_GET['type'];
        
        if ($type=='admin') $filename = $this->admin_model->admin_select_avatar($id);
        
        /* -- Delete : Data -- */
        $this->center_model->delete_id($id, $type);

        /* -- Redirect -- */
        switch ($type) {
            
            case 'admin' :
                /* -- Delete : Folder -- */
                $path_del = $_SERVER['DOCUMENT_ROOT'].'/admin/avatar/';
                $this->f_lib->del_pic($path_del, $filename['admin_avatar']);
                break;
            
            case 'member' :
                /* -- Delete : Pic -- */
                $folder = floor($id/1000);
                $path_del = $_SERVER['DOCUMENT_ROOT'].'/uploads/member/';
                $this->f_lib->del_pic($path_del.$folder, $filename['member_avatar']);
                break;
            
            case 'product' :
                /* -- Delete : Folder -- */
                $id_full = $this->f_lib->fill_pad($id, 5, 0);
                $folder = 'ID_'.$id_full;
                $path_del = $_SERVER['DOCUMENT_ROOT'].'/uploads/product';
                $this->f_lib->del_folder($path_del.'/'.$folder);
                break;
			case 'seminar' :
				$id_full = $this->f_lib->fill_pad($id, 5, 0);
				$folder = 'ID_'.$id_full.'.jpg';
                $path_del = $_SERVER['DOCUMENT_ROOT'].'/uploads/seminar';
                $this->f_lib->del_pic($path_del,$folder);
                break;
            
            default : 
                break;
        }
        
        echo "<script>alert('ลบข้อมูลเรียบร้อย')</script>";
        echo "<script>window.location='".BASE_AM."/{$type}/list_{$type}'</script>";
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
            if (is_dir($path.'/'.$folder)!=true)
                $this->f_lib->create_folder($path, $folder);

            /* -- Upload : Local -- */
            switch ($type) {
                case 'slide' :
                    $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', $name, $width, $height);
                    $filename = $this->resize_lib->resize($file_upload, $path.'/'.$folder.'/', 'thumb_'.$id_full, 285, 150);
                    break;
            }

            /* -- Update : Data (pic name) -- */
            $this->admin_model->update_avatar($id, $filename, $type);
        }   
    }
    
}
/* End of file center.php */
/* Location: ./application/controllers/admin/center.php */