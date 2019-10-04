<?PHP
  if(count($listdata) != 0){

    foreach ($listdata as $key => $value) {
      $Id = $value['visitor_id'];
      $title = $value['visitor_title'];
      $firstname = $value['visitor_firstname'];
      $lastname = $value['visitor_lastname'];
      $jobtitle = $value['visitor_jobtitle'];
      $company = $value['visitor_company'];
      $address = $value['visitor_address'];
      $postcode = $value['visitor_postcode'];
      $country = $value['visitor_country'];
      $province = $value['visitor_province'];
      $phone1 = $value['visitor_phone1'];
      $phone2 = $value['visitor_phone2'];
      $phone3 = $value['visitor_phone3'];
      $fax1 = $value['visitor_fax1'];
      $fax2 = $value['visitor_fax2'];
      $fax3 = $value['visitor_fax3'];
      $mobile1 = $value['visitor_mobile1'];
      $mobile2 = $value['visitor_mobile2'];
      $mobile3 = $value['visitor_mobile3'];
      $email = $value['visitor_email'];
      $web = $value['visitor_web'];
      $question1 = $value['visitor_question1'];
      $text1 = $value['visitor_text1'];
      $question2 = $value['visitor_question2'];
      $text2 = $value['visitor_text2'];
      $question3 = $value['visitor_question3'];
      $text3 = $value['visitor_text3'];
      $question4 = $value['visitor_question4'];
      $text4 = $value['visitor_text4'];
      $question5 = $value['visitor_question5'];
      $text5 = $value['visitor_text5'];
      
    }

  }

  function answer_show($Answer_one,$question,$txt = ""){
    $answer = "";
    foreach ($Answer_one as $k => $v) {
      
      $a = explode(",",$question);

      if(count($a) != 0){
        foreach ($a as $ke => $val) {

          if(!empty($txt)){
            if($k == $val){
              $answer.= $txt.",";
            }
          }else{
            if($k == $val){
              $answer.= $v.",";
            }
          }

        }
      }

    }
    return rtrim($answer,",");
  }


    // function answer_show($Answer_one,$question,$txt = ""){
  //   $answer = "";
  //   foreach ($Answer_one as $k => $v) {
  //     $a = explode(",",$question);
  //     if(count($a) != 0){
  //       foreach ($a as $ke => $val) {
  //         if(!empty($txt)){
  //           $answer.= $txt.",";
  //         }else{
  //           if($k == $val){
  //             $answer.= $v.",";
  //           }
  //         }
  //       }
  //     }
  //   }
  //   return rtrim($answer,",");
  // }
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
      <h2>Detail Visitor</h2>
      <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="<?=site_url('preregis/index');?>">List Visitor</a></li>
          <li class="active"><strong>Detail Visitor</strong></li>
      </ol>
  </div>
  <div class="col-lg-2"></div>
