<div class="innerLR">
	
	<!-- heading -->
	<h2 class="margin-none pull-left">Dashboard Overview &nbsp;<i class="fa fa-fw fa-pencil text-muted"></i></h2>
	<div class="btn-group pull-right">
		<a href="<?php echo getURL(array('page'=>'dashboard_analytics')); ?>" class="btn btn-default"><i class="fa fa-fw fa-bar-chart-o"></i> Analytics</a>
		<a href="<?php echo getURL(array('page'=>'dashboard_users')); ?>" class="btn btn-default"><i class="fa fa-fw fa-user"></i> Users</a>
		<a href="<?php echo getURL(array('page'=>'dashboard_overview')); ?>" class="btn btn-primary"><i class="fa fa-fw fa-dashboard"></i> Overview</a>
	</div>
	<div class="clearfix"></div>
	<!-- // END heading -->

	<!-- content -->
	<div class="row row-app">
		<div class="col-md-3">
			<div class="widget">
				<div class="text-center innerAll inner-2x border-bottom">
	<div class="innerTB">
		<div data-percent="85" data-size="100" class="easy-pie inline-block primary" data-scale-color="false" data-track-color="#efefef" data-line-width="5">
			<div class="value text-center">
				<span class="strong"><i class="icon-graph-up-1 fa-3x text-primary"></i></span>
			</div>
		</div>
	</div>
</div>
<div class="text-center innerAll inner-2x bg-gray">
	<p class="lead margin-none"><span class="text-large text-regular">8,320</span><span class="clearfix"></span> <span class="text-primary">Visits</span></p>
</div>


			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="text-center innerAll inner-2x border-bottom">
	<div class="innerTB">
		<div data-percent="85" data-size="100" class="easy-pie inline-block success" data-scale-color="false" data-track-color="#efefef" data-line-width="5">
			<div class="value text-center">
				<span class="strong"><i class="icon-cash-bag fa-4x text-success"></i></span>
			</div>
		</div>
	</div>
</div>
<div class="text-center innerAll inner-2x bg-gray">
	<p class="lead margin-none"><span class="text-large text-regular">&euro;3,470</span><span class="clearfix"></span> <span class="text-success">Income</span></p>
</div>

			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="text-center innerAll inner-2x border-bottom">
	<div class="innerTB">
		<div data-percent="85" data-size="100" class="easy-pie inline-block info" data-scale-color="false" data-track-color="#efefef" data-line-width="5">
			<div class="value text-center">
				<span class="strong"><i class="icon-shopping-bag fa-3x text-info"></i></span>
			</div>
		</div>
	</div>
</div>
<div class="text-center innerAll inner-2x bg-gray">
	<p class="lead margin-none"><span class="text-large text-regular">683</span> <span class="clearfix"></span> <span class="text-info">Sales</span></p>
</div>

			</div>
		</div>
		<div class="col-md-3">
			<div class="widget">
				<div class="text-center innerAll inner-2x border-bottom">
	<div class="innerTB">
		<div data-percent="85" data-size="100" class="easy-pie inline-block inverse" data-scale-color="false" data-track-color="#efefef" data-line-width="5">
			<div class="value text-center">
				<span class="strong"><i class="icon-user-2 fa-3x text-faded"></i></span>
			</div>
		</div>
	</div>
</div>
<div class="text-center innerAll inner-2x bg-gray">
	<p class="lead margin-none"><span class="text-large text-regular">1209</span> <span class="clearfix"></span><span>Total Sign Ups</span></p>
</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="separator"></div>
			<div class="widget widget-heading-simple widget-body-white ">
				<div class="widget-head height-auto ">
					<h4 class="heading margin-none pull-left"><i class="icon-user-2 innerR"></i>Recent Activity</h4>
					<div class="btn-group btn-group-xs  pull-right">
						<button class="btn btn-primary "><i class="fa fa-refresh "></i></button>
						<button class="btn btn-default "><i class="fa fa-cog "></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="widget-body padding-none">
					<div class="innerAll  text-center border-bottom">
						<div class="btn-group innerAll ">
							<a href="" class="btn btn-primary"><i class="icon-user-1"></i> Visitors</a>
							<a href="" class="btn btn-default"><i class=" icon-document-blank"></i> PageViews</a>
							<a href="" class="btn btn-default"><i class="icon-user-2"></i> Unique Visitors</a>
						</div>
					</div>

					<div class="innerAll ">
						<!-- Simple Chart -->
<div id="chart_simple" class="flotchart-holder"></div>




					</div>
				</div>
			</div>
			<!-- //End Widget -->
			<div class="separator"></div>
			<!-- Widget -->
			<!-- REPORTS START -->
