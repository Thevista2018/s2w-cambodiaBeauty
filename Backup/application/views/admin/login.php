<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <title><?=TITLE_ADMIN?></title>
        
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robot" content="noindex, nofollow" />
    
    <!-- CSS -->
    <link href="<?=BASE_HREF;?>css/admin/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="login_box">
        <form name="frm_login" action="" method="post">
            <div id="input_box_user">
                <input type="text" name="login_user" id="login_user" class="txt" value="" />
            </div><!-- ปิด #input_box_user -->

            <div id="input_box_pass">
                <input type="password" name="login_pass" id="login_pass" class="txt" value="" />
            </div><!-- ปิด #input_box_pass -->
            
            <input id="button_login" type="image" src="<?=BASE_HREF;?>images/admin/button_login.gif" value="submit" />
        </form>
    </div><!-- ปิด #login_box -->

</body>
</html>