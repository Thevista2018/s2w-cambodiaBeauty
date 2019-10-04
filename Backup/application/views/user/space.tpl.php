<style>
    .clear-both { clear:both; }
    .text-input { float: left; }
    .input_error {
        font: 11px tahoma;
        float: left;
        margin: 9px 0 0 5px;
        color: red;
    }
    textarea.text-input { margin-bottom: 10px; resize: vertical; }
</style>


<div id="content">
    <div id="content_left">
        <div id="maincontent_contact">
            <div id="contact_form">
                <h1 class="tblue title">Space Booking</h1>
                <p>For booking space please contact Ms.Salela  <br />
                        Email : <a href="mailto:salela@icvex.com">salela@icvex.com</a> or Tel :  +66(0)2 - 713 - 3033 Ext. 870</p>

                        <?php



                        // $emailto = "tanakorn@thevista.co.th";
                        // $subject = "TEST";
                        // $message = "Hello";
                        // $headers = "From: info@myanmarbuilddecor.com" . "\r\n" ."CC: joke_fetus@hotmail.com";

                        // if (mail($emailto, $subject, $message, $headers)){
                        //     echo("...");
                        // }else{
                        //     echo("-");
                        // }

                        ?>
                        
                        
                <!--<p> (* is compulsory fields to key in)</p><br />

                <form method="post" action="" name="space_form" id="space_form">
                    <input type="hidden" name="action" value="save">

                    <fieldset>
                        <label >Firstname *</label><br />
                        <input type="text" name="firstname" id="firstname" class="text-input" placeholder="" value="<?=$data['firstname']?>">
                        <?php if (!empty($error['firstname'])) { ?>
                            <p class="input_error">[<?=$error['firstname']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label >Lastname *</label><br />
                        <input type="text" name="lastname" id="lastname" class="text-input" placeholder="" value="<?=$data['lastname']?>">
                        <?php if (!empty($error['lastname'])) { ?>
                            <p class="input_error">[<?=$error['lastname']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label >What is your company specialty ?</label><br />
                        <input type="text" name="company" id="company" class="text-input" placeholder="" value="<?=$data['company']?>">
                        <?php if (!empty($error['company'])) { ?>
                            <p class="input_error">[<?=$error['company']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label >Job title/Job role</label><br />
                        <input type="text" name="job" id="job" class="text-input" placeholder="" value="<?=$data['job']?>">
                        <?php if (!empty($error['job'])) { ?>
                            <p class="input_error">[<?=$error['job']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <br />

                        <h2 class="tblue title">Contact Information</h2>
                        <label>Email Address *</label><br />
                        <input type="text" name="email" id="email" class="text-input" placeholder="" value="<?=$data['email']?>">
                        <?php if (!empty($error['email'])) { ?>
                            <p class="input_error">[<?=$error['email']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>Confirm Email Address</label><br />
                        <input type="text" name="email_confirm" id="email_confirm" class="text-input" placeholder="" value="<?=$data['email_confirm']?>">
                        <?php if (!empty($error['email_confirm'])) { ?>
                            <p class="input_error">[<?=$error['email_confirm']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>Mailing address 1 *</label><br />
                        <textarea cols="25" rows="8" name="address1" id="address1" class="text-input"><?=$data['address1']?></textarea>
                        <?php if (!empty($error['address1'])) { ?>
                            <p class="input_error">[<?=$error['address1']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>Mailing address 2 </label><br />
                        <textarea cols="25" rows="8" name="address2" id="address2" class="text-input"><?=$data['address2']?></textarea>
                        <?php if (!empty($error['address2'])) { ?>
                            <p class="input_error">[<?=$error['address2']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>City *</label><br />
                        <input type="text" name="city" id="city" class="text-input" placeholder="" value="<?=$data['city']?>">
                        <?php if (!empty($error['city'])) { ?>
                            <p class="input_error">[<?=$error['city']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>State / Province *</label><br />
                        <input type="text" name="state" id="state" class="text-input" placeholder="" value="<?=$data['state']?>">
                        <?php if (!empty($error['state'])) { ?>
                            <p class="input_error">[<?=$error['state']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>Zip *</label><br />
                        <input type="text" name="zip" id="zip" class="text-input" placeholder="" value="<?=$data['zip']?>">
                        <?php if (!empty($error['zip'])) { ?>
                            <p class="input_error">[<?=$error['zip']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>Country *</label><br />
                        <input type="text" name="country" id="country" class="text-input" placeholder="" value="<?=$data['country']?>">
                        <?php if (!empty($error['country'])) { ?>
                            <p class="input_error">[<?=$error['country']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>Telephone *</label><br />
                        <input type="text" name="tel" id="tel" class="text-input" placeholder="" value="<?=$data['tel']?>">
                        <?php if (!empty($error['tel'])) { ?>
                            <p class="input_error">[<?=$error['tel']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label>
                            We are interested in taking a stand
                            <input class="num" type="text" name="choice2_info" id="choice2_info" size="10" value="<?=$data['choice2_info']?>" class="text-input" /> sq.m.
                        </label>
                        <br />
                        <ul>
                            <li><input type="checkbox" name="choice2[]" value="1"> Raw Space (Min 18 sq.m)</li>
                            <li><input type="checkbox" name="choice2[]" value="2"> Standard Booth</li>
                        </ul>

                        <label>Expected Total (sq.m)</label><br />
                        <input type="text" name="expected" id="expected" size="30" value="<?=$data['expected']?>" class="text-input" />
                        <?php if (!empty($error['expected'])) { ?>
                            <p class="input_error">[<?=$error['expected']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <input type="submit" name="submit" class="button" id="submit_btn" value="send..."/>

                    </fieldset>
                </form> -->

            </div><!-- end of contact_form -->
        </div><!-- end maincontent inner -->
    </div><!-- end content left -->

    <div id="sideright">
        <div class="sidebox">
            <h3>Standard booth includes:</h3>
            <img class="picpost" src="<?=BASE_HREF;?>images/info/booth2.jpg" title="Image title" alt="alternative information" style=" padding:10px 0px 30px 5px;" />
            <div class="padbox">
			  <h5 class="media-heading">Standard booth includes:</h5>
              <i class="fa-dot-circled"></i> Fascia name board<br>
              <i class="fa-dot-circled"></i> Needle punch carpet<br>
                                    <i class="fa-dot-circled"></i> 3 sided Panel system<br>
                                    <i class="fa-dot-circled"></i> 1 Reception desk<br>
                                    <i class="fa-dot-circled"></i> 2 Chairs <br>
                                    <i class="fa-dot-circled"></i> 2 Fluorescent lamps<br>
              <i class="fa-dot-circled"></i> Waste Basket<br>
                                    <i class="fa-dot-circled"></i> 1 Power socket (not for lighting)<br>
		  </div>
        </div><!-- end sidebox -->
    </div><!-- end sideright -->
</div>
<!-- END CONTENT -->

<script>
function clearForm() {
    document.getElementById("space_form").reset();
}
</script>