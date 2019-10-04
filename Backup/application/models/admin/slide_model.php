<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Slide : Select list all /////////////////////////////////////////////////
    function slide_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_SLIDE);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/slide/list_slide?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_SLIDE);
            $this->db->order_by('slide_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Slide : Select ID /////////////////////////////////////////////////
    function slide_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('slide_id', $id);
        $this->db->from(TB_SLIDE);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// Slide : Save /////////////////////////////////////////////////
    function slide_save()
    {
        $this->db->set('slide_title', strip_tags(trim($_POST['slide_title'])));
        $this->db->set('slide_link', strip_tags(trim($_POST['slide_link'])));
        $this->db->set('slide_status', (int)$_POST['slide_status']);
        
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_SLIDE);
        
        /* -- Return -- */
        return $this->db->insert_id();
    } 
    
    ///////////////////////////////////////////////// Slide : Update /////////////////////////////////////////////////
    function slide_update($id)
    {
        $this->db->set('slide_title', strip_tags(trim($_POST['slide_title'])));
        $this->db->set('slide_link', strip_tags(trim($_POST['slide_link'])));
        $this->db->set('slide_status', (int)$_POST['slide_status']);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('slide_id', $id);
        $this->db->update(TB_SLIDE);
    }
    
}
/* End of file slide_model.php */
/* Location: ./application/models/admin/slide_model.php */