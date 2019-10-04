<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pub extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/publicities_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index($page=1)
    {
        /* -- Select : List -- */
        $data['list'] = $this->publicities_model->publicities_select_list_all($page);

        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/publicities/list.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// View /////////////////////////////////////////////////
    public function view($id)
    {
        if ($id) {
            /* -- Select : List -- */
            $data['data'] = $this->publicities_model->publicities_select_id($id);
            
            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/publicities/view.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        else {
            parent::blank();
        }
    }    
    
}
/* End of file pub.php */
/* Location: ./application/controllers/pub.php */