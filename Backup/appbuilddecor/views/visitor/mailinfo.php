<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Registration</title>
</head>

<body>
  <?PHP
    if(count($result) != 0){
      foreach ($result as $col) {
        $title = $col->visitor_title;
        $firstname = $col->visitor_firstname;
        $lastname = $col->visitor_lastname;
        $jobtitle = $col->visitor_jobtitle;
        $company = $col->visitor_company;
        $address = $col->visitor_address;
        $postcode = $col->visitor_postcode;
        $country = $col->visitor_country;
        $province = $col->visitor_province;
        $phone1 = $col->visitor_phone1;
        $phone2 = $col->visitor_phone2;
        $phone3 = $col->visitor_phone3;
        $fax1 = $col->visitor_fax1;
        $fax2 = $col->visitor_fax2;
        $fax3 = $col->visitor_fax3;
        $mobile1 = $col->visitor_mobile1;
        $mobile2 = $col->visitor_mobile2;
        $mobile3 = $col->visitor_mobile3;
        $email = $col->visitor_email;
        $web = $col->visitor_web;
        $question1 = $col->visitor_question1;
        $text2 = $col->visitor_text2;
        $question2 = $col->visitor_question2;
        $question3 = $col->visitor_question3;
        $text3 = $col->visitor_text3;
        $question4 = $col->visitor_question4;
        $text4 = $col->visitor_text4;
        $question5 = $col->visitor_question5;
        $question6 = $col->visitor_question6;
        $question7 = $col->visitor_question7;
        $text7 = $col->visitor_text7;
        $question8 = $col->visitor_question8;
        $text8 = $col->visitor_text8;

      }
    }
    function answer_show($Answer_one,$question,$txt = ""){
      $answer = "";
      foreach ($Answer_one as $k => $v) {
        $a = explode(",",$question);
        if(count($a) != 0){
          foreach ($a as $ke => $val) {
            if(!empty($txt)){
              $answer.= $txt.",";
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
  ?>
  <div style="width: 750px; padding:20px;">
    <div style="text-align: center;">
      <img src="<?=site_url('assets/canvas/images/logo.png');?>" alt=""><br />
      <h2 style="margin: 0px;">4-6 October 2018</h2><br />
      <h3 style="margin: 0px;">Myanmar Event Park (MEP) at Mindama | Yangon, Myanmar</h3><br />
    </div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block;">
          <label style="display: inline-block; width:80px; float: left;"><b>Name:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:655px; padding-left:15px;">
            <?=$title?> <?=$firstname?> <?=$lastname?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block; width:375px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Position:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:280px; padding-left:15px;">
            <?=$jobtitle;?>
          </div>
        </div>
        <div style="display: inline-block; width:375px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Company:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:280px; padding-left:15px;">
            <?=$company?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block;">
          <label style="display: inline-block; width:80px; float: left;"><b>Address:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:655px; padding-left:15px;">
            <?=$address?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block; width:375px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>City:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:280px; padding-left:15px;">
            <?=$province?>
          </div>
        </div>
        <div style="display: inline-block; width:375px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Country:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:280px; padding-left:15px;">
            <?=$country?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block; width:750px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Zip Code:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:655px; padding-left:15px;">
            <?=$postcode?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block; width:250px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Tel:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:155px; padding-left:15px;">
            <?=$phone1.'-'.$phone2.'-'.$phone3?>
          </div>
        </div>
        <div style="display: inline-block; width:250px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Fax:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:155px; padding-left:15px;">
            <?=$fax1.'-'.$fax2.'-'.$fax3?>
          </div>
        </div>
        <div style="display: inline-block; width:250px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Mobile:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:155px; padding-left:15px;">
            <?=$mobile1.'-'.$mobile1.'-'.$mobile1?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <div style="margin-top: 15px;">
        <div style="display: inline-block; width:375px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Email:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:280px; padding-left:15px;">
            <?=$email?>
          </div>
        </div>
        <div style="display: inline-block; width:375px; float: left;">
          <label style="display: inline-block; width:80px; float: left;"><b>Website:</b></label>
          <div style="display: inline-block; border-bottom: 1px dashed #333; width:280px; padding-left:15px;">
            <?=$web?>
          </div>
        </div>
      </div>
      <div style="clear: both;"></div>
      <hr />
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
                        $answer = answer_show($value['Answer'],$question1);
                      }else if($value['Id'] == 2){
                        $answer = answer_show($value['Answer'],$question2,$text2);
                      }else if($value['Id'] == 3){
                        $answer = answer_show($value['Answer'],$question3,$text3);
                      }else if($value['Id'] == 4){
                        $answer = answer_show($value['Answer'],$question4,$text4);
                      }else if($value['Id'] == 5){
                        $answer = answer_show($value['Answer'],$question5);
                      }else if($value['Id'] == 6){
                        $answer = answer_show($value['Answer'],$question6);
                      }else if($value['Id'] == 7){
                        $answer = answer_show($value['Answer'],$question7,$text7);
                      }else if($value['Id'] == 8){
                        $answer = answer_show($value['Answer'],$question8,$text8);
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
    </div>


  </div>
</body>

</html>
