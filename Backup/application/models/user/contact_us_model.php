<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Branch : Select list all /////////////////////////////////////////////////
    function contact_us_save($type)
    {
        if ($type) {
            
            if ($type == 'organizer') $this->db->set('contact_type', (int)1);
            else $this->db->set('contact_type', (int)2);
            
            $this->db->set('contact_name', strip_tags(trim($_POST['name'])));
            $this->db->set('contact_email', strip_tags(trim($_POST['email'])));
            $this->db->set('contact_website', strip_tags(trim($_POST['website'])));
            $this->db->set('contact_tel', strip_tags(trim($_POST['tel'])));
            $this->db->set('contact_desc', nl2br(trim($_POST['desc'])));
            $this->db->set('contact_status', (int)1);

            $this->db->set('add_date', 'NOW()', FALSE);
            $this->db->insert(TB_CONTACT_US);

            /* -- Return -- */
            return $this->db->insert_id();
        }
    }  
    
}
/* End of file contact_us_model.php */
/* Location: ./application/models/user/contact_us_model.php */