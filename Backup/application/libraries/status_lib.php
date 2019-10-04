<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_lib 
{
	
    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    { 
        header ('Content-type: text/html; charset=utf-8');
    }

    ///////////////////////////////////////////////// Pattern : Open /////////////////////////////////////////////////
    function pattern_open($status) 
    {
        if ($status != '' && $status > 0) {
            $img_yes = BASE_HREF.'images/admin/icons/icon_yes.gif';
            $img_no = BASE_HREF.'images/admin/icons/icon_no_grey.gif';
        } else {
            $img_yes = BASE_HREF.'images/admin/icons/icon_yes_grey.gif';
            $img_no = BASE_HREF.'images/admin/icons/icon_no.gif';
        }
        
        /* -- Return -- */
        return array('img_yes'=>$img_yes, 'img_no'=>$img_no);
    }
    
}
/* End of file status_lib.php */
/* Location: ./application/libraries/status_lib.php */