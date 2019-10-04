<?php include("header.php"); ?>
			
			<!-- BEGIN CONTENT -->
				<div id="content">
					<div id="content_full">
						<div id="maincontent_fullcontent">
							<h2>Participation Fee</h2><hr>
							<div class="row">
							  <div class="span6">
								  <dl>
							  <dt><h3>Standard booth includes:</h3></dt>
							  <dd><img style="width: 290px;" src="images/info/booth.jpg" title="Image title" alt="alternative information"></dd>							  
							  <dd><i class="fa fa-slack"></i> Fascia name board</dd>
							  <dd><i class="fa fa-slack"></i> Needle punch carpet</dd>
							  <dd><i class="fa fa-slack"></i> Panel system, white</dd>
							  <dd><i class="fa fa-slack"></i> Reception desk (1 unit)</dd>
							  <dd><i class="fa fa-slack"></i> Chairs (2 units)</dd>
							  <dd><i class="fa fa-slack"></i> Waste Basket</dd>
							  <dd><i class="fa fa-slack"></i> Fluorescent lamps (2 units)</dd>
							  <dd><i class="fa fa-slack"></i> Power socket (1 unit, not for lighting</dd>
							</dl>
							
							  </div>
							  <div class="span6">
							<dl>
							  <dt><h3>Space Booking </h3></dt>
							  <dd>
							  <form>
								<fieldset>
								  <label >First Name*</label>
								  	<input type="text" name="name" id="name" size="25" value="" class="text-input"/>
								  <label >Last Name *</label>
								  	<input type="text" name="lastname" id="lastname" size="30" value="" class="text-input" />
								  <label >Company/Organization </label>
								  	<input type="text" name="company1" id="company1" size="30" value="" class="text-input" />
								  	<label >What is your company specialty?</label>
								  <select>
								    <option>Select..</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								  <label >Job title/Job role</label>
								  <select>
								    <option>Select..</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								  
								  <h3>Contact Information</h3>
								 <label>Email Address *</label>
								  	<input type="text" name="email1" id="email1" size="30" value="" class="text-input" />
								  <label>Confirm Email Address</label>
								  	<input type="text" name="email2" id="email2" size="30" value="" class="text-input" />
								  <label>Mailing Address1 *</label>
								  <textarea cols="25" rows="8" name="address1" id="address1" class="text-input"></textarea>
								 <label>Mailing Address2 </label>
								 <textarea cols="25" rows="8" name="address2" id="address2" class="text-input"></textarea>
								 <label>City *</label>
								  <input type="text" name="city" id="city" size="30" value="" class="text-input" />
								  <label >State/Province</label>
								  <select>
								    <option>Select..</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								  <label>Zip *</label>
								  <input type="text" name="zip" id="zip" size="30" value="" class="text-input" />
								  <label>Country *</label>
								   <select>
								    <option>Select..</option>
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								  <label>Telephone *</label>
								  <input type="text" name="telephone" id="telephone" size="30" value="" class="text-input" />
								  <h3>Which of the following are you interested in?</h3>
							       <label class="checkbox">
									  <input type="checkbox"> Raw Space (Min 18sq.m)
									</label>
									<label class="checkbox">
									  <input type="checkbox"> Standard Booth
									</label>
									<label>Expected Total <input class="num" type="text" name="telephone" id="telephone" size="10" value="" class="text-input" /> sq.m.</label>
								  <input type="submit" name="submit" class="btn btn-success" id="submit_btn" value="Send..."/>
								</fieldset>
							  </form>
							  </dd>							  
							</dl>
							  </div>
							</div>

						</div><!-- end maincontent inner -->
					</div><!-- end content left -->
				</div>
			<!-- END CONTENT -->
			
			
			<?php include("footer.php"); ?>