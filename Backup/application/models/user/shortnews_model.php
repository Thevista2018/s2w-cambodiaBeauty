<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shortnews_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Shortnews : Select list /////////////////////////////////////////////////
    function shortnews_select_list()
    {
        /* -- Count -- */
        $this->db->where('short_status', 1);
        $this->db->from(TB_SHORTNEWS);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            $this->db->select('*');
            $this->db->from(TB_SHORTNEWS);
            $this->db->where('short_status', 1);
            $this->db->order_by('short_id', 'DESC');
            $this->db->limit(20, 0);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file shortnews_model.php */
/* Location: ./application/models/user/shortnews_model.php */