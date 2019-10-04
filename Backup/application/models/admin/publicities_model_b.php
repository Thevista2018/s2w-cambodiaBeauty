<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicities_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Publicities : Select list all /////////////////////////////////////////////////
    function publicities_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_PUBLICITIES);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/publicities/list_publicities?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_PUBLICITIES);
            $this->db->order_by('publicities_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Publicities : Select ID /////////////////////////////////////////////////
    function publicities_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('publicities_id', $id);
        $this->db->from(TB_PUBLICITIES);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// ฺPublicities : Save /////////////////////////////////////////////////
    function publicities_save()
    {
        $this->db->set('publicities_title', strip_tags(trim($_POST['publicities_title'])));
        $this->db->set('publicities_desc', nl2br(trim($_POST['publicities_desc'])));
        $this->db->set('publicities_status', (int)$_POST['publicities_status']);
        
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_PUBLICITIES);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }     
    
    ///////////////////////////////////////////////// ฺPublicities : Update /////////////////////////////////////////////////
    function publicities_update($id)
    {
        $this->db->set('publicities_title', strip_tags(trim($_POST['publicities_title'])));
        $this->db->set('publicities_desc', nl2br(trim($_POST['publicities_desc'])));
        $this->db->set('publicities_status', (int)$_POST['publicities_status']);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('publicities_id', $id);
        $this->db->update(TB_PUBLICITIES);
    }
    
}
/* End of file publicities_model.php */
/* Location: ./application/models/admin/publicities_model.php */