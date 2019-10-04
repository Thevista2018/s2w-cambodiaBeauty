<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrator Myanmartourismexpo</title>

    <link href="<?=base_url('assets/inspinia/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/inspinia/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

    <link href="<?=base_url('assets/inspinia/css/animate.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/inspinia/css/style.min.css');?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <img src="<?=base_url('assets/inspinia/images/img/logo.png');?>" alt="">

            </div>
            <p>Login in. To administrator.</p>
            <form class="m-t" role="form" method="post" action="<?=site_url('administrator/authen');?>">
                <input type="hidden" name="formcrf" id="formcrf" value="<?=$formcrf;?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <?=$msg;?>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!-- <a href="#"><small>Forgot password?</small></a> -->
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url('assets/inspinia/js/jquery-2.1.1.js');?>"></script>
    <script src="<?=base_url('assets/inspinia/js/bootstrap.min.js');?>"></script>

</body>

</html>
