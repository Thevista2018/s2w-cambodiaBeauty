<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends MY_Controller 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('user/seminar_model'));
        $this->load->helper(array('url', 'html'));
        $this->load->library(array('f_lib', 'pager_lib'));
    }
    
    ///////////////////////////////////////////////// Index /////////////////////////////////////////////////
    public function index($type=1,$page=1)
    {
        /* -- Select : List -- */
        $data['list'] = $this->seminar_model->seminar_select_list($type,$page);

		if($type == 1){
			$data['type'] = "Seminar / Conference";
		}else{
			$data['type'] = "Special Activity";	
		}
		
        /* -- Load : Template -- */
        $this->load->view('user/head.tpl.php');
        $this->load->view('user/seminar/list.tpl.php', $data);
        $this->load->view('user/foot.tpl.php');
    }
    
    ///////////////////////////////////////////////// View /////////////////////////////////////////////////
    public function view($id)
    {
        if ($id) {
            /* -- Select : List -- */
            $data['data'] = $this->seminar_model->seminar_select_id($id);
            
            /* -- Load : Template -- */
            $this->load->view('user/head.tpl.php');
            $this->load->view('user/seminar/view.tpl.php', $data);
            $this->load->view('user/foot.tpl.php');
        }
        else {
            parent::blank();
        }
    }    
    
}
/* End of file pub.php */
/* Location: ./application/controllers/pub.php */