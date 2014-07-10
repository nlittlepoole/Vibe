	
		
				
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
				<!-- Footer -->
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase Social Admin Template</a> - Current version: v2.0.0-rc8 / <a target="_blank" href="../assets/../../CHANGELOG.txt?v=v2.0.0-rc8">changelog</a></div>
			<!--  End Copyright Line -->
	
		</div>
		<!-- // Footer END -->
		
				
	</div>
	<!-- // Main Container Fluid END -->
	

	<!-- Global -->
	<script data-id="App.Config">
	var App = {};	var basePath = 'admin/',
		commonPath = '../assets/',
		rootPath = '../',
		DEV = true,
		componentsPath = '../assets/components/';
	
	var primaryColor = '#25ad9f',
		dangerColor = '#b55151',
		successColor = '#609450',
		infoColor = '#4a8bc2',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;

		</script>
	
	<?php 
foreach ($scripts as $id => $script)
{
	$sections = !empty($script['sections']) && !empty($script['sections'][$page]);
	$inPages = in_array($page, $script['pages']);
	$inSections = !$sections ? false : in_array($section, $script['sections'][$page]);

	if (!$script['header'] && ((!$sections && $inPages) || ($sections && $inSections)))
		echo '<script src="' . $script['file'] . '"></script>' . "\n\t";
} 
?>
	
</body>
</html>