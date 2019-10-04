<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authen extends My_admin
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
    }
    
    ///////////////////////////////////////////////// Login /////////////////////////////////////////////////
    function login()
    {
        /* -- Condition : Login -- */
        if ($this->admin_lib->is_login()) {
            header('Location: '.BASE_AM_DEFAULT);
            exit;
        } 
        
        /* -- Condition : No Login -- */
        else {
            $this->load->view('admin/login');
        }
    }
    
    ///////////////////////////////////////////////// Logout /////////////////////////////////////////////////
    function logout()
    {
        $this->admin_lib->logout();
    }
    
    
}
/* End of file authen.php */
/* Location: ./application/controllers/authen.php */