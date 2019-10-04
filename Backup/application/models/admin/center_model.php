<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Center_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Update : Ajax /////////////////////////////////////////////////
    function update_ajax($id, $status, $type)
    {
        /* -- Set : Default -- */
        if ($type == 'shortnews') $this->db->set('short_status', $status);
        else $this->db->set("{$type}_status", $status);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        
        if ($type == 'shortnews') $this->db->where('short_id', $id);
        else $this->db->where("{$type}_id", $id);
                
        switch ($type) {
            case 'admin' :
                $this->db->update(TB_ADMIN);
                break;
            case 'shortnews' :
                $this->db->update(TB_SHORTNEWS);
                break;
            case 'slide' :
                $this->db->update(TB_SLIDE);
                break;
            case 'download' :
                $this->db->update(TB_DOWNLOAD);
                break;
            case 'gallery' :
                $this->db->update(TB_GALLERY);
                break;
            case 'article' :
                $this->db->update(TB_ARTICLE);
                break;
            case 'publicities' :
                $this->db->update(TB_PUBLICITIES);
                break;
            case 'seminar' :
                $this->db->update('myan_seminar');
                break;
        
            default : 
                break;
        }
    }      
    
    ///////////////////////////////////////////////// Select : Status /////////////////////////////////////////////////
    function select_status($id, $type)
    {
        /* -- Set : Default -- */
        if ($type == 'shortnews') $this->db->select('short_id, short_status');
        else $this->db->select("{$type}_id, {$type}_status");
        
        if ($type == 'shortnews') $this->db->where('short_id', $id);
        else $this->db->where("{$type}_id", $id);
        
        switch ($type) {
            case 'admin' :
                $this->db->from(TB_ADMIN);
                break;
            case 'shortnews' :
                $this->db->from(TB_SHORTNEWS);
                break;
            case 'slide' :
                $this->db->from(TB_SLIDE);
                break;
            case 'download' :
                $this->db->from(TB_DOWNLOAD);
                break;
            case 'gallery' :
                $this->db->from(TB_GALLERY);
                break;
            case 'article' :
                $this->db->from(TB_ARTICLE);
                break;
            case 'publicities' :
                $this->db->from(TB_PUBLICITIES);
                break;
            case 'seminar' :
                $this->db->from('myan_seminar');
                break;
        
            default : 
                break;
        }
        
        /* -- Get : Data -- */
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }      
    
    ///////////////////////////////////////////////// Delete : ID /////////////////////////////////////////////////
    function delete_id($id, $type)
    {
        /* -- Set : Default -- */
        if ($type == 'shortnews') $this->db->where('short_id', $id);
        else $this->db->where("{$type}_id", $id);
        
        switch ($type) {
            case 'admin' :
                $this->db->delete(TB_ADMIN);
                break;
            case 'shortnews' :
                $this->db->delete(TB_SHORTNEWS);
                break;
            case 'slide' :
                $this->db->delete(TB_SLIDE);
                break;
            case 'download' :
                $this->db->delete(TB_DOWNLOAD);
                break;
            case 'gallery' :
                $this->db->delete(TB_GALLERY);
                break;
            case 'article' :
                $this->db->delete(TB_ARTICLE);
                break;
            case 'publicities' :
                $this->db->delete(TB_PUBLICITIES);
                break;
             case 'seminar' :
                $this->db->delete('myan_seminar');
                break;
       
            default : 
                break;
        }
    }
    
    ///////////////////////////////////////////////// Update : Avatar /////////////////////////////////////////////////
    function update_avatar($id, $filename, $type)
    {
        switch ($type) {
            /* -- Extend -- */
            case 'slide' :
                $this->db->set('slide_pic', $filename);
                $this->db->where('slide_id', $id);
                $this->db->update(TB_SLIDE);
                break;
            
            /* -- General -- */
            case 'admin' :
                $this->db->set('admin_avatar', $filename);
                $this->db->where('admin_id', $id);
                $this->db->update(TB_ADMIN);
                break;
            
            case 'download_pic' :
                $this->db->set('download_pic', $filename);
                $this->db->where('download_id', $id);
                $this->db->update(TB_DOWNLOAD);
                break;
            case 'download' :
                $this->db->set('download_file', $filename);
                $this->db->where('download_id', $id);
                $this->db->update(TB_DOWNLOAD);
                break;

            
            case 'article' :
                $this->db->set('article_pic', $filename);
                $this->db->where('article_id', $id);
                $this->db->update(TB_ARTICLE);
                break;
            case 'gallery_pic' :
                $this->db->set('gallery_pic', $filename);
                $this->db->where('gallery_id', $id);
                $this->db->update(TB_GALLERY);
                break;
            case 'gallery_pic_other' :
                $this->db->set('gallery_pic_other', $filename);
                $this->db->where('gallery_id', $id);
                $this->db->update(TB_GALLERY);
                break;
            case 'publicities_pic' :
                $this->db->set('publicities_pic', $filename);
                $this->db->where('publicities_id', $id);
                $this->db->update(TB_PUBLICITIES);
                break;
            case 'publicities' :
                $this->db->set('publicities_file', $filename);
                $this->db->where('publicities_id', $id);
                $this->db->update(TB_PUBLICITIES);
                break;
             case 'seminar_pic' :
                $this->db->set('seminar_pic', $filename);
                $this->db->where('seminar_id', $id);
                $this->db->update('myan_seminar');
                break;
				
        
            default : 
                break;
        }
    }
    
}
/* End of file agent_model.php */
/* Location: ./application/models/admin/agent_model.php */