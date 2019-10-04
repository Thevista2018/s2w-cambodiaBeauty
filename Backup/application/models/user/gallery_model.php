<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// FAQ : Select list all /////////////////////////////////////////////////
    function gallery_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_GALLERY);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_HREF.'gallery/list_gallery?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_GALLERY);
            $this->db->where('gallery_status', 1);
            $this->db->order_by('gallery_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Gallery : Select ID /////////////////////////////////////////////////
    function gallery_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('gallery_id', $id);
        $this->db->from(TB_GALLERY);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
}
/* End of file gallery_model.php */
/* Location: ./application/models/user/gallery_model.php */