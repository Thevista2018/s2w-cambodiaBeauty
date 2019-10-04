<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/gallery_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index()
    {
        /* -- Select : List -- */
        $data['list'] = $this->gallery_model->gallery_select_list();
        
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/gallery/list.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// Product /////////////////////////////////////////////////
    public function view($id=null)
    {
        /* --- Get : Product ID --- */
        $data['data'] = $this->gallery_model->gallery_select_id($id);
            
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/gallery/view.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
}
/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */