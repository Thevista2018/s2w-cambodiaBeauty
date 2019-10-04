<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/content_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
        
        /* -- Set header : PHP -- */
        header ('Content-type: text/html; charset=utf-8');
    }
    
    ///////////////////////////////////////////////// List /////////////////////////////////////////////////
    public function content_list()
    {
        /* -- Select : List -- */
        $data['list'] = $this->content_model->content_select_list();

        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php', $head);
        $this->load->view('user/content/list.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// View /////////////////////////////////////////////////
    public function view($id)
    {
        if ($id) {
            /* -- Select : List -- */
            $data = $this->content_model->content_select_id($id);

            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/content/view.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        
        else {
            
        }
    }
    
}
/* End of file content.php */
/* Location: ./application/controllers/content.php */