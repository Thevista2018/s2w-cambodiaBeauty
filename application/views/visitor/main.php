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
    <!-- Radio Checkbox Plugin -->
  	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/radio-checkbox.css');?>" type="text/css" />

    <!-- easyAutocomplete -->
    <link href="<?=base_url('assets/canvas/easyautocomplete/easy-autocomplete.css');?>" rel="stylesheet">


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
      .btn-language{
        list-style: none;
        float: right;
      }
      .btn-language li{
        cursor: pointer;
        width: 42px;
        float: left;
        display: inline-block;
        padding: 5px;
        margin-right: 10px;
      }
      .btn-language li:hover{
        background-color: #CCC;
        border-radius: 3px;
      }
      .btn-language li.active{
        background-color: #CCC;
        border-radius: 3px;
      }
      .btn-language:after {
        content: "";
        display: table;
        clear: both;
      }
      .checkbox-style:checked + .checkbox-style-1-label:before{
        background: #f7941d !important;
      }
      @media (max-width: 479px) {
        .container{
          width: 95% !important;
          padding-left: 0px;
          padding-right: 0px;
        }
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
                <div class="col-sm-6">
                  <img src="<?=base_url('assets/canvas/images/logo.png');?>" alt="" style="display: inline-block; max-height: 150px;">
                </div>
                <div class="col-sm-6">
                  <img src="<?=base_url('assets/canvas/images/logo-regis-date.jpg');?>" alt="" style="display: inline-block;">
                </div>
              </div>
              <form action="<?=site_url('visitoregis/createvisitor');?>" method="post" enctype="multipart/form-data" name="form" id="formVisitor" class="form-horizontal">

                <div class="row">
                  <div class="col-sm-12 text-right mark">
                  Please complete the form in English (one form/ person only)
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label">Title: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_title" name="Text_title" placeholder="Title" class="sm-form-control required">
                    </div>
                    <div class="col-sm-5">
                      <label class="control-label">Firstname: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_firstname" name="Text_firstname" placeholder="Firstname" class="sm-form-control required">
                    </div>
                    <div class="col-sm-5">
                      <label class="control-label">Lastname: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_lastname" name="Text_lastname" placeholder="Lastname" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">Position: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_jobtitle" name="Text_jobtitle" placeholder="Position" class="sm-form-control required">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Company: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_company" name="Text_company" placeholder="Company" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="control-label">Address: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_address" name="Text_address" placeholder="Address" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">City: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_province" name="Text_province" placeholder="City" class="sm-form-control required">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Country: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_country" name="Text_country" placeholder="Country" class="sm-form-control required easyautocomplete" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)" data-url="<?=site_url('visitoregis/jsoncountries');?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="control-label">Zip Code: <small class="required-mark">*</small> </label>
                      <input type="text" id="Text_postcode" name="Text_postcode" placeholder="Zip Code" class="sm-form-control required">
                      <small> If no zip code, please put dash sign (-)</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Tel: <small class="required-mark">*</small></label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_phone1" name="Text_phone1" style="padding-left:0px; padding-right:0px;" placeholder="66" class="sm-form-control required">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_phone2" name="Text_phone2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" class="sm-form-control">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_phone3" name="Text_phone3" style="padding-left:0px; padding-right:0px;" placeholder="Number" class="sm-form-control required">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Fax:</label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_fax1" name="Text_fax1" style="padding-left:0px; padding-right:0px;" placeholder="66" class="sm-form-control">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_fax2" name="Text_fax2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" class="sm-form-control">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_fax3" name="Text_fax3" style="padding-left:0px; padding-right:0px;" placeholder="Number" class="sm-form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Mobile:</label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_mobile1" name="Text_mobile1" style="padding-left:0px; padding-right:0px;" placeholder="66" class="sm-form-control">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_mobile2" name="Text_mobile2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" class="sm-form-control">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_mobile3" name="Text_mobile3" style="padding-left:0px; padding-right:0px;" placeholder="Number" class="sm-form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">Email: <small class="required-mark">*</small></label>
                      <input type="email" id="Text_email" name="Text_email" class="sm-form-control required" placeholder="Email">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Website:</label>
                      <input type="text" id="Text_web" name="Text_web" class="sm-form-control" placeholder="http://">
                    </div>
                  </div>
                  <div class="divider divider-border divider-center"><i class="icon-pencil"></i></div>
                  <!-- <div class="form-group">
                    <div class="col-sm-12">
                    <ul class="btn-language">
                      <li onclick="switchlng('cam');" id="btn-cam"><img src="<?=base_url('assets/images/Cambodia.png');?>" alt=""></li>
                      <li onclick="switchlng('eng');" id="btn-eng"class="active"><img src="<?=base_url('assets/images/United-Kingdom.png');?>" alt=""></li>
                    </ul>
                    </div>
                  </div> -->
                  <label id="Question_4[]-error" class="error" for="Question_4[]" style="display: none;"></label>
                  <label id="Question_7[]-error" class="error" for="Question_7[]" style="display: none;"></label>
                  <label id="Question_8[]-error" class="error" for="Question_8[]" style="display: none;"></label>
                  <?PHP if(count($question) != 0){$i=1;?>
                    <?PHP foreach ($question as $key => $value) {?>
                      <?PHP if($value['Type'] == "CheckBox"){?>

                        <div class="form-group">
                          <div class="col-sm-12">
                            <label class="control-label lg-eng"><?=$value['Question'];?> <small class="required-mark">*</small></label>
                          </div>
                          <?PHP foreach ($value['Answer'] as $k => $v) {?>
                          <div class="col-sm-6">
        										<input id="Question_<?=$value['Id'];?>_<?=$k;?>" class="checkbox-style <?PHP if($k==1){echo 'required';}?>" name="Question_<?=$value['Id'];?>[]" type="checkbox" value="<?=$k;?>">
        										<label for="Question_<?=$value['Id'];?>_<?=$k;?>" class="checkbox-style-1-label">
                              <?PHP if($k === '2_6' ||  $k === '4_9' || $k === '5_6' || $k === '7_9' || $k === '6_8'){?>
                                <input type="text" id="Text_<?=$value['Id'];?>" style="display: inline-block; width: 80%;" name="Text_<?=$value['Id'];?>" placeholder="<?=$v;?>" class="sm-form-control lg-eng Text_<?=$value['Id'];?>">
                              <?PHP }else{ ?>
                                <span class="lg-eng"><?=$v;?></span>
                              <?PHP }?>

                            </label>

        									</div>
                          <?PHP }?>
                        </div>

                      <?PHP }else if($value['Type'] == "SelectBox"){?>

                      <div class="form-group">
                        <div class="col-sm-12">
                          <label class="control-label lg-eng"><?=$value['Question'];?>: <small class="required-mark">*</small></label>
                          <div class="lg-eng">
                            <select name="Question_<?=$value['Id'];?>" id="Question_<?=$value['Id'];?>" class="sm-form-control funspecify required" data-id="<?=$value['Id'];?>" style="height: 40px;">
          										<option value="">-- Please select --</option>
                              <?PHP foreach ($value['Answer'] as $k => $v) {?>
          										<option value="<?=$k?>"><?=$v?></option>
                              <?PHP }?>
          									</select>
                            <input type="text" id="Text_<?=$value['Id'];?>" name="Text_<?=$value['Id'];?>" style="display:none;" placeholder="Please specify" class="sm-form-control Text_<?=$value['Id'];?>">
                          </div>

                        </div>
                      </div>

                      <?PHP }?>

                    <?PHP }?>
                  <?PHP }?>

                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                      <button type="submit" name="button" class="button button-large button-rounded">Register</button>
                    </div>
                  </div>

                </div>
              </form>
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

  <script src="<?=base_url('assets/canvas/easyautocomplete/jquery.easy-autocomplete.js');?>"></script>

  <script type="text/javascript">
    $( document ).ready(function() {
      var options = {
          url: function(phrase) {
              var curl = $('.easyautocomplete').attr('data-url');
              console.log(curl);
              return curl;
          },
          getValue: function(element) {
            return element.country_name;
          },
          ajaxSettings: {
              dataType: "json",
              method: "POST",
              data: {
                  dataType: "json"
              }
          },
          preparePostData: function(data) {
              data.country_name = $(".easyautocomplete").val();
              console.log(data);
              return data;
          },
          requestDelay: 400
      };

      $(".easyautocomplete").easyAutocomplete(options);

        $('#formVisitor').validate();
        funspecify();
        $('.lg-cam').hide();
    });

    function switchlng(v){
      if(v == 'cam'){
        $('#btn-cam').addClass('active');
        $('#btn-eng').removeClass('active');
        $('.lg-eng').hide();
        $('.lg-cam').show();
      }else if(v == 'eng'){
        $('#btn-cam').removeClass('active');
        $('#btn-eng').addClass('active');
        $('.lg-eng').show();
        $('.lg-cam').hide();
      }
    }

    function funspecify(){
      $('.funspecify').change(function(){
        var v = $(this).val();
        var id = $(this).attr('data-id');
        if(v == '01_10'){
          $('.Text_1').show();
        }else if(v == '02_6'){
          $('.Text_2').show();
        }else if(v == '03_10'){
          $('.Text_3').show();
        }else if(v == '04_9'){
          $('.Text_4').show();
        }else if(v == '05_6'){
          $('.Text_5').show();
        }
      });
    }

  </script>
</body>

</html>
