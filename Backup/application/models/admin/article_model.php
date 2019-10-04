<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Article : Select list all /////////////////////////////////////////////////
    function article_select_list($page=1)
    {
        /* -- Count -- */
        $this->db->from(TB_ARTICLE);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(10, $count, BASE_AM.'/article/list_article?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_ARTICLE);
            $this->db->order_by('article_id', 'ASC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Article : Select ID /////////////////////////////////////////////////
    function article_select_id($id)
    {
        $this->db->select('*');
        $this->db->where('article_id', $id);
        $this->db->from(TB_ARTICLE);
        $data = $this->db->get()->result_array();

        /* -- Return -- */
        return $data[0];
    }
    
    ///////////////////////////////////////////////// Article : Save /////////////////////////////////////////////////
    function article_save()
    {
        $article_date = $this->formatdate($_POST['article_date']);
        $this->db->set('article_cat', (int)$_POST['article_cat']);
        $this->db->set('article_title', strip_tags(trim($_POST['article_title'])));
        $this->db->set('article_sub_title', strip_tags(trim($_POST['article_sub_title'])));
        $this->db->set('article_desc', nl2br(trim($_POST['article_desc'])));
        $this->db->set('article_status', (int)$_POST['article_status']);
        $this->db->set('article_date', $article_date);
        
        $this->db->set('add_by', ADMIN_ID);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_ARTICLE);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }     
    
    ///////////////////////////////////////////////// Article : Update /////////////////////////////////////////////////
    function article_update($id)
    {
        $article_date = $this->formatdate($_POST['article_date']);
        $this->db->set('article_cat', (int)$_POST['article_cat']);
        $this->db->set('article_title', strip_tags(trim($_POST['article_title'])));
        $this->db->set('article_sub_title', strip_tags(trim($_POST['article_sub_title'])));
        $this->db->set('article_desc', nl2br(trim($_POST['article_desc'])));
        $this->db->set('article_status', (int)$_POST['article_status']);
        $this->db->set('article_date', $article_date);
        
        $this->db->set('edit_by', ADMIN_ID);
        $this->db->set('edit_date', 'NOW()', FALSE);
        $this->db->where('article_id', $id);
        $this->db->update(TB_ARTICLE);
    }

    private function formatdate($date){
        if(!empty($date)){
            $d = explode('/', $date);
            return $d[2].'-'.$d[1].'-'.$d[0];
        }else{
            return NULL;
        }
    }
    
}
/* End of file article_model.php */
/* Location: ./application/models/admin/article_model.php */