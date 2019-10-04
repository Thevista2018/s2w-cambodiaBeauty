<?php

class Admin_lib
{
    var $secure_key = 'xibPPk';       
       
    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        $this->CI = &get_instance();
        
        $this->CI->load->helper('cookie');
        $this->CI->load->database();
        $this->db = $this->CI->db;
        
        /* -- Set header : PHP -- */
        header ('Content-type: text/html; charset=utf-8');
        
        if (!empty($_POST['login_user']) && !empty($_POST['login_pass'])) {
            $this->login($_POST['login_user'], $_POST['login_pass']);
        } else { 
            $this->restore(get_cookie('session_admin'));
        }       
        
        /* -- Return -- */
        return $this;
    }
    
    ///////////////////////////////////////////////// Restore /////////////////////////////////////////////////    
    function restore($key)
    {
        if (!empty($key)) 
            list($secure, $userid) = explode(':', $key);

        if (!empty($secure) && !empty($userid) && $secure==md5($this->secure_key.$userid)) {
            
            $this->db->select('admin_id, admin_user, admin_status');
            $this->db->where('admin_id', $userid);
            $this->db->from(TB_ADMIN);
            $result = $this->db->get()->result_array();
            
            if (!empty($result[0]['admin_id'])) {
                define('ADMIN_ID', $result[0]['admin_id']);
                define('ADMIN_USER', $result[0]['admin_user']);
                define('ADMIN_STATUS', $result[0]['admin_status']);
                
                setcookie('session_admin', $key, time()+86400, '/', '');
                return TRUE;
            }
        }
        
        /* -- Return -- */
        return;
    }

    ///////////////////////////////////////////////// Login /////////////////////////////////////////////////
    function login($e, $p)
    {
        if (!empty($e) && !empty($p)) {

            $this->db->select('admin_id, admin_status');
            $this->db->where('admin_user', $e);
            $this->db->where('admin_pass', $p);
            $this->db->from(TB_ADMIN);
            $result = $this->db->get()->result_array();
            
            /* -- ===== Condition : OK ===== -- */
            if (!empty($result[0]['admin_id']) && $result[0]['admin_status']!=0) {
                $key = md5($this->secure_key.$result[0]['admin_id']).':'.$result[0]['admin_id'];
                setcookie('session_admin', $key, time()+86400, '/', '');
                
                /* -- Redirect -- */
                header('Location: '.BASE_AM_DEFAULT);
                exit;
            } 
            
            /* -- ===== Condition : Banned ===== -- */
            elseif (!empty($result[0]['admin_id']) && $result[0]['admin_status']==0) {
                echo 'Username ของคุณถูกระงับการใช้งาน';
                exit;
            }
            
            /* -- ===== Condition : Error !! ===== -- */
            else {
                echo 'login หรือ password ไม่ถูกต้อง';
                exit;
            }
        }
        
        /* -- Return -- */
        return;
    }

    ///////////////////////////////////////////////// Logout /////////////////////////////////////////////////    
    function logout()
    {
        /* -- Unset : Cookie -- */
        setcookie('session_admin', '', time()+86400, '/', '');
        
        /* -- Redirect -- */
        header('Location: '.BASE_AM);
        exit;
    }
    
    ///////////////////////////////////////////////// Check Login /////////////////////////////////////////////////     
    function is_login()
    {
        /* -- Return -- */
        if (defined('ADMIN_ID')) return ADMIN_ID;
        else return FALSE;
    }

}

/* End of file admin_lib.php */
/* Location: ./application/libraries/admin_lib.php */
