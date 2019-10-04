<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="<?=base_url('assets/canvas/css/bootstrap.css');?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/canvas/style.min.css');?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/canvas/css/dark.css');?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/canvas/css/font-icons.css');?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/canvas/css/animate.css');?>" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/canvas/css/magnific-popup.css');?>" type="text/css" />

    <link rel="stylesheet" href="<?=base_url('assets/canvas/css/responsive.css');?>" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
    	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <title>Visitor Registration</title>

    <style type="text/css">
      body{
        margin: 0px;
      }
      .formBox{
        max-width: 800px;
        width: 100%;
        margin: 0 auto;
        border-left: 3px solid #CCC;
        border-right: 3px solid #CCC;
        padding: 20px 35px;
      }
      .sm-form-control{
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
      }
      .form-horizontal .control-label{
        text-align: left;
      }
      label{
        text-transform: initial;
      }
      .mark{
        color: #B50000;
        font-size: 13px;
      }
      .required-mark{
        color: #B50000;
        font-size: 13px;

      }
    </style>

</head>

<body>
  <header id="header" class="full-header" style="display:none;">

    <div id="header-wrap">


    </div>

  </header><!-- #header end -->
  <section id="content">

      <div class="content-wrap notoppadding nobottompadding">

          <div class="container clearfix">
            <div class="formBox">
              <div class="row">
                <div class="col-sm-12 text-center">
                  <img src="<?=base_url('assets/canvas/images/logo-regis.png');?>" alt="" style="display: inline-block;">
                </div>
              </div>
              <div class="text-center" style="min-height: 500px; padding-top: 50px;">
                <h2>Registered successfully.</h2>
                <div class="col-sm-12 text-center">
                  <a href="<?=site_url('home');?>">
                    <button type="button" name="button" class="button button-large button-rounded">Go to homepage</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>

  <!-- External JavaScripts
  ============================================= -->
  <script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/jquery.js');?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/plugins.min.js');?>"></script>

  <!-- Footer Scripts
  ============================================= -->
  <script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/functions.min.js');?>"></script>


</body>

</html>
