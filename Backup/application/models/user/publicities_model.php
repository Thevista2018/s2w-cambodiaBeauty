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
    function publicities_select_list($page=1, $limit=12)
    {
        /* -- Count -- */
        $this->db->from(TB_PUBLICITIES);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css($limit, $count, BASE_HREF."publicities/page/", $page);
                    
            $this->db->select('*');
            $this->db->from(TB_PUBLICITIES);
            $this->db->where('publicities_status', 1);
            $this->db->order_by('publicities_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }

    public function publicities_select_list_all($page=1, $limit=12)
    {
        /* -- Count -- */
        $this->db->from(TB_PUBLICITIES);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
                    
            $this->db->select('*');
            $this->db->from(TB_PUBLICITIES);
            $this->db->where('publicities_status', 1);
            $this->db->order_by('publicities_id', 'DESC');
            //$this->db->limit($_limit, $_l);

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
    
}
/* End of file publicities_model.php */
/* Location: ./application/models/user/publicities_model.php */