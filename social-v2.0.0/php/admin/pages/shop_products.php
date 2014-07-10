<div class="innerLR">

	<h3 class="margin-none pull-left">Products</h3>
	<div class="btn-group btn-group-sm pull-right">
		<a href="<?php echo getURL(array('page'=>'shop_edit_product')); ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add product</a>
	</div>
	<div class="clearfix"></div>
	<div class="separator-h"></div>

	<div class="row">
		
	<!-- Column -->
	<div class="col-md-4">
	
		<!-- Widget -->
		<div class="widget margin-none widget-heading-simple">
			
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading">Last order</h4>
				<a href="" class="details pull-right">view all</a>
			</div>
			<!-- // Widget heading END -->
			
			<div class="widget-body">
				<ul class="unstyled">
					<li>
						<div class="media">
							<a class="pull-left" href=""><img data-src="holder.js/50x50/dark" class="media-object img-responsive" alt="50x50"></a>
							<div class="media-body">
								<p class="margin-none text-uppercase">10 items</p>
								<p><strong>&euro;5,900</strong></p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- // Widget END -->
		
	</div>
	<!-- // Column END -->
	
	<!-- Column -->
	<div class="col-md-4">
	
		<!-- Widget -->
		<div class="widget margin-none widget-heading-simple">
		
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading">Best seller</h4>
				<a href="" class="details pull-right">view all</a>
			</div>
			<!-- // Widget heading END -->
			
			<div class="widget-body">
				<ul class="unstyled">
					<li>
						<div class="media">
							<a class="pull-left" href=""><img data-src="holder.js/50x50/dark" class="media-object img-responsive" alt="50x50"></a>
							<div class="media-body">
								<p class="margin-none">Product name</p>
								<p><strong>&euro;2,900</strong></p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- // Widget END -->
		
	</div>
	<!-- // Column END -->
	
	<!-- Column -->
	<div class="col-md-4">
	
		<!-- Widget -->
		<div class="widget margin-none widget-heading-simple">
		
			<!-- Widget heading -->
			<div class="widget-head">
				<h4 class="heading">Promotion</h4>
				<a href="" class="details pull-right">view all</a>
			</div>
			<!-- // Widget heading END -->
			
			<div class="widget-body">
				<ul class="unstyled">
					<li>
						<div class="media">
							<a class="pull-left" href=""><img data-src="holder.js/50x50/dark" class="media-object img-responsive" alt="50x50"></a>
							<div class="media-body">
								<p class="margin-none">Product name</p>
								<p><strong>&euro;1,800</strong></p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- // Widget END -->
		
	</div>
	<!-- // Column END -->

</div>




	<div class="separator bottom"></div>

	<!-- Widget -->
	<div class="widget widget-body-white">

		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading glyphicons list"><i></i> Manage products</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
			<!-- Total products & Sort by options -->
<div class="form-inline">
	<span class="pull-right">
		<label class="strong innerLR">Sort by:</label>
		<select class="selectpicker margin-none" data-style="btn-default btn-sm">
			<option>Option</option>
			<option>Option</option>
			<option>Option</option>
		</select>
	</span>
	<div class="innerAll half strong pull-left">
		Total products: 26
	</div>
	<div class="clearfix"></div>
</div>
<!-- // Total products & Sort by options END -->

<div class="separator bottom"></div>

<!-- Filters -->
<div class="filter-bar">
	<form class="margin-none form-inline">
		
		<!-- From -->
		<div class="form-group col-md-2 padding-none">
			<label>From:</label>
			<div class="input-group">
				<input type="text" name="from" id="dateRangeFrom" class="form-control" value="08/05/13" />
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
		</div>
		<!-- // From END -->
		
		<!-- To -->
		<div class="form-group col-md-2 padding-none">
			<label>To:</label>
			<div class="input-group">
				<input type="text" name="to" id="dateRangeTo" class="form-control" value="08/18/13" />
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
		</div>
		<!-- // To END -->
		
		<!-- Min -->
		<div class="form-group col-md-2 padding-none">
			<label>Min:</label>
			<div class="input-group">
				<input type="text" name="from" class="form-control" value="100" />
				<span class="input-group-addon"><i class="fa fa-euro"></i></span>
			</div>
		</div>
		<!-- // Min END -->
		
		<!-- Max -->
		<div class="form-group col-md-2 padding-none">
			<label>Max:</label>
			<div class="input-group">
				<input type="text" name="from" class="form-control" value="500" />
				<span class="input-group-addon"><i class="fa fa-euro"></i></span>
			</div>
		</div>
		<!-- // Max END -->
		
		<!-- Select -->
		<div class="form-group col-md-3 padding-none">
			<label class="label-control">Select:</label>
			<div class="col-md-8 padding-none">
				<select name="from" class="form-control">
					<option>Some option</option>
					<option>Other option</option>
					<option>Some other option</option>
				</select>
			</div>
		</div>
		<!-- // Select END -->
		
		<div class="clearfix"></div>
	</form>
