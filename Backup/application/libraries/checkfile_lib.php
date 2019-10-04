<?php

class Checkfile_lib
{
	
    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    { 
        header ('Content-type: text/html; charset=utf-8');
    }

    ///////////////////////////////////////////////// Check /////////////////////////////////////////////////
    function check($fileupload=null, $max_size=1024000, $max_width=null) 
    {
        /* ---------------- File upload : Yes ---------------- */
        if ($fileupload['tmp_name']) {

            $check = getimagesize($fileupload['tmp_name']);
            
            if ($max_width) {
                if ($check[0]>$max_width) {
                    
                    $msg = "ความกว้างของรูปเกินกว่าที่กำหนด";
                    
                    /* ---------------- Return ---------------- */
                    return $msg;
                    exit;
                }
            }
    
            /* --- Image : Yes --- */
            if ($check) {
                $filetype = $check['mime'];
                
                /* --- Type : Not allow --- */
                if (($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/gif") and ($filetype!="image/png")) {
                    $msg = "Image type not allow";
            
                /* --- Size : Not allow --- */
                } elseif ($fileupload['size'] > $max_size) {
                    $msg = "Image size is over maximun";
            
                /* --- Upload : Yes --- */
                } else {
                    $msg = "OK";
                }
        
            /* --- Image : No --- */    
            } else {
                $msg = "File type is not image";
            }
        
        /* ---------------- File upload : No ---------------- */
        } else {
            $msg = "No file upload";
        }
        
        /* ---------------- Return ---------------- */
        return $msg;
    }
    
    ///////////////////////////////////////////////// Check /////////////////////////////////////////////////
    function checkPDF($fileupload=null, $max_size=1024000) 
    {
        /* ---------------- File upload : Yes ---------------- */
        if ($fileupload['tmp_name']) {
            
            /* --- PDF --- */
			
            if ($fileupload['type'] == 'application/pdf' or $fileupload['type'] == 'application/pdf%0d%0acontent-transfer-encoding:' or $fileupload['type'] == 'application/download') {
                if ($fileupload['size'] > $max_size) {
                    $msg = 'ขนาดไฟล์เกินกว่าที่กำหนด';
                } else {
                    $msg = 'OK';
                }
            }

            /* --- Images --- */
            else {
                $check = getimagesize($fileupload['tmp_name']);

                /* --- Image : Yes --- */
                if ($check) {
                    $filetype = $check['mime'];

                    /* --- Type : Not allow --- */
                    if (($filetype!="image/jpg") and ($filetype!="image/jpeg") and ($filetype!="image/gif") and ($filetype!="image/png") ) {
                        $msg =  "Image type not allow";
                    /* --- Size : Not allow --- */
                    } elseif ($fileupload['size'] > $max_size) {
                        $msg = "Image size is over maximun";
                    /* --- Upload : Yes --- */
                    } else {
                        $msg = "OK";
                    }

                /* --- Image : No --- */    
               } else {
                    $msg = "File type is not image";
                }
            }
        
        /* ---------------- File upload : No ---------------- */
        } else {
            $msg = "No file upload";
        }
        
        /* ---------------- Return ---------------- */
        return $msg;
    }
    
}

/* End of file checkfile_lib.php */
/* Location: ./application/libraries/checkfile_lib.php */