<div class="innerLR">

	<h3 class="margin-none pull-left">Add product</h3>
	<div class="btn-group btn-group-sm pull-right">
		<a href="<?php echo getURL(array('page'=>'shop_products')); ?>" class="btn btn-default btn-icon glyphicons left_arrow"><i></i> Back to Catalog</a>
	</div>
	<div class="clearfix"></div>
	<div class="separator-h"></div>

	<!-- Widget -->
<div class="widget widget-tabs border-none">

	<!-- Widget heading -->
	<div class="widget-head">
		<ul>
			<li class="active"><a href="#productDescriptionTab" data-toggle="tab" class="glyphicons font"><i></i>Description</a></li>
			<li><a href="#productPhotosTab" data-toggle="tab" class="glyphicons picture"><i></i>Photos</a></li>
			<li><a href="#productAttributesTab" data-toggle="tab" class="glyphicons adjust_alt"><i></i>Custom Attributes</a></li>
			<li><a href="#productPriceTab" data-toggle="tab" class="glyphicons table"><i></i>Qty & Price</a></li>
			<li><a href="#productSeoTab" data-toggle="tab" class="glyphicons podium"><i></i>SEO</a></li>
		</ul>
	</div>
	<!-- // Widget heading END -->
	
	<div class="widget-body">
		<div class="tab-content">
		
			<!-- Description -->
			<div class="tab-pane active" id="productDescriptionTab">
			
				<!-- Row -->
				<div class="row">
				
					<!-- Column -->
					<div class="col-md-3">
						<strong>Product title</strong>
						<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<!-- // Column END -->
					
					<!-- Column -->
					<div class="col-md-9">
						<label for="inputTitle">Title</label>
						<input type="text" id="inputTitle" class="form-control" value="" placeholder="Enter product title ..." />
						<div class="separator"></div>
					</div>
					<!-- // Column END -->
					
				</div>
				<!-- // Row END -->
				
				<hr class="separator bottom" />
				
				<!-- Row -->
				<div class="row">
				
					<!-- Column -->
					<div class="col-md-3">
						<strong>Description</strong>
						<p class="muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<!-- // Column END -->
					
					<!-- Column -->
					<div class="col-md-9">
						<label for="textDescription">Description</label>
						<textarea id="textDescription" class="wysihtml5 form-control" rows="5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea>
					</div>
					<!-- // Column END -->
					
				</div>
				<!-- // Row END -->
				
			</div>
			<!-- // Description END -->
			
			<!-- Photos -->
			<div class="tab-pane" id="productPhotosTab">
			
				<h5 class="strong text-uppercase margin-none">Photos</h5>
				<div class="separator bottom"></div>
				
				<!-- Gallery Layout -->
				<div class="gallery gallery-2">
					<ul class="row" data-toggle="modal-gallery" data-target="#modal-gallery" id="gallery-4" data-delegate="#gallery-4">
												<li class="col-md-2 hidden-phone"><a class="thumb" href="../assets/images/gallery-2/8.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/8.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2 hidden-phone"><a class="thumb" href="../assets/images/gallery-2/7.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/7.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2 hidden-phone"><a class="thumb" href="../assets/images/gallery-2/6.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/6.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2 hidden-phone"><a class="thumb" href="../assets/images/gallery-2/5.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/5.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2 hidden-phone"><a class="thumb" href="../assets/images/gallery-2/4.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/4.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2"><a class="thumb" href="../assets/images/gallery-2/3.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/3.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2"><a class="thumb" href="../assets/images/gallery-2/2.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/2.jpg" alt="photo" class="img-responsive" /></a></li>
												<li class="col-md-2"><a class="thumb" href="../assets/images/gallery-2/1.jpg" data-gallery="gallery"><img src="../assets/images/gallery-2/1.jpg" alt="photo" class="img-responsive" /></a></li>
											</ul>
				</div>
				<!-- // Gallery Layout END -->
			
			</div>
			<!-- // Photos END -->
			
			<!-- Attributes -->
			<div class="tab-pane" id="productAttributesTab">
				<h5 class="strong text-uppercase">Custom attributes</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus leo tortor, sit amet sodales mauris iaculis ac. Fusce eu euismod orci. Nam congue magna at urna varius, nec viverra risus facilisis. In eu ullamcorper enim. Suspendisse sagittis dolor quis est porttitor fringilla. Suspendisse venenatis, diam vitae tempor lacinia, metus risus tincidunt massa, a malesuada augue massa eu augue. Praesent convallis et metus vulputate euismod. Aenean ultricies dolor porta turpis bibendum, non pretium metus placerat. Donec congue tincidunt pharetra. Aliquam sed orci lectus. Mauris iaculis leo turpis. Duis auctor libero mi, non convallis lectus pellentesque in. Donec rutrum neque bibendum nulla vulputate condimentum. Sed dictum ut velit nec feugiat. Nullam aliquam enim at commodo lobortis.</p>
			</div>
			<!-- // Attributes END -->
			
			<!-- Price -->
			<div class="tab-pane" id="productPriceTab">
				<h5 class="strong text-uppercase">Quantity &amp; Price</h5>
				<p>Donec sit amet lacus enim. Mauris vehicula vulputate erat, eget sagittis ipsum hendrerit id. Maecenas tristique sodales tellus vel euismod. Ut odio dolor, convallis vel auctor non, congue quis augue. Cras a tincidunt mauris. Mauris iaculis ullamcorper sapien, id vestibulum lectus dictum quis. Quisque et nunc sit amet eros tristique pellentesque ac sed purus. Fusce vel nunc varius, vestibulum ligula venenatis, facilisis ante.</p>
			</div>
			<!-- // Price END -->
			
			<!-- SEO -->
			<div class="tab-pane" id="productSeoTab">
				<h5 class="strong text-uppercase">Search Engine Optimization</h5>
				<p>Aenean sollicitudin et nisi ac faucibus. Ut lacinia rhoncus posuere. Cras consectetur tincidunt consectetur. Nam egestas augue sed leo tincidunt imperdiet. Etiam eu convallis magna, sed hendrerit sem. Sed vulputate, tortor vel ullamcorper aliquet, ante nibh iaculis neque, ullamcorper dictum felis metus nec quam. Pellentesque sollicitudin turpis a mi volutpat, eget sagittis urna vehicula. Nunc vel ultrices elit. Proin eros justo, hendrerit a metus non, convallis ullamcorper magna.</p>
			</div>
			<!-- // SEO END -->
			
		</div>
	</div>
</div>
<!-- // Widget END -->

<div class="text-right innerAll border-top">
	<div class="btn-group btn-group-sm">
		<a href="" class="btn btn-default"><i class="fa fa-fw fa-share"></i> Preview</a>
		<a href="" class="btn btn-primary"><i class="fa fa-fw fa-check"></i> Save</a>
	</div>
</div>




	
</div>