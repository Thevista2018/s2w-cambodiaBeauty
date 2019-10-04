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
    function seminar_select_list($type=1,$page=1, $limit=12)
    {
        /* -- Count -- */
        $this->db->from('myan_seminar');
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css($limit, $count, BASE_HREF."seminar/page/", $page);
                    
            $this->db->select('*');
            $this->db->from('myan_seminar');
			$this->db->where('seminar_type', $type);
            $this->db->where('seminar_status', 1);
            $this->db->order_by('seminar_id', 'DESC');
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
    
}
/* End of file seminar_model.php */
/* Location: ./application/models/user/seminar_model.php */