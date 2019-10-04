<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Download : Select list all /////////////////////////////////////////////////
    function download_select_list($type_name, $page=1)
    {
        if ($type_name == 'brochure') $type = 1;
        elseif ($type_name == 'others') $type = 2;
        
        /* -- Count -- */
        $this->db->where('download_type', $type);
        $this->db->from(TB_DOWNLOAD);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(12, $count, BASE_HREF."download/{$type_name}/", $page);
                    
            $this->db->select('*');
            $this->db->from(TB_DOWNLOAD);
            $this->db->where('download_type', $type);
            $this->db->where('download_status', 1);
            $this->db->order_by('download_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
}
/* End of file download_model.php */
/* Location: ./application/models/user/download_model.php */