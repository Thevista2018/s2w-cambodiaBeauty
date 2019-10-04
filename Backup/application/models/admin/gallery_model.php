<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Gallery : Select list all /////////////////////////////////////////////////
    function gallery_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_GALLERY);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/gallery/list_gallery?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_GALLERY);
            $this->db->order_by('gallery_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Gallery : Select ID /////////////////////////////////////////////////
    function gallery_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('gallery_id', $id);
        $this->db->from(TB_GALLERY);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// Gallery : Save /////////////////////////////////////////////////
    function gallery_save()
    {
        $gallery_date = $this->formatdate($_POST['gallery_date']);
        $this->db->set('gallery_title', strip_tags(trim($_POST['gallery_title'])));
        $this->db->set('gallery_title', strip_tags(trim($_POST['gallery_title'])));
        $this->db->set('gallery_desc', trim(nl2br($_POST['gallery_desc'])));
        $this->db->set('gallery_status', (int)$_POST['gallery_status']);
        $this->db->set('gallery_date', $gallery_date);

        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_GALLERY);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }
    
    ///////////////////////////////////////////////// Gallery : Update /////////////////////////////////////////////////
    function gallery_update($id)
    {
        $gallery_date = $this->formatdate($_POST['gallery_date']);
        $this->db->set('gallery_title', strip_tags(trim($_POST['gallery_title'])));
        $this->db->set('gallery_desc', trim(nl2br($_POST['gallery_desc'])));
        $this->db->set('gallery_status', (int)$_POST['gallery_status']);
        $this->db->set('gallery_date', $gallery_date);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('gallery_id', $id);
        $this->db->update(TB_GALLERY);
    }
    
    ///////////////////////////////////////////////// Gallery : Update pic others /////////////////////////////////////////////////
    function gallery_update_pic_others($id, $name)
    {
        $this->db->set('gallery_pic_other', $name);
        $this->db->where('gallery_id', $id);
        $this->db->update(TB_GALLERY);
    } 

    private function formatdate($date){
        if(!empty($date)){
            $d = explode('/', $date);
            return $d[2].'-'.$d[1].'-'.$d[0];
        }else{
            return NULL;
        }
    }
    
}
/* End of file gallery_model.php */
/* Location: ./application/models/admin/gallery_model.php */