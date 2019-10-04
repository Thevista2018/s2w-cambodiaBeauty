<?PHP
  if(count($listdata) != 0){
    foreach ($listdata as $key => $value) {
      $Title = $value['consub_page_th'];
      $Decision = $value['consub_decision_th'];
      $Detail = $value['consub_detail_th'];
    }
  }

  // Settings page
	$this->db->select("set_linkfacebook,set_linkyoutube,set_linkgoogleplus,set_linktwitter,set_linkinstagram,set_emailcontact");
	$this->db->where(array('set_id' => 1));
	$query = $this->db->get('tb_settings');
	$listsetting = $query->result_array();
	if(count($listsetting) != 0){
		foreach ($listsetting as $key => $value) {
			$Text_Linkfacebook = $value['set_linkfacebook'];
			$Text_Linktwitter = $value['set_linktwitter'];
			$Text_Linkyoutube = $value['set_linkyoutube'];
			$Text_Linkgoogle = $value['set_linkgoogleplus'];
			$Text_Linkinstagram = $value['set_linkinstagram'];
      $Text_Emailcontact = $value['set_emailcontact'];
		}
	}
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1><?=$Title?></h1>
    <span><?=$Decision?></span>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active"><?=$Title?></li>
    </ol>
  </div>

</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">

					<!-- Contact Form
					============================================= -->
					<div class="col_half">

						<div>
							<h3>CONTACT DETAILS</h3>
						</div>

						<div class="contact-widget">

							<div class="contact-form-result"></div>

							<form class="nobottommargin" id="Formcontact" name="Formcontact" action="<?=site_url('main/sentmailcontact');?>" method="post" novalidate="novalidate">

								<div class="form-process"></div>

								<div class="col_half">
									<label for="TextName">NAME <small>*</small></label>
									<input type="text" id="TextName" name="TextName" value="" class="sm-form-control required" aria-required="true">
								</div>

								<div class="col_half col_last">
									<label for="TextEmail">EMAIL <small>*</small></label>
									<input type="email" id="TextEmail" name="TextEmail" value="" class="required email sm-form-control" aria-required="true">
								</div>
								<div class="clear"></div>

								<div class="col_full">
									<label for="TextSubject">SUBJECT <small>*</small></label>
									<input type="text" id="TextSubject" name="TextSubject" value="" class="required sm-form-control" aria-required="true">
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="TextMessage">MESSAGE <small>*</small></label>
									<textarea class="required sm-form-control" id="TextMessage" name="TextMessage" rows="6" cols="30" aria-required="true"></textarea>
								</div>

                <div class="col_full">
                    <label for="template-contactform-message">Captcha <small>*</small></label>
                    <div>
                        <input type="text" id="TextCaptcha" name="TextCaptcha" data-rule-equalTo="#Inputcaptcha" value="" style="width: 200px; display: inline-table; letter-spacing: 8px;" class="required sm-form-control" aria-required="true"> <img alt="" id="captcha" class="thumbnail" style="cursor: pointer; display: inline-table; margin-bottom: 0px;" /> <button class="button button-small button-rounded button-red" id="refresh" type="button">Refresh</button>
                        <input type="hidden" id="Inputcaptcha" name="Inputcaptcha">
                    </div>
                </div>

								<div class="col_full">
									<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Send Message</button>
								</div>

							</form>
						</div>

					</div><!-- Contact Form End -->

					<!-- Google Map
					============================================= -->
					<div class="col_half col_last">
            <div>
							<h3>Contact info</h3>
						</div>

						<?=$Detail;?>

            <div class="widget noborder notoppadding">

              <?PHP if(!empty($Text_Linkfacebook)){?>
							<a href="<?=$Text_Linkfacebook?>" target="_blank" class="social-icon si-small si-dark si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<?PHP }?>

							<?PHP if(!empty($Text_Linktwitter)){?>
							<a href="<?=$Text_Linktwitter?>" target="_blank" class="social-icon si-small si-dark si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>
							<?PHP }?>

							<?PHP if(!empty($Text_Linkyoutube)){?>
							<a href="<?=$Text_Linkyoutube?>" target="_blank" class="social-icon si-small si-dark si-youtube">
								<i class="icon-youtube"></i>
								<i class="icon-youtube"></i>
							</a>
							<?PHP }?>

							<?PHP if(!empty($Text_Linkgoogle)){?>
							<a href="<?=$Text_Linkgoogle?>" target="_blank" class="social-icon si-small si-dark si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>
							<?PHP }?>

							<?PHP if(!empty($Text_Linkinstagram)){?>
							<a href="<?=$Text_Linkinstagram?>" target="_blank" class="social-icon si-small si-dark si-instagram">
								<i class="icon-instagram"></i>
								<i class="icon-instagram"></i>
							</a>
							<?PHP }?>

              <?PHP if(!empty($Text_Emailcontact)){?>
							<a href="<?=$Text_Emailcontact?>" target="_blank" class="social-icon si-small si-dark si-email3">
								<i class="icon-email3"></i>
								<i class="icon-email3"></i>
							</a>
							<?PHP }?>


            </div>

					</div><!-- Google Map End -->

					<div class="clear"></div>

				</div>

  </div>

</section><!-- #content end -->
