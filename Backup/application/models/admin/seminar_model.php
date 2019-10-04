<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seminar_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Seminar : Select list all /////////////////////////////////////////////////
    function seminar_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from('myan_seminar');
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/seminar/list_seminar?page=', $page);
                    
            $this->db->select('*');
            $this->db->from('myan_seminar');
            $this->db->order_by('seminar_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Seminar : Select ID /////////////////////////////////////////////////
    function seminar_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('seminar_id', $id);
        $this->db->from('myan_seminar');
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// Seminar : Save /////////////////////////////////////////////////
    function seminar_save()
    {
        $this->db->set('seminar_title', strip_tags(trim($_POST['seminar_title'])));
		$this->db->set('seminar_type', (int)$_POST['seminar_type']);
        $this->db->set('seminar_sub_title', strip_tags(trim($_POST['seminar_sub_title'])));
        $this->db->set('seminar_desc', trim($_POST['seminar_desc']));
        $this->db->set('seminar_status', (int)$_POST['seminar_status']);
        
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert('myan_seminar');
        
        /* -- Return -- */
        return $this->db->insert_id();
    }     
    
    ///////////////////////////////////////////////// Seminar : Update /////////////////////////////////////////////////
    function seminar_update($id)
    {
        $this->db->set('seminar_title', strip_tags(trim($_POST['seminar_title'])));
		$this->db->set('seminar_type', (int)$_POST['seminar_type']);
        $this->db->set('seminar_sub_title', strip_tags(trim($_POST['seminar_sub_title'])));
        $this->db->set('seminar_desc', trim($_POST['seminar_desc']));
        $this->db->set('seminar_status', (int)$_POST['seminar_status']);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('seminar_id', $id);
        $this->db->update('myan_seminar');
    }
    
}
/* End of file seminar_model.php */
/* Location: ./application/models/admin/seminar_model.php */