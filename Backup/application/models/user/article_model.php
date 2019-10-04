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
    function article_select_list_by_cat($cat_name, $page=1)
    {
        if ($cat_name == 'news') $article_cat = 1;
        elseif ($cat_name == 'press-release') $article_cat = 2;
        
        /* -- Count -- */
        $this->db->where('article_cat', $article_cat);
        $this->db->from(TB_ARTICLE);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css(12, $count, BASE_HREF."article/{$cat_name}/", $page);
                    
            $this->db->select('*');
            $this->db->from(TB_ARTICLE);
            $this->db->where('article_cat', $article_cat);
            $this->db->where('article_status', 1);
            $this->db->order_by('article_id', 'DESC');
            $this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }

    function article_select_list_all($cat_name, $page=1){
        if ($cat_name == 'news') $article_cat = 1;
        elseif ($cat_name == 'press-release') $article_cat = 2;
        
        /* -- Count -- */
        $this->db->where('article_cat', $article_cat);
        $this->db->from(TB_ARTICLE);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {

            $this->db->select('*');
            $this->db->from(TB_ARTICLE);
            $this->db->where('article_cat', $article_cat);
            $this->db->where('article_status', 1);
            $this->db->order_by('article_id', 'DESC');
            //$this->db->limit($_limit, $_l);

            $data['data'] = $this->db->get()->result_array();
        }
        
        /* -- Return -- */
        return $data;
    }
    
    ///////////////////////////////////////////////// Article : Select list all /////////////////////////////////////////////////
    function article_select_list($page=1, $limit=10)
    {
        /* -- Count -- */
        $this->db->from(TB_ARTICLE);
        $count = $this->db->count_all_results();
        
        /* -- Select : Data -- */
        if ($count) {
            list($data['pg'], $_limit, $_l) = $this->pager_lib->page_css($limit, $count, BASE_HREF.'article/list_article?page=', $page);
                    
            $this->db->select('*');
            $this->db->from(TB_ARTICLE);
            $this->db->where('article_status', 1);
            $this->db->order_by('article_id', 'DESC');
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
    
}
/* End of file article_model.php */
/* Location: ./application/models/user/article_model.php */