<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_lib 
{
	
    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    { 
        header ('Content-type: text/html; charset=utf-8');
    }

    ///////////////////////////////////////////////// Fill Subfix /////////////////////////////////////////////////
    function fill_pad($number, $n, $prefix) 
    {
        return str_pad((int) $number, $n, $prefix, STR_PAD_LEFT);
    }
    
    ///////////////////////////////////////////////// Check Files Exist /////////////////////////////////////////////////
    function check_file_exist($path, $filename, $replace) 
    {
        $source = $path.$filename;
        
        if (file_exists($source))
            $new_source = $filename;
        else
            $new_source = $replace;
        
        return $new_source;
    }    

    ///////////////////////////////////////////////// Cut word /////////////////////////////////////////////////
    function cut_word($word, $len, $plus)
    {
        if (iconv_strlen($word, "UTF-8")>$len)
            $word_replace = iconv_substr($word, 0, $len, "UTF-8").$plus;
        else
            $word_replace = $word;
        
        return $word_replace;
    }    
    
    ///////////////////////////////////////////////// Thai_time /////////////////////////////////////////////////
    function Thai_time($time) 
    {
        $time2 = strtotime($time);
        $time3 = date('H:i:s', $time2);
        $T = substr($time3, 0, 5)." น.";
        
        return $T;
    }

    ///////////////////////////////////////////////// Thai_date /////////////////////////////////////////////////
    function Thai_date($date) 
    {
        $date2 = date("Y-m-d", strtotime($date));
        $now = date('Y-m-d');

//        if ((strtotime($now) - strtotime($date2))/(60*60*24)==0) {
//            $data = "วันนี้";
//        elseif ((strtotime($now) - strtotime($date2))/(60*60*24)==1)
//            $data = "เมื่อวานนี้";
//        elseif ((strtotime($now) - strtotime($date2))/(60*60*24)==2)
//            $data = "เมื่อ 2 วันที่แล้ว";
//        } else {
            $arr = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย","พ.ค.","มิ.ย.","ก.ค.","ส.ค","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");

            $day = date("d", strtotime($date));
            if ($day <10)
                $day = substr($day,1,1);

            $month = date("m", strtotime($date));
            if ($month<10)
                $month = substr($month,1,1);
            $month = $arr[$month];

            $year = date("Y", strtotime($date))+543;

            $data = $day.' '.$month.' '.$year;
//        }

        return $data;
    }    
    
    ///////////////////////////////////////////////// Convert Embed /////////////////////////////////////////////////
    function convertEmbed($embed) 
    {
        preg_match('/(width=\"[0-9]*\")/', strtolower(str_replace("'", '"', str_replace(" ", "", $embed))), $matches, PREG_OFFSET_CAPTURE);
        $width = str_replace('width="', '', $matches[0][0]);
        settype($width, 'integer');
        
        preg_match('/(height=\"[0-9]*\")/', strtolower(str_replace("'", '"', str_replace(" ", "", $embed))), $matches, PREG_OFFSET_CAPTURE);
        $heighth = str_replace('height="', '', $matches[0][0]);
        settype($heighth, 'integer');
        
        if ($url=='') {
            define('PATTEN_EMBED_VDO2', "/(src=\"http:\/\/|src=\'http:\/\/)([\w\?\=\&\-.\/]*)/");
            preg_match(PATTEN_EMBED_VDO2, $embed, $matches, PREG_OFFSET_CAPTURE);
            $url = 'http://'.$matches[2][0];
        }
        
        $flashvars = "";
        if (eregi('flashvars="', $embed)) {
            $patt = "/(flashvars=\")([\w\?\=\&\-.\/]*)/";
            preg_match($patt, $embed, $matches, PREG_OFFSET_CAPTURE);
            $flashvars = $matches[2][0];
        }
        
        preg_match('@^(?:http://)?([^/]+)@i', $url, $matches);
        preg_match('/[^.]+\.[^.]+$/', $matches[1], $matches);
        $domain = $matches[0];
        
        return array($url, $width, $heighth, $domain, $flashvars);
    }    
    
    ///////////////////////////////////////////////// Cavas Embed /////////////////////////////////////////////////
    function cavasEmbed($width, $height, $new_width) 
    {
        if ($width<=$new_width) {
            $new_width = $width;
            $new_height = $height;
        } else if ($width > $height) {
            $new_height = $height * $new_width / $width;
        } else {
            $new_height = $new_width;
            $new_width = $width * $new_width / $height;
        }
        
        settype($new_width, 'integer');
        settype($new_height, 'integer');
        
        return array($new_width, $new_height);
    }
    
    ///////////////////////////////////////////////// ลบ Array บางตัว /////////////////////////////////////////////////
    function delete_some_array($old_array, $delete_array) 
    {
//        $new_array = array_diff($old_array, $delete_array);
//        $new_array = array_values($new_array);
        
        foreach ($delete_array as $position) {
            unset($old_array[$position]);
        }
        
        if (count($old_array)==0) $new_array = "";
        else $new_array = array_values($old_array);
        
        return $new_array;
    }    
    
    ///////////////////////////////////////////////// Create Folder /////////////////////////////////////////////////
    function create_folder($path, $folder) 
    {
        $makeFolder = $path.'/'.$folder;
        $old = umask(0);
        mkdir($makeFolder, 0777);
        umask($old);
    }    
    
    ///////////////////////////////////////////////// Delete Folder /////////////////////////////////////////////////
    function del_folder($path_del) 
    {    
        $dir = opendir($path_del); 
        
        while (($data = readdir($dir))!==false) { 
            
            if ($data=="others") {
                $dir_sub = opendir($path_del.'/'.$data); 
                while (($data_sub = readdir($dir_sub))!==false) { 
            
                    @unlink ($path_del.'/'.$data.'/'.$data_sub); 
                }
                
                closedir($dir_sub); 

                rmdir ($path_del.'/'.$data); 
            }
            
            @unlink ($path_del.'/'.$data); 
        } 
        
        closedir($dir); 

        rmdir ($path_del);  
    }
    
    ///////////////////////////////////////////////// Delete Pic /////////////////////////////////////////////////
    function del_pic($path_del, $filename) 
    {    
        $dir = opendir($path_del); 
        @unlink ($path_del."/".$filename); 
        closedir($dir); 
    }
    
    ///////////////////////////////////////////////// HTML Refresh /////////////////////////////////////////////////
    function HTML_Refresh($url, $time=0) 
    {
        echo '<meta http-equiv="refresh" content="'.$time.';URL='.$url.'">';
    }
    
    ///////////////////////////////////////////////// Rows - Run NO. /////////////////////////////////////////////////
    function row_runNO($page, $per_row=10) 
    {
        if (empty($page)) $page = 1;
        else $page = $page;

        if ($page!=1) $run = (($page-1)*$per_row)+1;
        else $run = 1;
        
        /* -- Return -- */
        return $run; 
    }          
    
    ///////////////////////////////////////////////// Rows - Run NO. Inverse /////////////////////////////////////////////////
    function row_runNO_inverse($page, $total, $per_page=10) 
    {
        if (empty($page)) $page = 1;
        else $page = $page;

        if ($page!=1) $run = $total-($per_page*($page-1));
        else $run = $total;
        
        /* -- Return -- */
        return $run; 
    }          
    
    ///////////////////////////////////////////////// Random Code /////////////////////////////////////////////////
    function random_code($len) 
    {
        $code = '';
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $num = strlen($chars);
        
        for ($i=0; $i<$len; $i++) {
            $code .= $chars[rand()%$num];
        }
        
        /* -- Return -- */
        return $code; 
    }
    
    ///////////////////////////////////////////////// Get - Thumb path /////////////////////////////////////////////////
    function getPath($id, $filename, $path=null, $default='default.jpg') 
    {
        if (is_file($path.'/'.$filename))
            $thumb = BASE_HREF.$path.'/'.$filename;
        else
            $thumb = BASE_HREF.$path.'/'.$default;
        
        unset($id, $filename);
        
        /* -- Return -- */
        return $thumb;
    }
    
    ///////////////////////////////////////////////// Get - Thumb path /////////////////////////////////////////////////
    function getPathFolder($id, $filename, $path=null, $pad=5, $size=null, $default='default_m.jpg') 
    {
        $folder = 'ID_'.$this->fill_pad($id, $pad, 0);
        
        if ($size)
            $filename = str_replace('middle', $size, $filename);
        
        if (is_file($path.'/'.$folder.'/'.$filename))
            $thumb = BASE_HREF.$path.'/'.$folder.'/'.$filename;
        else
            $thumb = BASE_HREF.$path.'/'.$default;
        
        unset($id, $filename, $size);
        
        /* -- Return -- */
        return $thumb;
    }
    
    ///////////////////////////////////////////////// Set - Desc (No wysiwyg) /////////////////////////////////////////////////
    function setDesc($text, $len, $plus) 
    {
        $desc = $this->cut_word(strip_tags($text), $len, $plus);
        
        /* -- Return -- */
        return $desc;
    }
    
    ///////////////////////////////////////////////// Check : Nav /////////////////////////////////////////////////
    function checkNav($pg)
    {
        if (isset($pg))
            return "<div id='navi'><span>$pg</span></div>";
        else
            return "<div style='margin-bottom:20px;'></div>";
    }
    
    ///////////////////////////////////////////////// Convert : Datetime /////////////////////////////////////////////////
    function convertDate($datetime) 
    {
        if ($datetime=='0000-00-00 00:00:00' || $datetime=='') {
            return '-';
        } else {
            $date = $this->Thai_date($datetime);
            $time = $this->Thai_time($datetime);
            return "{$date} <span class='pipe-date'>|</span> {$time}";
        }
    }
    
    ///////////////////////////////////////////////// Get - Thumb path /////////////////////////////////////////////////
    function getPathAdmin($id, $filename, $path=null, $default='default.jpg')
    {
        if (is_file($path.'/'.$filename))
            $thumb = $path.'/'.$filename;
        else
            $thumb = $path.'/'.$default;
        
        unset($id, $filename);
        
        /* -- Return -- */
        return BASE_HREF.$thumb;
    }
    
    ///////////////////////////////////////////////// Convert : Datetime /////////////////////////////////////////////////
    function setDash($data=null)
    {
        if ($data) return $data;
        else return '-';
    }
    
}
/* End of file f_lib.php */
/* Location: ./application/libraries/f_lib.php */