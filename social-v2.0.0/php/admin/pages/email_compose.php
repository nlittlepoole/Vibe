<div class="layout-app">
	<div class="row row-app">
		
		<div class="col-md-12">
			
			<div class="col-separator col-separator-first box">
				
				<div class="innerAll border-bottom">
					<div class="pull-left">
						<a href="<?php echo getURL(array('page'=>'email')); ?>" class=" btn btn-default btn-sm"><i class="fa fa-fw fa-arrow-left"></i> back</a> 
					</div>
					<div class="pull-left innerL">
						<a href="<?php echo getURL(array('page'=>'email')); ?>" class=" btn btn-success btn-sm strong"><i class="fa fa-fw icon-paperclip"></i> Save Draft</a>
					</div>
					<a href="<?php echo getURL(array('page'=>'email')); ?>" class="pull-right btn btn-primary btn-sm strong"><i class="fa fa-fw icon-outbox-fill"></i> Send Email</a>
					<div class="clearfix"></div>
				</div>
				
				<div class="bg-gray innerAll">
					<form class="form-horizontal innerR" role="form">
						<div class="form-group">
							<label for="to" class="col-sm-2 control-label">To:</label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" id="to">
									<div class="input-group-btn">
										<button type="button" data-toggle="collapse" data-target="#cc" class="btn btn-default">CC/BCC <span class="caret"></span></button>
									</div>
								</div>
							</div>
						</div>
						<div id="cc" class="collapse">
							<div class="form-group">
								<label for="Cc" class="col-sm-2 control-label">Cc:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Cc">
								</div>
							</div>
							<div class="form-group">
								<label for="Bcc" class="col-sm-2 control-label">Bcc:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Bcc">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="Bcc" class="col-sm-2 control-label">From:</label>
							<div class="col-sm-6">
								<select class="selectpicker">
									<option>contact@mosaicpro.biz</option>
								</select>
							</div>
						
						</div>

						<div class="form-group">
							<label for="Bcc" class="col-sm-2 control-label">Signature:</label>
							<div class="col-sm-6">
							<select class="selectpicker">
								<option>Select Signature</option>
							</select>
							</div>
						</div>
				
						<div class="clearfix"></div>
					</form>
				</div>

				<hr class="margin-none"/>
				<div class="innerAll inner-2x">
					<textarea class="notebook border-none form-control padding-none" rows="8" placeholder="Write your content here..."></textarea>
					<div class="clearfix"></div>
				</div>
				<div class="col-separator-h"></div>
				<div class="innerAll text-center">
					<a href="<?php echo getURL(array('page'=>'email')); ?>" class="btn btn-default"><i class="fa fa-fw icon-crossing"></i> Cancel</a>
					<a href="<?php echo getURL(array('page'=>'email')); ?>" class="btn btn-primary"><i class="fa fa-fw icon-outbox-fill"></i> Send email</a>
				</div>
			</div>
		</div>
		
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modal-compose">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Login</h3>
			</div> -->
			<!-- // Modal heading END -->

			<div class="innerAll border-bottom">
				<div class="pull-left">
					<a href="" class=" btn btn-default btn-sm"><i class="fa fa-fw fa-arrow-left"></i> back</a> 
				</div>
				<div class="pull-left innerL">
					<a href="" class=" btn btn-success btn-sm strong"><i class="fa fa-fw icon-paperclip"></i> Save Draft</a>
				</div>
				<a href="" class="pull-right btn btn-primary btn-sm strong"><i class="fa fa-fw icon-outbox-fill"></i> Send Email</a>
				<div class="clearfix"></div>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body padding-none">
				
				<form class="form-horizontal" role="form">
					<div class="bg-gray innerAll border-bottom">
						<div class="innerLR">
							<div class="form-group">
								<label for="to" class="col-sm-2 control-label">To:</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" id="to">
										<div class="input-group-btn">
											<button type="button" data-toggle="collapse" data-target="#cc" class="btn btn-default">CC/BCC <span class="caret"></span></button>
										</div>
									</div>
								</div>
							</div>
							<div id="cc" class="collapse">
								<div class="form-group">
									<label for="Cc" class="col-sm-2 control-label">Cc:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="Cc">
									</div>
								</div>
								<div class="form-group">
									<label for="Bcc" class="col-sm-2 control-label">Bcc:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="Bcc">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="Bcc" class="col-sm-2 control-label">From:</label>
								<div class="col-sm-6">
									<select class="selectpicker">
										<option>contact@mosaicpro.biz</option>
									</select>
								</div>
							
							</div>

							<div class="form-group">
								<label for="Bcc" class="col-sm-2 control-label">Signature:</label>
								<div class="col-sm-6">
								<select class="selectpicker">
									<option>Select Signature</option>
								</select>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

					<div class="innerAll inner-2x">
						<textarea class="notebook border-none form-control padding-none" rows="4" placeholder="Write your content here..."></textarea>
						<div class="clearfix"></div>
					</div>
				</form>

			</div>
			<!-- // Modal body END -->

			<div class="innerAll text-center border-top">
				<a href="" class="btn btn-default"><i class="fa fa-fw icon-crossing"></i> Cancel</a>
				<a href="" class="btn btn-primary"><i class="fa fa-fw icon-outbox-fill"></i> Send email</a>
			</div>
	
		</div>
	</div>
	
</div>
<!-- // Modal END -->


