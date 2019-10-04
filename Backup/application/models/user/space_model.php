<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Space_model extends CI_Model 
{

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    ///////////////////////////////////////////////// Branch : Select list all /////////////////////////////////////////////////
    function space_save()
    {
        $this->db->set('firstname', strip_tags(trim($_POST['firstname'])));
        $this->db->set('lastname', strip_tags(trim($_POST['lastname'])));
        $this->db->set('company', strip_tags(trim($_POST['company'])));
        $this->db->set('job', strip_tags(trim($_POST['job'])));
        
        $this->db->set('email', strip_tags(trim($_POST['email'])));
        $this->db->set('address1', strip_tags(trim($_POST['address1'])));
        $this->db->set('address2', strip_tags(trim($_POST['address2'])));
        $this->db->set('city', strip_tags(trim($_POST['city'])));
        $this->db->set('state', strip_tags(trim($_POST['state'])));
        $this->db->set('zip', strip_tags(trim($_POST['zip'])));
        $this->db->set('country', strip_tags(trim($_POST['country'])));
        $this->db->set('tel', strip_tags(trim($_POST['tel'])));
        
        $this->db->set('expected', strip_tags(trim($_POST['expected'])));
        $this->db->set('choice2', json_encode($_POST['choice2']));
        $this->db->set('choice2_info', strip_tags(trim($_POST['choice2_info'])));
        
        $this->db->set('space_status', (int)1);
        $this->db->set('add_date', 'NOW()', FALSE);
        $this->db->insert(TB_SPACE);

        /* -- Return -- */
        return $this->db->insert_id();
    }  
    
}
/* End of file space_model.php */
/* Location: ./application/models/user/space_model.php */