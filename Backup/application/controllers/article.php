<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/article_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
        
        /* -- Set header : PHP -- */
        header ('Content-type: text/html; charset=utf-8');
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index($cat, $page=1)
    {
//        $arr_cat = array('news', 'press-release');
        $arr_cat = array('news');
        
        if (in_array($cat, $arr_cat)) {
            /* -- Select : List -- */
            $data['list'] = $this->article_model->article_select_list_all($cat, $page);
            $data['cat_name'] = $cat;
            
            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/article/list.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        else {
            parent::blank();
        }
    }
    
    ///////////////////////////////////////////////// View /////////////////////////////////////////////////
    public function view($id)
    {
        if ($id) {
            /* -- Select : List -- */
            $data['data'] = $this->article_model->article_select_id($id);
            
            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/article/view.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        else {
            parent::blank();
        }
    }
    
}
/* End of file article.php */
/* Location: ./application/controllers/article.php */