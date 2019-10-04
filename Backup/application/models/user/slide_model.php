<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Slide : Select list /////////////////////////////////////////////////
    function slide_select_list()
    {
        /* -- Count -- */
        $this->db->where('slide_status', 1);
        $this->db->from(TB_SLIDE);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            $this->db->select('*');
            $this->db->from(TB_SLIDE);
            $this->db->where('slide_status', 1);
            $this->db->order_by('slide_id', 'DESC');
            $this->db->limit(5, 0);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file slide_model.php */
/* Location: ./application/models/user/slide_model.php */