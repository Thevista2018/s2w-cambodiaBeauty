<?php

class pager_lib
{

    function page_css($rpp, $count, $href, $page=1, $jax=false)
    {
        /////////// Set default page=1 ///////////
        if ($page<1) 
            $page = 1;

        /////////// Set default variables ///////////
        $path = base_url();
        $total_page = ceil($count/$rpp);
        $pager = "";
        $page_next = "";
        
        /////////// Total page == 1 : Return Blank ///////////
        if ($total_page==1) {
            $pagertop = null;
            
        /////////// Total page != 1 : Return Div (Page Navigation) ///////////
        } else {
        
            /////////// Set back.gif ///////////
            if ($page>1) {
                if ($jax) 
                    $page_prev = "<a href=\"#\" onclick=\"".$href."('".($page-1)."');return false;\" class=\"page1\"><img src=\"{$path}images/back.gif\" /></a>";
                else 
                    $page_prev = "<a href='#' onclick='".$href."(".($page-1)."); return false; class='page1'><img src=\"{$path}images/back.gif\" /></a>";
            }

            /////////// Set next.gif ///////////
            if ($page<$total_page && $total_page>1) {
                if ($jax) 
                    $page_next = "<a href=\"#\" onclick=\"".$href."('".($page+1)."');return false;\" class=\"page1\"><img src=\"{$path}images/next.gif\" /></a>";
                else 
                    $page_next = "<a href='#' onclick='".$href."(".($page+1)."); return false; class='page1'><img src=\"{$path}images/back.gif\" /></a>";
            }                   

            if ($count) {
                $pagerarr = array();
                $dotted = 0;
                $dotspace = 3;
                $dotend = $total_page - $dotspace;
                $curdotend = $page - $dotspace;
                $curdotstart = $page + $dotspace;

                for ($i=1; $i<=$total_page; $i++) {
                    if (($i>$dotspace && $i<=$curdotend) || ($i>=$curdotstart && $i<=$dotend)) {
                        if (!$dotted) 
                            $pagerarr[] = "<li id='pipe'>|</li>";
                        $dotted = 1;
                        continue;
                    }

                    $dotted = 0;
                    $start = ($i * $rpp) + 1;
                    $end = ($start + $rpp) - 1;

                    if ($end>$count) 
                        $end = $count;
                    // $text = "$start&nbsp;-&nbsp;$end";

                    if ($i != $page) {
                        if ($jax) 
                            $pagerarr[] = "<li><a href='#' onclick=\"".$href."('$i');return false;\">$i</a></li>";
                        else 
                            $pagerarr[] = "<li><a href='{$href}$i'>$i</a></li>";
                    } else { 
                        $pagerarr[] = "<li class='here'>$i</li>";
                    }
                }

                $pagerstr = join(" ", $pagerarr);

                if ($page>1) {
                    $to = $rpp * $page;
                    $t =  $page * 2;

                    if ($to>$count) 
                        $to = $count;

                    $t = (($page-1) * $rpp) + 1;
                } else {
                    $to = $rpp;
                    $t = $page;

                    if ($count<$to) 
                        $to = $count;
                }

                //$show = "<span align=\"left\">Showing <b> $t </b>to <b>$to</b> of <b>$count</b>  </span>";
                $pagertop = "<ul>$pagerstr</ul>";

            } else {
                $pagertop = "<div class='page' align='left'>$page_prev &nbsp; $pager &nbsp; $page_next</div><div class='clear'></div>";
            }
        }
        
//        $start = ($page-1) * $rpp;
        //return array($pagertop, "LIMIT $start,$rpp",$show);
        return array($pagertop, $rpp, (($page-1)*$rpp), $page);   
    }

}

/* End of file pager_lib.php */
/* Location: ./application/libraries/pager_lib.php */