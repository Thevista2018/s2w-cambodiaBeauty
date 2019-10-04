<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->model(array('admin/register_model'));
    }
    
    ///////////////////////////////////////////////// Register : List /////////////////////////////////////////////////
    function list_register()
    {
        /* -- Select : List -- */
        $data['list'] = $this->register_model->register_select_list($_GET['page']);
        
            /* -- Loop : Data (Admin name) -- */
            $data['list']['data'] = $this->_set_loop_admin($data['list']['data']);
        
        /* -- Set : Title -- */
        $head['title'] = WEB_NAME.' : หน้ารายการ Register';
        
        /* -- Load : Template -- */
        $this->load->view('admin/head', $head);
        $this->load->view('admin/register/list_register', $data);
        $this->load->view('admin/foot');
    }
    
}
/* End of file register.php */
/* Location: ./application/controllers/myanmin/register.php */