<div class="widget widget-heading-simple widget-body-white">
    <div class="widget-head height-auto">
        <h4 class=" heading margin-none pull-left"><i class="icon-compose innerR"></i>Reports</h4>
        <div class="btn-group btn-group-xs pull-right">
            <button class="btn btn-primary"><i class="fa fa-refresh "></i></button>
            <button class="btn btn-default "><i class="fa fa-cog "></i></button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body padding-none">
        <table class="table table-vertical-center table-striped  margin-none">
            <thead>
            <tr>
                <th class="center">No.</th>
                <th>Name</th>
                <th>Location</th>
                <th>Position</th>
                <th class="center">Rating</th>
                <th class="center">Progress</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>                                            <tr>
                    <td class="center">1</td>
                    <td><img src="../assets//images/people/35/5.jpg" width="20"
                             class="img-circle"/> <span>Adrian Demian</span></td>
                    <td>MI,USA </td>
                    <td>Senior UI Designer</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">2</td>
                    <td><img src="../assets//images/people/35/6.jpg" width="20"
                             class="img-circle"/> <span>Suzanne Marie</span></td>
                    <td>DUBLIN,IE </td>
                    <td>Project Manager</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">3</td>
                    <td><img src="../assets//images/people/35/7.jpg" width="20"
                             class="img-circle"/> <span>John Carsten</span></td>
                    <td>ML,IT </td>
                    <td>Assistant</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">4</td>
                    <td><img src="../assets//images/people/35/8.jpg" width="20"
                             class="img-circle"/> <span>Bogdan Laza</span></td>
                    <td>MI,USA </td>
                    <td>CEO</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">5</td>
                    <td><img src="../assets//images/people/35/9.jpg" width="20"
                             class="img-circle"/> <span>Adrian Demian</span></td>
                    <td>DUBLIN,IE </td>
                    <td>Director</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">6</td>
                    <td><img src="../assets//images/people/35/10.jpg" width="20"
                             class="img-circle"/> <span>Suzanne Marie</span></td>
                    <td>ML,IT </td>
                    <td>Senior Associate</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">7</td>
                    <td><img src="../assets//images/people/35/11.jpg" width="20"
                             class="img-circle"/> <span>John Carsten</span></td>
                    <td>ML,IT </td>
                    <td>Personal Assistant</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">8</td>
                    <td><img src="../assets//images/people/35/12.jpg" width="20"
                             class="img-circle"/> <span>Bogdan Laza</span></td>
                    <td>DUBLIN,IE </td>
                    <td>Developer</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                            <tr>
                    <td class="center">9</td>
                    <td><img src="../assets//images/people/35/13.jpg" width="20"
                             class="img-circle"/> <span>Bogdan Laza</span></td>
                    <td>DUBLIN,IE </td>
                    <td>Developer</td>
                    <td class="center"><div class="rating text-faded">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star active"></span>
        <span class="star"></span>
</div>  


</td>
                    <td class="center">
                        <div class="progress progress-mini margin-bottom">
                            <div class="progress-bar progress-bar-primary" style="width: 75%;"></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="btn-group btn-group-xs "><a href="" class="btn btn-inverse"><i
                                    class="fa fa-pencil"></i></a> <a href="" class="btn btn-default text-danger"><i
                                    class="fa fa-times"></i></a></div>
                    </td>
                </tr>                                                    </tbody>
        </table>
    </div>
</div>



<!-- // END REPORTS -->
			<!-- // End Widget -->
		</div>
		<!-- //End Col -->
	
		<div class="col-md-4">
			<div class="separator"></div>			
			<div class="separator"></div>			
				<a href="" class="widget widget-icon inverse innerAll inner-2x text-center text-regular">
	<i class="display-block icon-alarm-clock text-xlarge"></i>
	<span class="lead">3 Alerts</span>
</a>

			<div class="separator"></div>			
				<a href="" class="widget widget-icon primary innerAll inner-2x text-center text-regular">
	<i class="display-block  icon-graduation text-xlarge"></i>
	<span class="lead">5 Graduates</span>
</a>	
	
			<div class="separator"></div>			
				<a href="" class="widget widget-icon success innerAll inner-2x text-center text-regular">
	<i class="display-block icon-envelope-2 text-xlarge"></i>
	<span class="lead">9 Messages</span>
</a>	
	
			<div class="separator"></div>			
				<!-- Demographics Widget -->
<div class="widget widget-inverse">
	<div class="widget-head border-bottom-none">
		<h4 class="heading"><i class="icon-wind-speed-censor"></i> Demographics</h4>
	</div>
	<div class="widget-body padding-none">
		
		<div class="innerAll inner-2x text-center border-bottom">
			<p class="lead margin-none"><span class="text-large3">1,210</span> of <span class="text-primary">your customers</span></p>
		</div>
		<div class="innerAll inner-2x">
			<div class="innerLR text-center">
				<div class="progress progress-mini">
					<div class="progress-bar progress-bar-primary" style="width: 30%"></div>
				</div>
				<p class="margin-none">living in <span class="strong">United States</span>, aged <span class="strong">45+</span></p>
				<p class="margin-none">suffer from a <span class="strong text-primary">deadly disease</span></p>
			</div>
		</div>
				
	</div>
</div>

					
		</div>
	</div>
	<!-- // END row -->
</div>
<!-- // END inner -->


