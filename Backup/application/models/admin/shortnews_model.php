<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shortnews_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Shortnews : Select list all /////////////////////////////////////////////////
    function shortnews_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_SHORTNEWS);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/shortnews/list_shortnews?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_SHORTNEWS);
            $this->db->order_by('short_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Shortnews : Select ID /////////////////////////////////////////////////
    function shortnews_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('short_id', $id);
        $this->db->from(TB_SHORTNEWS);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// ฺShortnews : Save /////////////////////////////////////////////////
    function shortnews_save()
    {
        $this->db->set('short_title', strip_tags(trim($_POST['short_title'])));
        $this->db->set('short_link', strip_tags(trim($_POST['short_link'])));
        $this->db->set('short_status', (int)$_POST['short_status']);
        
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_SHORTNEWS);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }     
    
    ///////////////////////////////////////////////// ฺShortnews : Update /////////////////////////////////////////////////
    function shortnews_update($id)
    {
        $this->db->set('short_title', strip_tags(trim($_POST['short_title'])));
        $this->db->set('short_link', strip_tags(trim($_POST['short_link'])));
        $this->db->set('short_status', (int)$_POST['short_status']);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('short_id', $id);
        $this->db->update(TB_SHORTNEWS);
    }
    
}
/* End of file shortnews_model.php */
/* Location: ./application/models/admin/shortnews_model.php */