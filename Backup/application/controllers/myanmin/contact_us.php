<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/contact_us_model'));
    }
    
    ///////////////////////////////////////////////// Contact us : List /////////////////////////////////////////////////
    function list_contact_us()
    {
        /* -- Select : List -- */
        $data['list'] = $this->contact_us_model->contact_us_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Downlaod';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/contact_us/list_contact_us', $data);
        $this->load->view('admin/foot');
    }
    
}
/* End of file contact_us.php */
/* Location: ./application/controllers/myanmin/contact_us.php */