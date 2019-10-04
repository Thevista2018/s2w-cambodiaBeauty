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
    function download_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_DOWNLOAD);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/download/list_download?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_DOWNLOAD);
            $this->db->order_by('download_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Download : Select ID /////////////////////////////////////////////////
    function download_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('download_id', $id);
        $this->db->from(TB_DOWNLOAD);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// ฺDownload : Save /////////////////////////////////////////////////
    function download_save()
    {
        $this->db->set('download_title', strip_tags(trim($_POST['download_title'])));
        $this->db->set('download_desc', nl2br(trim($_POST['download_desc'])));
        $this->db->set('download_type', (int)$_POST['download_type']);
        $this->db->set('download_status', (int)$_POST['download_status']);
        
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_DOWNLOAD);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }     
    
    ///////////////////////////////////////////////// ฺDownload : Update /////////////////////////////////////////////////
    function download_update($id)
    {
        $this->db->set('download_title', strip_tags(trim($_POST['download_title'])));
        $this->db->set('download_desc', nl2br(trim($_POST['download_desc'])));
        $this->db->set('download_type', (int)$_POST['download_type']);
        $this->db->set('download_status', (int)$_POST['download_status']);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('download_id', $id);
        $this->db->update(TB_DOWNLOAD);
    }
    
}
/* End of file download_model.php */
/* Location: ./application/models/admin/download_model.php */