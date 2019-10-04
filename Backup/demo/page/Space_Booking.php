<?php include("header.php"); ?>
			
			<!-- BEGIN CONTENT -->
				<div id="content">
					<div id="content_left">
						<div id="maincontent_contact">
							<div id="contact_form">
							<h1 class="tblue title">Space Booking</h1><br />
							  <form id="contact" action="">
								<fieldset>
								  <label >Firstname *</label><br />
								  <input type="text" name="name" id="name" size="25" value="" class="text-input" /><br />
								  <label >Lastname *</label><br />
								  <input type="text" name="lastname" id="lastname" size="30" value="" class="text-input" />
								  <br />
								  <label >What is your company specialty ?</label><br />
								  <input type="text" name="company1" id="company1" size="30" value="" class="text-input" />
								  <br />
								  <label >Job title/Job role</label><br />
								  <input type="text" name="job" id="job" size="30" value="" class="text-input" />
								  <br /><br />
								  <h2 class="tblue title">Contact Information</h2>
								 <label>Email Address *</label><br />
								  <input type="text" name="email1" id="email1" size="30" value="" class="text-input" />
								  <br />
								  <label>Confirm Email Address</label><br />
								  <input type="text" name="email2" id="email2" size="30" value="" class="text-input" />
								  <br />
								  <label>Mailing address 1 *</label><br />
								 <textarea cols="25" rows="8" name="address1" id="address1" class="text-input"></textarea>
								 <br /><br />
								 <label>Mailing address 2 </label><br />
								 <textarea cols="25" rows="8" name="address2" id="address2" class="text-input"></textarea>
								 <br /><br />
								 <label>City *</label><br />
								  <input type="text" name="city" id="city" size="30" value="" class="text-input" />
								  <br />
								  <label>State / Province *</label><br />
								  <input type="text" name="province" id="province" size="30" value="" class="text-input" />
								  <br />
								  <label>Zip *</label><br />
								  <input type="text" name="zip" id="zip" size="30" value="" class="text-input" />
								  <br />
								  <label>Country *</label><br />
								  <input type="text" name="country" id="country" size="30" value="" class="text-input" />
								  <br />
								  <label>Telephone *</label><br />
								  <input type="text" name="telephone" id="telephone" size="30" value="" class="text-input" />
								  <br />
								  <label>Telephone *</label><br />
								  <input type="text" name="telephone" id="telephone" size="30" value="" class="text-input" />
								  <br />
								 <label>We are interested in anticipated taking a stand <input class="num" type="text" name="telephone" id="telephone" size="10" value="" class="text-input" /> sq.m.</label><br />
							       <ul>
							           <li><input type="checkbox"> Raw Space (Min 18sq.m)</li>
							           <li><input type="checkbox"> Standard Booth</li>
							       </ul>
								    <label>Expected Total (sq.m.)</label><br />
								  <input type="text" name="expected" id="expected" size="30" value="" class="text-input" />
								  <br />
								  <input type="submit" name="submit" class="button" id="submit_btn" value="send..."/>
								</fieldset>
							  </form>

							</div><!-- end of contact_form -->
						</div><!-- end maincontent inner -->
					</div><!-- end content left -->
					<div id="sideright">
						<div class="sidebox">
							<h3>Standard booth includes:</h3>
							 <img class="picpost" src="images/info/booth.jpg" title="Image title" alt="alternative information">
							<div class="padbox">
								 <h5 class="media-heading">Standard booth includes:</h5>
                                    <i class="fa-dot-circled"></i> Fascia name board<br>
                                    <i class="fa-dot-circled"></i> Needle punch carpet<br>
                                    <i class="fa-dot-circled"></i> Panel system, white<br>
                                    <i class="fa-dot-circled"></i> Reception desk (1 unit)<br>
                                    <i class="fa-dot-circled"></i> Chairs (2 units)<br>
                                    <i class="fa-dot-circled"></i> Waste Basket<br>
                                    <i class="fa-dot-circled"></i> Fluorescent lamps (2 units)<br>
                                    <i class="fa-dot-circled"></i> Power socket (1 unit, not for lighting)<br>
							</div>
						</div><!-- end sidebox -->
					</div><!-- end sideright -->
				</div>
			<!-- END CONTENT -->
			
			<?php include("footer.php"); ?>