</div>
<!-- // Filters END -->




<!-- Products table -->
<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable">
	<thead>
		<tr>
			<th style="width: 1%;" class="uniformjs"><input type="checkbox" /></th>
			<th style="width: 1%;" class="center">No.</th>
			<th>Title</th>
			<th style="width: 1%;" class="center">Drag</th>
			<th class="center">Preview</th>
			<th class="center">Stock</th>
			<th class="center">Price</th>
			<th class="center" style="width: 100px;">Actions</th>
		</tr>
	</thead>
	<tbody>
						<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">1</td>
			<td class="important">Lorem Ipsum Sit</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 1 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="3" />
			</td>
			<td class="center">&euro;31</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable selected">
			<td class="center uniformjs"><input type="checkbox" checked="checked" /></td>
			<td class="center">2</td>
			<td class="important">Lorem Ipsum Sit</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 1 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="6" />
			</td>
			<td class="center">&euro;39</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable selected">
			<td class="center uniformjs"><input type="checkbox" checked="checked" /></td>
			<td class="center">3</td>
			<td class="important">Lorem Dolor Ipsum</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 3 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="2" />
			</td>
			<td class="center">&euro;40</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">4</td>
			<td class="important">Lorem Amet Dolor</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 1 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="1" />
			</td>
			<td class="center">&euro;22</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">5</td>
			<td class="important">Lorem Amet Dolor</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 3 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="3" />
			</td>
			<td class="center">&euro;35</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">6</td>
			<td class="important">Lorem Ipsum Sit</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 2 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="8" />
			</td>
			<td class="center">&euro;32</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">7</td>
			<td class="important">Lorem Dolor Ipsum</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 1 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="10" />
			</td>
			<td class="center">&euro;20</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">8</td>
			<td class="important">Lorem Dolor Ipsum</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 1 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="8" />
			</td>
			<td class="center">&euro;25</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">9</td>
			<td class="important">Lorem Ipsum Sit</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 2 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="5" />
			</td>
			<td class="center">&euro;19</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
				<tr class="selectable">
			<td class="center uniformjs"><input type="checkbox" /></td>
			<td class="center">10</td>
			<td class="important">Lorem Dolor Ipsum</td>
			<td class="center js-sortable-handle"><span class="fa fa-arrows move"></span></td>
			<td class="center"><span class="fa fa-fw fa-picture-o"></span> 3 photos</td>
			<td class="text-center">
				<input type="text" class="form-control" style="width: 50px; margin: 0 auto;" value="10" />
			</td>
			<td class="center">&euro;20</td>
			<td class="center">
				<a href="<?php echo getURL(array('page'=>'product_edit')); ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			</td>
		</tr>
			</tbody>
</table>
<!-- // Products table END -->

<!-- Options -->
<div class="">

	<!-- With selected actions -->
	<div class="pull-left checkboxs_actions" style="display: none;">
		<label>With selected:
		<select class="selectpicker margin-none dropup" data-style="btn-default btn-xs">
			<option>Action</option>
			<option>Action</option>
			<option>Action</option>
		</select>
		</label>
	</div>
	<!-- // With selected actions END -->
	
	<div class="pull-right"><ul class="pagination margin-none">
	<li class="disabled"><a href="#">&laquo;</a></li>
	<li class="active"><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">&raquo;</a></li>
</ul>

</div>

	<div class="clearfix"></div>
	<!-- // Pagination END -->
	
</div>
<!-- // Options END -->




		</div>
	</div>
	<!-- // Widget END -->
	
</div>