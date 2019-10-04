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

<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content_left">
        <div id="maincontent_contact">
            <div id="contact_form">
                <h1 class="tblue title">CONTACT DETAILS</h1>
                <p> (* is compulsory fields to key in)</p><br />

                <form id="contact_form" class="form" method="post" action="">
                    <input type="hidden" name="action" value="save">

                    <fieldset>
                        <label for="name" id="name_label">Name *</label><br />
                        <input type="text" name="name" id="name" size="30" value="<?=$data['name']?>" class="text-input" />
                        <?php if (!empty($error['name'])) { ?>
                            <p class="input_error">[<?=$error['name']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label for="email" id="email_label">Email *</label><br />
                        <input type="text" name="email" id="email" size="30" value="<?=$data['email']?>" class="text-input" />
                        <?php if (!empty($error['email'])) { ?>
                            <p class="input_error">[<?=$error['email']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <label for="desc" id="msg_label">Your Message *</label><br />
                        <textarea cols="25" rows="8" name="desc" id="desc" class="text-input"><?=$data['desc']?></textarea>
                        <?php if (!empty($error['desc'])) { ?>
                            <p class="input_error">[<?=$error['desc']?>]</p>
                        <?php } ?>
                        <div class="clear-both"></div>

                        <input type="submit" name="submit" class="button" id="submit_btn" value="send..."/>
                    </fieldset>

                </form>
            </div><!-- end of contact_form -->
        </div><!-- end maincontent inner -->
    </div><!-- end content left -->

    <div id="sideright">
        <div class="sidebox">
            <img class="logo" src="<?=BASE_HREF;?>images/info/logo_icvex.png" title="Image title" alt="alternative information">
            <div class="padbox">
                <h5>ICVeX Company Limited</h5>
                <p>545 Pridi Bhanomyong42 Sukhumvit 71.,North Prakanong Wattana, Bangkok 10110, Thailand</p>
                <strong>Tel:</strong> +662-713-3033 <br />
                <strong>Fax:</strong> +662-713-3034 <br />
                <strong>Email:</strong> <a href="mailto:info@icvex.com">info@icvex.com</a><br />
                <strong>Website:</strong> <a href="http://www.icvex.com">www.icvex.com</a>

            </div>
        </div><!-- end sidebox -->
    </div><!-- end sideright -->
</div>
<!-- END CONTENT -->

