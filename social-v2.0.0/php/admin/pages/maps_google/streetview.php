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
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'filtering')); ?>&amp;section=filtering">Filtering</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'geocoding')); ?>&amp;section=geocoding">Click and drag with geo search</a></li>
			<li class="active"><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'streetview')); ?>&amp;section=streetview">Streetview with microformats</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'fullscreen')); ?>"><span class="pull-right label label-primary">new</span> Full screen google map</a></li>
		</ul>
	</div>
	<!-- // Tabs Heading END -->
	
	<div class="widget-body col-md-9">
	
		<!-- Tab content -->
		<div class="tab-content innerAll inner-2x">
		
						
						
						
						
						
						<!-- Streetview -->
<h4 class="separator bottom">Streetview with microformats <span>Click on marker or "Spinal Tap" title to open Street View</span></h4>
<div class="thumbnail"><div class="map_canvas" id="google-map-streetview" style="height: 400px"></div></div>
<div class="separator"></div>

<div class="vevent well box-generic bg-gray margin-none">
	<a href="#spinaltap"><h3 class="url summary">Spinal Tap</h3></a> 
	<p class="box-generic">After their highly-publicized search for a new
		drummer, Spinal Tap kicks off their latest comeback tour with a San
		Francisco show.</p>
	
	<p><strong>When:</strong>
	<span class="dtstart"> Oct 15, 7:00PM <span class="value-title" title="2015-10-15T19:00-08:00"></span></span> - 
	<span class="dtend"> 9:00PM<span class="value-title" title="2015-10-15T21:00-08:00"></span></span><br/>
	
	<strong>Where:</strong>
	<span class="location vcard">
		<span class="fn org">Warfield Theatre</span>, 
		<span class="adr"> 
			<span class="street-address">982 Market St</span>, 
			<span class="locality">San Francisco</span>, 
			<span class="region">CA</span>
		</span> 
		<span class="geo"> 
			<span class="latitude"><span class="value-title" title="37.774929"></span></span>
			<span class="longitude"><span class="value-title" title="-122.419416"></span></span>
		</span>
	</span></p>
</div>
<!-- // Streetview END -->


						
		</div>
		<!-- // Tab content END -->
		
	</div>
</div>
<!-- // Tabs END -->



	
</div>