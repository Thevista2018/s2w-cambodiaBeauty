<?PHP

  // Settings page
	$this->db->select("*");
	$this->db->where(array('set_id' => 1));
	$query = $this->db->get('tb_settings');
	$listsetting = $query->result_array();
	if(count($listsetting) != 0){
		foreach ($listsetting as $key => $value) {
			$Id = $value['set_id'];

            $Text_nameweb_th        = $value['set_nameweb_th'];
            $Text_address_th        = $value['set_address_th'];

            $Text_Emailcompany      = $value['set_emailcompany'];
            $Text_Phoncompany       = $value['set_phoncompany'];
            $Text_Mobilephoncompany = $value['set_mobilecompany'];
            $Text_Faxcompany        = $value['set_faxcompany'];

            $Text_linkfacebook      = $value['set_linkfacebook'];
            $Text_linktwitter       = $value['set_linktwitter'];
            $Text_linkyoutube       = $value['set_linkyoutube'];
            $Text_linkgoogleplus    = $value['set_linkgoogleplus'];
            $Text_linkinstagram     = $value['set_linkinstagram'];

            $Text_Fullnamecontact   = $value['set_fullnamecontact'];
            $Text_Positioncontact   = $value['set_positioncontact'];
            $Text_Phonecontact      = $value['set_phonecontact'];
            $Text_Phone_extcontact  = $value['set_phoneextcontact'];
			$Text_Mobilecontact     = $value['set_mobilecontact'];
			
            $Text_logo_footer       = $value['set_logo_footer'];

		}
	}
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>CONTACT US</h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">CONTACT US</li>
    </ol>
  </div>

</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">
<div class="content-wrap">
<div class="container clearfix">


	<!-- Google Map
	============================================= -->
	<div class="col_half ">

		<div class="widget noborder notoppadding">
			<h4>Index Creative Village PLC.</h4>
			<?=$Text_address_th; ?><br/>
			<?PHP if(!empty($Text_Phoncompany)){?>
			<label>Tel : </label><a href="tel:<?=$Text_Phoncompany;?>" style="color: #000;" target="_bank" ><?=$Text_Phoncompany; ?></a><br/>
			<?PHP } ?>
			<?PHP if(!empty($Text_Mobilephoncompany)){?>
			<label>Phon : </label><a href="tel:<?=$Text_Mobilephoncompany;?>" style="color: #000;" target="_bank" ><?=$Text_Mobilephoncompany; ?></a><br/>
			<?PHP } ?>
			<?PHP if(!empty($Text_Faxcompany)){?>
			<label>Fax : </label><?=$Text_Faxcompany; ?><br/>
			<?PHP } ?>
			<a href="http://icvex.com/"  style="color: #000;" target="_bank" >www.icvex.com</a>
			<hr/>
			<h4>Contact person</h4>
			<div id="post-list-footer">
				<div class="spost clearfix">
					<div class="entry-c">
						<div class="entry-title">
							
							<?PHP if(!empty($Text_Fullnamecontact)){?>
							<?=$Text_Fullnamecontact;?><br/>
							<?PHP } ?>
							<?PHP if(!empty($Text_Positioncontact)){?>
								<?=$Text_Positioncontact;?><br/>
							<?PHP } ?>
							<?PHP if(!empty($Text_Phonecontact)){?>
							<label>Tel : </label><a href="tel:<?=$Text_Phonecontact;?>" style="color: #000;" target="_bank" ><?=$Text_Phonecontact;?></a> ext. <?=$Text_Phone_extcontact;?> <br/>
							<?PHP } ?>
							<?PHP if(!empty($Text_Mobilecontact)){?>
							<label>Mobile : </label><a href="tel:<?=$Text_Mobilecontact;?>" style="color: #000;" target="_bank" ><?=$Text_Mobilecontact;?></a>
							<?PHP } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Google Map End -->
	<!-- Contact Form
	============================================= -->
	<div class="col_half col_last">

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
					<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d button-rounded button-aqua">Send Message</button>
				</div>

			</form>
		</div>

	</div>
	<!-- Contact Form End -->


	<div class="clear"></div>

</div>
</div>
</section>
<!-- #content end -->
