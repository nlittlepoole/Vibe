<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

<!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

<link rel="stylesheet" href="../assets/css/admin/module.admin.stylesheet-complete.layout_fixed.true.min.css" />

<script type="text/javascript" src="external_js_scripts.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="../assets/plugins/core_ajaxify_loadscript/script.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>

<script>var App = {};</script>

<script data-id="App.Scripts">
App.Scripts = {

	/* CORE scripts always load first; */
	core: [
		'../assets/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
	],

	/* PLUGINS_DEPENDENCY always load after CORE but before PLUGINS; */
	plugins_dependency: [
		'../assets/library/bootstrap/js/bootstrap.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
		'../assets/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc8&sv=v0.0.1.2'
	],

	/* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
	plugins: [
		'../assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
		'../assets/plugins/core_breakpoints/breakpoints.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
		'../assets/plugins/core_preload/pace.min.js?v=v2.0.0-rc8&sv=v0.0.1.2'
	],

	/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
	bundle: [
		'../assets/components/core_preload/preload.pace.init.js?v=v2.0.0-rc8&sv=v0.0.1.2',
		'../assets/components/core/core.init.js?v=v2.0.0-rc8'
	]

};
</script>

<script>
	$script(App.Scripts.core, 'core');

	$script.ready(['core'], function(){
		$script(App.Scripts.plugins_dependency, 'plugins_dependency');
	});
	$script.ready(['core', 'plugins_dependency'], function(){
		$script(App.Scripts.plugins, 'plugins');
	});
	$script.ready(['core', 'plugins_dependency', 'plugins'], function(){
		$script(App.Scripts.bundle, 'bundle');
	});
</script>
<script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>