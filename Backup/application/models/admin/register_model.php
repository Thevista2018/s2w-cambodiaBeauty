<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Register : Select list all /////////////////////////////////////////////////
    function register_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_REGISTER);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/register/list_register?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_REGISTER);
            $this->db->order_by('register_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Register : Select ID /////////////////////////////////////////////////
    function register_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('register_id', $id);
        $this->db->from(TB_REGISTER);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
}
/* End of file register_model.php */
/* Location: ./application/models/admin/register_model.php */