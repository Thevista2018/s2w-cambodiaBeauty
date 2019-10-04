<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/shortnews_model', 'user/slide_model', 'user/article_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index()
    {
        /* -- Shortnews : List -- */
        $data['shortnews_list'] = $this->shortnews_model->shortnews_select_list();
        
        /* -- Slide : List -- */
        $data['slide_list'] = $this->slide_model->slide_select_list();
        
        /* -- Article : List -- */
        $data['article_list'] = $this->article_model->article_select_list(1, 3);
        
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/home.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Contact /////////////////////////////////////////////////
    public function contact()
    {
        /* -- Select : List -- */
//        $data['slide_list'] = $this->user_model->select_slide_list();
        
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/contact.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */