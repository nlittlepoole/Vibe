<div id="google-fs" class="maps-google-fs"></div>





<h3 id="maps_fs_heading">Google Maps &nbsp;<i class="fa fa-fw fa-map-marker text-muted"></i></h3>
<div class="btn-group" id="maps_fs_buttons">
	<div class="btn-group">
		<a href="<?php echo getURL(array('page'=>'maps_vector')); ?>" data-toggle="dropdown" class="btn btn-default">Vector maps</a>
		<ul class="dropdown-menu">
			<li><a href="<?php echo getURL(array('page'=>'maps_vector','section'=>'fullscreen')); ?>">Fullscreen example</a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_vector')); ?>">Other examples</a></li>
		</ul>
	</div>
	<div class="btn-group bg-white">
		<a href="<?php echo getURL(array('page'=>'maps_google')); ?>" class="btn btn-primary" data-toggle="dropdown">Google Maps</a>
		<ul class="dropdown-menu pull-right">
			<li><a href="<?php echo getURL(array('page'=>'maps_google','section'=>'fullscreen')); ?>">Fullscreen example &nbsp; <span class="label label-primary"><i class="fa fa-check"></i></span></a></li>
			<li><a href="<?php echo getURL(array('page'=>'maps_google')); ?>">Other examples</a></li>
		</ul>
	</div>
</div>