</div>
<!-- End breadcrumb for page -->

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-content">
              <div class="panel-body">

              <!-- Contents for page -->
              <form action="<?=site_url('preregis/updateData');?>" method="post" enctype="multipart/form-data" name="formVisitor" id="formVisitor" class="form-horizontal">

                <input type="hidden" name="formCrfvisitor" id="formCrfvisitor" value="<?=$formCrfvisitor;?>">
                <input type="hidden" name="Id" id="Id" value="<?=$Id?>">

                <div class="row">
                  <div class="col-sm-12 text-right mark">
                    Please fill out your details below in English. All data fields preceded by a * sign are required
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label">Title: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_title" name="Text_title" placeholder="Title" class="form-control required" value="<?=$title?>">
                    </div>
                    <div class="col-sm-5">
                      <label class="control-label">Firstname: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_firstname" name="Text_firstname" placeholder="Firstname" class="form-control required" value="<?=$firstname?>">
                    </div>
                    <div class="col-sm-5">
                      <label class="control-label">Lastname: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_lastname" name="Text_lastname" placeholder="Lastname" class="form-control required" value="<?=$lastname?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">Position: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_jobtitle" name="Text_jobtitle" placeholder="Position" class="form-control required" value="<?=$jobtitle?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Company: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_company" name="Text_company" placeholder="Company" class="form-control required" value="<?=$company?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="control-label">Address: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_address" name="Text_address" placeholder="Address" class="form-control required" value="<?=$address?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">City: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_province" name="Text_province" placeholder="City" class="form-control required" value="<?=$province?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Country: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_country" name="Text_country" placeholder="Country" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)" class="form-control required easyautocomplete" data-url="<?=site_url('visitoregis/jsoncountries');?>" value="<?=$country?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="control-label">Zip Code: <small class="required-mark">*</small> </label>
                      <input type="text" id="Text_postcode" name="Text_postcode" placeholder="Zip Code" class="form-control required" value="<?=$postcode?>">
                      <small> If no zip code, please put dash sign (-)</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Tel: <small class="required-mark">*</small></label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_phone1" name="Text_phone1" style="padding-left:0px; padding-right:0px;" placeholder="66" class="form-control required" value="<?=$phone1?>">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_phone2" name="Text_phone2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" class="form-control" value="<?=$phone2?>">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_phone3" name="Text_phone3" style="padding-left:0px; padding-right:0px;" placeholder="Number" class="form-control required" value="<?=$phone3?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Fax:</label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_fax1" name="Text_fax1" style="padding-left:0px; padding-right:0px;" placeholder="66" class="form-control" value="<?=$fax1?>">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_fax2" name="Text_fax2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" class="form-control" value="<?=$fax2?>">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_fax3" name="Text_fax3" style="padding-left:0px; padding-right:0px;" placeholder="Number" class="form-control" value="<?=$fax3?>">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Mobile:</label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_mobile1" name="Text_mobile1" style="padding-left:0px; padding-right:0px;" placeholder="66" class="form-control" value="<?=$mobile1?>">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_mobile2" name="Text_mobile2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" class="form-control" value="<?=$mobile2?>">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_mobile3" name="Text_mobile3" style="padding-left:0px; padding-right:0px;" placeholder="Number" class="form-control" value="<?=$mobile3?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">Email: <small class="required-mark">*</small></label>
                      <input type="email" id="Text_email" name="Text_email" class="form-control required" placeholder="Email" value="<?=$email?>">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Website:</label>
                      <input type="text" id="Text_web" name="Text_web" class="form-control" placeholder="http://" value="<?=$web?>">
                    </div>
                  </div>
                  <div class="hr-line-dashed"></div>

                  <?PHP if(count($Question) != 0){ ?>

                  <?PHP foreach ($Question as $key => $value) {?>
                    <div style="margin-top: 15px;">
                      <div style="display: inline-block; width:750px; float: left;">
                        <label><b><?=$value['Question']?></b></label>
                        <div style="border-bottom: 1px dashed #333; width:750px; padding-left:15px;">
                          <?PHP
                            if(isset($value['Answer']) and count($value['Answer']) != 0){
                                $answer = "";
                                if($value['Id'] == 1){
                                  $answer = answer_show($value['Answer'],$question1,$text1);
                                }else if($value['Id'] == 2){
                                  $answer = answer_show($value['Answer'],$question2,$text2);
                                }else if($value['Id'] == 3){
                                  $answer = answer_show($value['Answer'],$question3,$text3);
                                }else if($value['Id'] == 4){
                                  $answer = answer_show($value['Answer'],$question4,$text4);
                                }else if($value['Id'] == 5){
                                  $answer = answer_show($value['Answer'],$question5,$text5);
                                }
                                echo $answer;
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div style="clear: both;"></div>
                  <?PHP } ?>
                <?PHP }?>

                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                      <a href="<?=site_url('preregis/index');?>">
                        <button type="button" name="button" class="btn btn-w-m btn-danger">Cancel</button>
                      </a>
                      <button type="submit" name="button" class="btn btn-w-m btn-primary">Save</button>
                    </div>
                  </div>

                </div>
              </form>

              </div>

              <!-- End contents for page -->
          </div>
      </div>
    </div>
</div>
</div>
