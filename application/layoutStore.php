<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Store Admin | Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assests/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assests/css/responsive.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="<?php echo base_url();?>assests/js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="<?php echo base_url();?>assests/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/css/animatecss/animate.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/js/jquery-todo/css/styles.css" />
	<!-- FULL CALENDAR -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/js/fullcalendar/fullcalendar.min.css" />
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assests/js/gritter/css/jquery.gritter.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>assests/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>assests/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>assests/bootstrap-dist/js/bootstrap.min.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="<?php echo base_url();?>assests/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?php echo base_url();?>assests/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script><script type="text/javascript" src="<?php echo base_url();?>assests/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="<?php echo base_url();?>assests/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- FLOT CHARTS -->
	<script src="<?php echo base_url();?>assests/js/flot/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>assests/js/flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo base_url();?>assests/js/flot/jquery.flot.selection.min.js"></script>
	<script src="<?php echo base_url();?>assests/js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url();?>assests/js/flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url();?>assests/js/flot/jquery.flot.stack.min.js"></script>
    <script src="<?php echo base_url();?>assests/js/flot/jquery.flot.crosshair.min.js"></script>
	<!-- TODO -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/jquery-todo/js/paddystodolist.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/timeago/jquery.timeago.min.js"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/fullcalendar/fullcalendar.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="<?php echo base_url();?>assests/js/gritter/js/jquery.gritter.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>assests/js/script.js"></script>
	<script src="<?php echo base_url();?>assests/js/charts.js"></script>
		<script src="<?php echo base_url();?>assests/js/jquery-validate/jquery.validate.min.js"></script>
<style>
	.error{
	//border: 1px solid red;
	color : red;
	}
	</style>
	</head>
<body>
	<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="<?php echo base_url('store');?>">
						<img src="<?php echo base_url();?>assests/img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" 
							data-icon1="fa fa-bars" 
							data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				</div>
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					
					<li class="dropdown user" style="float:right" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php $storeDetails = $this->session->userdata('storeDetails');?>
							<?php if($storeDetails['image'] != "") { ?>
							<img alt="" src="<?php echo base_url();?>volyty_images/admin_images/<?php echo $storeDetails['image'];?>" />
							<?php } else { ?>
							<img alt="" src="<?php echo base_url();?>assests/img/avatars/avatar3.jpg" />
							<?php } ?>
							<span class="username"><?php echo ucfirst($storeDetails['first_name'])." ".ucfirst($storeDetails['last_name']); ?> </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('store/profile');?>"><i class="fa fa-user"></i> My Profile</a></li>
							<li><a href="<?php echo base_url('store/changePassword');?>"><i class="fa fa-cog"></i> Account Settings</a></li>
							<li><a href="<?php echo base_url('store/logout');?>"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
	</header>
	<section id="page">
<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						
						
						<!-- SIDEBAR MENU -->
						<ul>
							<li class="<?php if($menu && $menu == "dashboard"){ echo "active";} ?>">
								<a href="<?php echo base_url('store/dashboard');?>">
								<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
								<span class="selected"></span>
								</a>		 			
							</li>

							
							<li class="<?php if($menu && $menu == "vouchers"){ echo "active";} ?>">
								<a href="<?php echo base_url('store/voucher');?>">
								<i class="fa fa-tag"></i> <span class="menu-text">Vouchers</span>
								<span class="selected"></span>
								</a>					
							</li> 
							
							
							
							<li class="<?php if($menu && $menu == "sales"){ echo "active";} ?>">
								<a href="<?php echo base_url('sales');?>">
								<i class="fa fa-tag"></i> <span class="menu-text">Sales</span>
								<span class="selected"></span>
								</a>					
							</li>

							<li class="has-sub <?php if($menu && $menu == "redemptions"){ echo "active";} ?>">
								<a href="javascript:;" class="">
								<i class="fa fa-tag"></i> <span class="menu-text">Redemptions</span>
								<span class="arrow"></span>
								</a>	
								<ul class="sub">
									<li><a class="" href="<?php echo base_url('redemptions');?>"><span class="sub-menu-text">Redemptions</span></a></li>
									<li><a class="" href="<?php echo base_url('redemptions/redemptionsHistory');?>"><span class="sub-menu-text">Redemptions History </span></a></li>
								</ul>
							</li>
							<li class="<?php if($menu && $menu == "offers"){ echo "active";} ?>">
								<a href="<?php echo base_url('offers');?>">
								<i class="fa fa-exclamation"></i> <span class="menu-text">Offers</span>
								<span class="selected"></span>
								</a>					
							</li>
							<li class="has-sub <?php if($menu && $menu == "staff"){ echo "active";} ?>">
								<a href="javascript:;">
								<i class="fa fa-users"></i> <span class="menu-text">Staff</span>
								<span class="arrow"></span>
								</a>	
								<ul class="sub">
									<li><a class="" href="<?php echo base_url('store/staff');?>"><span class="sub-menu-text">Staff</span></a></li>
									<li><a class="" href="<?php echo base_url('store/permissions');?>"><span class="sub-menu-text">Permissions </span></a></li>
								</ul>								
							</li>
							
							
							<li class=" <?php if($menu && $menu == "locationSettings"){ echo "active";} ?>">
								<a href="<?php echo base_url('store/branchLocation');?>" class="">
								<i class="fa fa-map-marker fa-fw"></i> <span class="menu-text">Branch Location </span>
								</a>	

							</li>
							<li class="<?php if($menu && $menu == "accounts"){ echo "active";} ?>">
								<a href="<?php echo base_url('accounts');?>">
								<i class="fa fa-credit-card"></i> <span class="menu-text"> Billing </span>
								<span class="selected"></span>
								</a>					
							</li>
							<li class="has-sub <?php if($menu && $menu == "support"){ echo "active";} ?>">
								<a href="javascript:;" class="">
								<i class="fa fa-inbox"></i> <span class="menu-text">Support</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="<?php echo base_url('support/pendingTickets');?>"><span class="sub-menu-text">Pending Tickets</span></a></li>
									<li><a class="" href="<?php echo base_url('support/openTickets');?>"><span class="sub-menu-text">Open Tickets</span></a></li>
									<li><a class="" href="<?php echo base_url('support/closedTickets');?>"><span class="sub-menu-text">Closed Tickets</span></a></li>
								</ul>
							</li>
							
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
   <?php echo $content_for_layout; ?>
<!--/PAGE -->
	<script>
		jQuery(document).ready(function() {		
			App.setPage("flot_charts");  //Set current page
			App.init(); //Initialise plugins and elements
			Charts.initCharts();
			Charts.initPieCharts();
		});
	</script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	
	
	<!-- /JAVASCRIPTS -->
</body>
</html>  