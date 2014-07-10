<h3>Google maps</h3>
<div class="innerLR">

	<!-- Tabs -->
<div class="widget widget-tabs widget-tabs-vertical row row-merge" id="maps_google_tabs">
	<!-- Tabs Heading -->
	<div class="widget-head bg-gray col-md-3">
		<ul>
			<li class="active"><a href="<?php echo getURL(array('page'=>'maps_google')); ?>">Load markers from JSON</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'clustering')); ?>&amp;section=clustering">Clustering</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'extend-pagination')); ?>&amp;section=extend-pagination">Extend with pagination</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'filtering')); ?>&amp;section=filtering">Filtering</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'geocoding')); ?>&amp;section=geocoding">Click and drag with geo search</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'streetview')); ?>&amp;section=streetview">Streetview with microformats</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'fullscreen')); ?>"><span class="pull-right label label-primary">new</span> Full screen google map</a></li>
		</ul>
	</div>
	<!-- // Tabs Heading END -->
	
	<div class="widget-body col-md-9">
	
		<!-- Tab content -->
		<div class="tab-content innerAll inner-2x">
		
						<!-- JSON -->
<h4 class="separator bottom">Loading markers from JSON</h4>
<div class="thumbnail"><div class="map_canvas" id="google-map-json" style="height: 400px"></div></div>
<!-- // JSON END -->


						
						
						
						
						
						
		</div>
		<!-- // Tab content END -->
		
	</div>
</div>
<!-- // Tabs END -->



	
</div>