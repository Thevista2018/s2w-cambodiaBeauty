<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Contact us : Select list all /////////////////////////////////////////////////
    function contact_us_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_CONTACT_US);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/contact_us/list_contact_us?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_CONTACT_US);
            $this->db->order_by('contact_us_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Contact us : Select ID /////////////////////////////////////////////////
    function contact_us_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('contact_us_id', $id);
        $this->db->from(TB_CONTACT_US);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
}
/* End of file contact_us_model.php */
/* Location: ./application/models/admin/contact_us_model.php */