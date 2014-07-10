<h3>Form Validator</h3>
<div class="innerLR">
	<!-- Form -->
<form class="form-horizontal margin-none" id="validateSubmitForm" method="get" autocomplete="off">
	
	<!-- Widget -->
	<div class="widget">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading">Validate a form with jQuery</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body innerAll inner-2x">
		
			<!-- Row -->
			<div class="row innerLR">
			
				<!-- Column -->
				<div class="col-md-4">
				
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="firstname">First name</label>
						<div class="col-md-8"><input class="form-control" id="firstname" name="firstname" type="text" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="lastname">Last name</label>
						<div class="col-md-8"><input class="form-control" id="lastname" name="lastname" type="text" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="username">Username</label>
						<div class="col-md-8"><input class="form-control" id="username" name="username" type="text" /></div>
					</div>
					<!-- // Group END -->
					
				</div>
				<!-- // Column END -->
				
				<!-- Column -->
				<div class="col-md-8">
				
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="password">Password</label>
						<div class="col-md-8"><input class="form-control" id="password" name="password" type="password" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="confirm_password">Confirm password</label>
						<div class="col-md-8"><input class="form-control" id="confirm_password" name="confirm_password" type="password" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="email">E-mail</label>
						<div class="col-md-8"><input class="form-control" id="email" name="email" type="email" /></div>
					</div>
					<!-- // Group END -->
					
				</div>
				<!-- // Column END -->
				
			</div>
			<!-- // Row END -->
			
			<!-- Row -->
			<div class="bg-gray innerAll inner-2x">
				<div class="row">
			
					<!-- Column -->
					<div class="col-md-4">
						<h4>Policy &amp; Newsletter</h4>
			            <div class="checkbox">
							<label class="checkbox-custom" for="agree">
								<i class="fa fa-fw fa-square-o"></i>
								<input type="checkbox" class="checkbox" id="agree" name="agree" />
								Please agree to our policy
							</label>
						</div>
						<div class="checkbox">
							<label class="checkbox-custom" for="newsletter">
								<i class="fa fa-fw fa-square-o"></i>
								<input type="checkbox" class="checkbox" id="newsletter" name="newsletter" checked="checked" />
								Receive Newsletter
							</label>
						</div>
					</div>
					<!-- // Column END -->
					
					<!-- Column -->
					<div class="col-md-8">
						<div id="newsletter_topics">
							<h4>Topics</h4>
							<p>Select at least two topics you would like to receive in the newsletter.</p>
							<div class="checkbox">
								<label for="topic_marketflash" class="checkbox-custom">
									<i class="fa fa-fw fa-square-o"></i>
									<input type="checkbox" id="topic_marketflash" value="marketflash" name="topic" checked="checked" />
									Marketflash
								</label>
							</div>
							<div class="checkbox">
								<label for="topic_fuzz" class="checkbox-custom">
									<i class="fa fa-fw fa-square-o"></i>
									<input type="checkbox" id="topic_fuzz" value="fuzz" name="topic" />
									Latest fuzz
								</label>
							</div>
							<div class="checkbox">
								<label for="topic_digester" class="checkbox-custom">
									<i class="fa fa-fw fa-square-o"></i>
									<input type="checkbox" id="topic_digester" value="digester" name="topic" />
									Mailing list digester
								</label>
							</div>
						</div>
					</div>
					<!-- // Column END -->
					
				</div>
				<!-- // Row END -->	
			</div>

			<div class="separator"></div>
			
			<!-- Form actions -->
			<div class="form-actions">
				<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<!-- // Form actions END -->
			
		</div>
	</div>
	<!-- // Widget END -->
	
</form>
<!-- // Form END -->




</div>