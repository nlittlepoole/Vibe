<?php 
	error_reporting(0);
    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    require($path . "/config.php");
	require( $path . "/classes/Web/Achievements.php"); 
    
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "Invite more Friends to Vibe for Comments"; //sets $action to "Action" url fragment string if action isn't null
    $dashboard=$_SESSION['dashboard'];
    $pic=$dashboard['pic'];
	
	// EVERYTHING ACHIEVEMENTS --> TWO METHOD CALLS
	
    // GRAB INFORMATION FROM DATABASE INITIALLY
    $achievementsNavBar = initAchievementsCreate(); 

	// ORGANIZE NAV BAR APPROPRIATELY
	$achievementsNavBar = organizeNavBar($achievementsNavBar);
    
?>

<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<script src="assets/scripts/tasks.js" type="text/javascript"></script>	
	
	
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<!--<a class="navbar-brand" href="index.html">
		</a>-->
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<!--<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<img src="assets/img/menu-toggler.png" alt=""/>
		</a>-->
		<!-- END RESPONSIVE MENU TOGGLER -->
		
		
		
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->
			<li class="dropdown" id="header_task_bar">
				<a href="/website/achievements.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-tasks"></i>
				
				<?php echo $_SESSION['achievementsToAchieve']; ?>
				
				</a>
				<ul class="dropdown-menu extended tasks">
					<li>
						<p>
							Achievements
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 270px;">
							<?php 
								foreach($_SESSION['achievementsNavBar'] as $achievementNav) {
									echo $achievementNav;
								}
							?>
						</ul>
					</li>
					<li class="external">
						<a href="/website/achievements.php">See All Achievements <i class="m-icon-swapright"></i></a>
					</li>
				</ul>
			</li>
			<!-- END TODO DROPDOWN -->
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user" id="nameTitle">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<!-- For now, I put in an image height and width limiter (Noah) -->
				<img alt="" src=<?php echo $pic ?> style="height: 29px; width: 29px"/>
				<span class="username">
					<?php echo $_SESSION['dashboard']['Name'] ?>
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<?php echo '<a href="/index.php?action=profile&profile=' . $_SESSION['userID'] . '"><i class="fa fa-user"></i> Profile</a>' ?>
					</li>
					<li>
						<a href="achievements.php"><i class="fa fa-tasks"></i> Achievements
						<?php echo $_SESSION['achievementsToAchieveNum']; ?>
						</a>
					</li>
					<li>
						<a href="settings.php"><i class="fa fa-gear"></i> Settings</a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href='/website/logout.php' ><i class="fa fa-key"></i> Log Out</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->