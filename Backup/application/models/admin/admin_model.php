<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Admin : Select list /////////////////////////////////////////////////
    function admin_select_list($page=1, $per_page=10)
    {
        /* -- Count -- */
        $this->db->from(TB_ADMIN);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css($per_page, $count, BASE_AM.'/admin/list_admin?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_ADMIN);
            $this->db->order_by('admin_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Admin : Select ID /////////////////////////////////////////////////
    function admin_select_id($id)
    {
        $this->db->select('admin_user, admin_pass, admin_status');
        $this->db->where('admin_id', $id);
        $this->db->from(TB_ADMIN);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// Admin : Save /////////////////////////////////////////////////
    function admin_save()
    {
        $this->db->set('admin_user', strip_tags(trim($_POST['admin_user'])));
        $this->db->set('admin_pass', $_POST['admin_pass']);
        $this->db->set('admin_status', $_POST['admin_status']);
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_ADMIN);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }
    
    ///////////////////////////////////////////////// Admin : Update /////////////////////////////////////////////////
    function admin_update($id)
    {
        $this->db->set('admin_user', strip_tags(trim($_POST['admin_user'])));
        $this->db->set('admin_pass', $_POST['admin_pass']);
        $this->db->set('admin_status', $_POST['admin_status']);
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('admin_id', $id);
        $this->db->update(TB_ADMIN);
    }
    
}
/* End of file admin_model.php */
/* Location: ./application/models/admin/admin_model.php */