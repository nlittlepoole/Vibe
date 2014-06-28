<h3>Google maps</h3>
<div class="innerLR">

	<!-- Tabs -->
<div class="widget widget-tabs widget-tabs-vertical row row-merge" id="maps_google_tabs">
	<!-- Tabs Heading -->
	<div class="widget-head bg-gray col-md-3">
		<ul>
			<li><a href="<?php echo getURL(array('page'=>'maps_google')); ?>">Load markers from JSON</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'clustering')); ?>&amp;section=clustering">Clustering</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'extend-pagination')); ?>&amp;section=extend-pagination">Extend with pagination</a></li>
			<li class="active"><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'filtering')); ?>&amp;section=filtering">Filtering</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'geocoding')); ?>&amp;section=geocoding">Click and drag with geo search</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'streetview')); ?>&amp;section=streetview">Streetview with microformats</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'fullscreen')); ?>"><span class="pull-right label label-primary">new</span> Full screen google map</a></li>
		</ul>
	</div>
	<!-- // Tabs Heading END -->
	
	<div class="widget-body col-md-9">
	
		<!-- Tab content -->
		<div class="tab-content innerAll inner-2x">
		
						
						
						
						<!-- Filtering -->
<h4 class="separator bottom">Filtering</h4>
<div class="thumbnail"><div class="map_canvas" id="google-map-filters" style="height: 400px"></div></div>
<div id="radios" class="well"></div>
<!--<div id="tags-control" class="well">
	<label style="color:#555;font-size:12px; font-weight:bold;" for="tags">Filter by tag</label>
	<select id="tags" style="outline:none;"></select>
</div>-->
<!-- // Filtering END -->


						
						
						
		</div>
		<!-- // Tab content END -->
		
	</div>
</div>
<!-- // Tabs END -->



	
</div>