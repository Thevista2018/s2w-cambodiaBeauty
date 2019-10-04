<?php

class Resize_lib 
{

    ///////////////////////////////////////////////// Resize /////////////////////////////////////////////////
    function resize($image, $new_path=null, $new_filename=null, $new_width=null, $new_height=null, $quality=75)
    {
        if (empty($new_path)) return;
        if (empty($new_filename)) return;
        $info = getimagesize($image);
        
        switch ($info[2])
        {
            case IMAGETYPE_JPEG:
            case IMAGETYPE_JPEG2000:
                $extension='.jpg';
                $resource = @imagecreatefromjpeg($image);
                break;
            case IMAGETYPE_PNG:
                $extension='.png';
                $resource = imagecreatefrompng($image);
                break;
            case IMAGETYPE_GIF:
                $extension='.gif';
                $resource = imagecreatefromgif($image);
                break;
            
            default:
                return FALSE;
        }
        
        $new_filename .= $extension;
        list($width_org, $height_org) = $info;
        
        if (empty($new_width)) 
            $new_width = $width_org;
        
        if (empty($new_height)) {
            $new_height = $height_org * $new_width / $width_org;
            $x = 0;
            $y = 0;
            $width = $width_org;
            $height = $height_org;
        } else {
            if ($width_org>$height_org) {
                $y = 0;
                $x = 0;
                $height = $height_org;
                $width = $new_width * $height_org / $new_height;
            } else {
                $x = 0;
                $y = 0;
                $width = $width_org;
                $height = $new_height * $width_org / $new_width;
            }
            if ($height>$height_org) {
                $height = $height_org;
                $width = $new_width * $height_org / $new_height;
            } elseif ($width>$width_org) {
                $width = $width_org;
                $height = $new_height * $width_org / $new_width;
            } else {
            }
        }
        
        $output = imagecreateTRUEcolor($new_width, $new_height);
        
        imagealphablending($output, FALSE);
        imagesavealpha($output, TRUE); 
        imagealphablending($resource, TRUE);        
        imagecopyresampled($output, $resource, 0, 0, $x, $y, $new_width, $new_height, $width, $height);

            switch ($info[2]) {
                case IMAGETYPE_JPEG:
                case IMAGETYPE_JPEG2000:
                    $a = imagejpeg($output, $new_path.$new_filename, $quality);
                    break;
                case IMAGETYPE_PNG:
                    $a = imagepng($output, $new_path.$new_filename, 9);
                    break;
                case IMAGETYPE_GIF:
                    $a = imagegif($output, $new_path.$new_filename);
                    break;
                
                default:
                    return FALSE;
            }
            
        imagedestroy($output);
        imagedestroy($resource);
        
        return $new_filename;
    }    

}

/* End of file resize_lib.php */
/* Location: ./application/libraries/resize_lib.php */
