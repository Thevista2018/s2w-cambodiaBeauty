<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/download_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index($cat, $page=1)
    {
        $arr_cat = array('brochure', 'others');
        
        if (in_array($cat, $arr_cat)) {
            /* -- Select : List -- */
            $data['list'] = $this->download_model->download_select_list($cat, $page);
            
            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/download/list.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        else {
            parent::blank();
        }
    }
    
}
/* End of file download.php */
/* Location: ./application/controllers/download.php */