<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Branch : Select list all /////////////////////////////////////////////////
    function register_save()
    {
        $this->db->set('contact_name', strip_tags(trim($_POST['name'])));
        $this->db->set('contact_email', strip_tags(trim($_POST['email'])));
        $this->db->set('contact_website', strip_tags(trim($_POST['website'])));
        $this->db->set('contact_tel', strip_tags(trim($_POST['tel'])));
        $this->db->set('contact_desc', nl2br(trim($_POST['desc'])));
        $this->db->set('contact_status', (int)1);
        
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_REGISTER);
        
        /* -- Return -- */
        return $this->db->insert_id();
    }  
    
}
/* End of file register_model.php */
/* Location: ./application/models/user/register_model.php */