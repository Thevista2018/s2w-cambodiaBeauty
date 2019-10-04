<!-- Radio Checkbox Plugin -->
<link rel="stylesheet" href="<?=BASE_HREF; ?>assets/css/radio-checkbox.css" type="text/css" />
  <style type="text/css">
  .formBox{
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
    border: 3px solid #CCC;
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
    .form-group{
      height: 70px;
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
        <section id="page-title" class="page-title-mini">
            <div class="container clearfix">
                <h1>Update Visitor</h1>
                <ol class="breadcrumb">
                	<li><a href="<?=BASE_HREF?>myanmin/visitoregis/visitorgismanage">Visitor Management</a></li>
                    <li class="active">Update Visitor</li>
                </ol>
            </div>
        </section>

        <section id="content">
            <div class="content-wrap">
				<div class="container clearfix">
          <div class="formBox">
                <? foreach($result as $col){ ?>
            	  <form action="<?=BASE_HREF?>myanmin/visitoregis/updatevisitoregissave" method="post" role="form" enctype="multipart/form-data" id="form">
                <input type="hidden" id="Id" name="Id" value="<?=$col->visitor_id;?>">
                <div class="row">
                  <div class="text-center">
                    <h3>Info Visitor</h3>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label">Title: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_title" name="Text_title" placeholder="Title" value="<?=$col->visitor_title;?>" class="sm-form-control required">
                    </div>
                    <div class="col-sm-5">
                      <label class="control-label">Firstname: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_firstname" name="Text_firstname" placeholder="Firstname" value="<?=$col->visitor_firstname;?>" class="sm-form-control required">
                    </div>
                    <div class="col-sm-5">
                      <label class="control-label">Lastname: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_lastname" name="Text_lastname" placeholder="Lastname" value="<?=$col->visitor_lastname;?>" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">Position: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_jobtitle" name="Text_jobtitle" placeholder="Position" value="<?=$col->visitor_jobtitle;?>" class="sm-form-control required">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Company: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_company" name="Text_company" placeholder="Company" value="<?=$col->visitor_company;?>" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="control-label">Address: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_address" name="Text_address" placeholder="Address" value="<?=$col->visitor_address;?>" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">City: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_province" name="Text_province" placeholder="City" value="<?=$col->visitor_province;?>" class="sm-form-control required">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Country: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_country" name="Text_country" placeholder="Country" value="<?=$col->visitor_country;?>" class="sm-form-control required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label class="control-label">Zip Code: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_postcode" name="Text_postcode" placeholder="Zip Code" value="<?=$col->visitor_postcode;?>" class="sm-form-control required">
                      <small> If no zip code, please put dash sign (-)</small>
                    </div>
                    <!-- <div class="col-sm-6">
                      <label class="control-label">Nationality: <small class="required-mark">*</small></label>
                      <input type="text" id="Text_nationality" name="Text_nationality" placeholder="Nationality" value="<?=$col->visitor_nationality;?>" class="sm-form-control required">
                    </div> -->

                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <div class="col-sm-12" style="padding: 0px;">
                        <label class="control-label">Phone: <small class="required-mark">*</small></label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_phone1" name="Text_phone1" style="padding-left:0px; padding-right:0px;" value="<?=$col->visitor_phone1;?>" placeholder="66" class="sm-form-control required">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_phone2" name="Text_phone2" style="padding-left:0px; padding-right:0px;" value="<?=$col->visitor_phone2;?>" placeholder="Area Code" class="sm-form-control">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_phone3" name="Text_phone3" style="padding-left:0px; padding-right:0px;" value="<?=$col->visitor_phone3;?>" placeholder="Number" class="sm-form-control required">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Fax:</label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_fax1" name="Text_fax1" style="padding-left:0px; padding-right:0px;" placeholder="66" value="<?=$col->visitor_fax1;?>" class="sm-form-control">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_fax2" name="Text_fax2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" value="<?=$col->visitor_fax2;?>" class="sm-form-control">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_fax3" name="Text_fax3" style="padding-left:0px; padding-right:0px;" placeholder="Number" value="<?=$col->visitor_fax3;?>" class="sm-form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-12">
                        <label class="control-label">Mobile:</label>
                      </div>
                      <div class="col-sm-3">
                        <input type="text" id="Text_mobile1" name="Text_mobile1" style="padding-left:0px; padding-right:0px;" placeholder="66" value="<?=$col->visitor_mobile1;?>" class="sm-form-control">
                      </div>
                      <div class="col-sm-4">
                        <input type="text" id="Text_mobile2" name="Text_mobile2" style="padding-left:0px; padding-right:0px;" placeholder="Area Code" value="<?=$col->visitor_mobile2;?>" class="sm-form-control">
                      </div>
                      <div class="col-sm-5">
                        <input type="text" id="Text_mobile3" name="Text_mobile3" style="padding-left:0px; padding-right:0px;" placeholder="Number" value="<?=$col->visitor_mobile3;?>" class="sm-form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label class="control-label">Email: <small class="required-mark">*</small></label>
                      <input type="email" id="Text_email" name="Text_email" class="sm-form-control required" value="<?=$col->visitor_email;?>" placeholder="Email">
                    </div>
                    <div class="col-sm-6">
                      <label class="control-label">Website:</label>
                      <input type="text" id="Text_web" name="Text_web" class="sm-form-control" placeholder="http://" value="<?=$col->visitor_web;?>">
                    </div>
                  </div>
                  <div class="divider divider-border divider-center"><i class="icon-pencil"></i></div>
                  <label id="Question_4[]-error" class="error" for="Question_4[]" style="display: none;"></label>
                  <label id="Question_7[]-error" class="error" for="Question_7[]" style="display: none;"></label>
                  <label id="Question_8[]-error" class="error" for="Question_8[]" style="display: none;"></label>
                  <?PHP
                    $Question_1 = $col->visitor_question1;
                    $Text_1 = $col->visitor_question1_text;
                    $Question_2 = $col->visitor_question2;
                    $Question_3 = $col->visitor_question3;
                    $Text_3 = $col->visitor_question3_text;
                    $Question_4 = $col->visitor_question4;
                    $Text_4 = $col->visitor_question4_text;
                    $Question_5 = $col->visitor_question5;
                    $Question_6 = $col->visitor_question6;
                    $Question_7 = $col->visitor_question7;
                    $Text_7 = $col->visitor_question7_text;
                    $Question_8 = $col->visitor_question8;
                    $Text_8 = $col->visitor_question8_text;
                  ?>
                  <?PHP if(count($question) != 0){$i=1;?>
                    <?PHP foreach ($question as $key => $value) {?>
                      <?PHP if($value['Type'] == "CheckBox"){?>

                        <div class="form-group">
                          <div class="col-sm-12">
                            <label class="control-label"><?=$value['Question'];?> <small class="required-mark">*</small></label>
                          </div>
                          <?PHP foreach ($value['Answer'] as $k => $v) {?>
                          <div class="col-sm-6">
                            <?PHP
                              if($value['Id'] == 4){
                                $QuestionAnswer = explode(",",$Question_4);
                              }else if($value['Id'] == 7){
                                $QuestionAnswer = explode(",",$Question_7);
                              }else if($value['Id'] == 8){
                                $QuestionAnswer = explode(",",$Question_8);
                              }
                            ?>
        										<input id="Question_<?=$value['Id'];?>_<?=$k;?>" class="checkbox-style <?PHP if($k==1){echo 'required';}?>"
                            name="Question_<?=$value['Id'];?>[]" type="checkbox" value="<?=$k;?>" <?PHP if (in_array($k, $QuestionAnswer)) {echo "checked";}?>>
        										<label for="Question_<?=$value['Id'];?>_<?=$k;?>" class="checkbox-style-1-label">
                              <?PHP if($k === '04_18' || $k === '07_09' || $k === '08_06'){?>
                                <?PHP
                                  $Text_specify = "";
                                  if($k === '04_18'){
                                    $Text_specify = $Text_4;
                                  }else if($k === '07_09'){
                                    $Text_specify = $Text_7;
                                  }else if($k === '08_06'){
                                    $Text_specify = $Text_8;
                                  }
                                ?>
                                <input type="text" id="Text_<?=$value['Id'];?>" style="display: inline-block; width: 80%;" value="<?=$Text_specify;?>" name="Text_<?=$value['Id'];?>" placeholder="<?=$v;?>" class="sm-form-control">
                              <?PHP }else{
                                echo $v;
                              }?>
                            </label>
        									</div>
                          <?PHP }?>
                        </div>

                      <?PHP }else if($value['Type'] == "SelectBox"){?>

                      <div class="form-group">
                        <div class="col-sm-12">
                          <?PHP
                            if($value['Id'] == 1){
                              $QuestionAnswer = $Question_1;
                            }else if($value['Id'] == 2){
                              $QuestionAnswer = $Question_2;
                            }else if($value['Id'] == 3){
                              $QuestionAnswer = $Question_3;
                            }else if($value['Id'] == 5){
                              $QuestionAnswer = $Question_5;
                            }else if($value['Id'] == 6){
                              $QuestionAnswer = $Question_6;
                            }
                          ?>
                          <label class="control-label"><?=$value['Question'];?>: <small class="required-mark">*</small></label>
                          <select name="Question_<?=$value['Id'];?>" id="Question_<?=$value['Id'];?>" class="sm-form-control funspecify required" data-id="<?=$value['Id'];?>" style="height: 40px;">
        										<option value="">-- Please select --</option>
                            <?PHP foreach ($value['Answer'] as $k => $v) {?>
        										<option value="<?=$k?>" <? if($QuestionAnswer == $k){echo 'selected';} ?>><?=$v?></option>
                            <?PHP }?>
        									</select>
                          <?PHP
                            $Text_specify = "";
                            if($value['Id'] === 1){
                              $Text_specify = $Text_1;
                            }else if($value['Id'] === 3){
                              $Text_specify = $Text_3;
                            }
                          ?>
                          <input type="text" id="Text_<?=$value['Id'];?>" name="Text_<?=$value['Id'];?>" <?PHP if(empty($Text_specify)){echo 'style="display:none;"';}?> value="<?=$Text_specify;?>" placeholder="Please specify" class="sm-form-control">
                        </div>
                      </div>

                      <?PHP }?>

                    <?PHP }?>
                  <?PHP }?>
                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                      <button type="submit" name="button" class="button button-large button-rounded">Update Data</button>
                    </div>
                  </div>
                </div>
                </form>
                <? } ?>
              </div>
                </div>
            </div>
        </section>

		<script>
			$('#form').validate();
      $('.funspecify').change(function(){
        var v = $(this).val();
        var id = $(this).attr('data-id');
        if(v == '01_10'){
          $('#Text_1').show();
        }else if(v == '03_10'){
          $('#Text_3').show();
        }else if(v == '04_18'){
          $('#Text_4').show();
        }else if(v == '07_09'){
          $('#Text_7').show();
        }else if(v == '08_06'){
          $('#Text_8').show();
        }else{
          $('#Text_'+id).hide();
        }
      });
		</script>
