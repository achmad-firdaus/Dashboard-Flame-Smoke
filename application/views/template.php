<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Paper Dashboard 2 by Creative Tim
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
		name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<!-- CSS Files -->
	<!-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" /> -->
	<!-- <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" /> -->
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/css/paper-dashboard.css?v=2.0.1">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
	<link rel="stylesheet" type="text/css" href="<? echo base_url();?>assets/demo/demo.css">
	<!-- Ajx -->
	<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet" />
	
</head>

<body class="">
	<div class="wrapper ">
		<div class="sidebar" data-color="white" data-active-color="danger">
			<div class="logo">
				<a href="https://thirtysevenprojects.com/" class="simple-text logo-mini">
					<div class="logo-image-small">
						<!-- <img src="../assets/img/logo-small.png"> -->
					</div>
					<!-- <p>CT</p> -->
				</a>
				<a href="https://thirtysevenprojects.com/" class="simple-text logo-normal">
					MENU
					<!-- <div class="logo-image-big">
						<img src="../assets/img/logo-big.png">
					</div> -->
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="<?=$active=='dashboard'?'active':''?>">
						<a href="<?= base_url('dashboard')?>">
							<i class="nc-icon nc-tv-2"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="<?=$active=='users'?'active':''?>">
						<a href="<?= base_url('users')?>">
							<i class="nc-icon nc-single-02"></i>
							<p>Users</p>
						</a>
					</li>
					<li class="<?=$active=='report'?'active':''?>">
						<a href="<?= base_url('report')?>">
							<i class="nc-icon nc-tile-56"></i>
							<p>Report</p>
						</a>
					</li>
					<li>
						<a href="<?= base_url('login')?>">
							<i class="nc-icon nc-lock-circle-open"></i>
							<p>Logout</p>
						</a>
					</li>
					<li class="active-pro">
						<a href="./upgrade.html">
							<!-- <i class="nc-icon nc-spaceship"></i> -->
							<!-- <p>Upgrade to PRO</p> -->
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel" style="display:block;height:100%;overflow:scroll;">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<div class="navbar-toggle">
							<button type="button" class="navbar-toggler">
								<span class="navbar-toggler-bar bar1"></span>
								<span class="navbar-toggler-bar bar2"></span>
								<span class="navbar-toggler-bar bar3"></span>
							</button>
						</div>
						<a class="navbar-brand" href="javascript:;"><?= $title; ?></a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
						aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
						<span class="navbar-toggler-bar navbar-kebab"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<!-- <form>
							<div class="input-group no-border">
								<input type="text" value="" class="form-control" placeholder="Search...">
								<div class="input-group-append">
									<div class="input-group-text">
										<i class="nc-icon nc-zoom-split"></i>
									</div>
								</div>
							</div>
						</form> -->
						<ul class="navbar-nav">
							<!-- <li class="nav-item">
								<a class="nav-link btn-magnify" href="javascript:;">
									<i class="nc-icon nc-layout-11"></i>
									<p>
										<span class="d-lg-none d-md-block">Stats</span>
									</p>
								</a>
							</li>
							<li class="nav-item btn-rotate dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com"
									id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									<i class="nc-icon nc-bell-55"></i>
									<p>
										<span class="d-lg-none d-md-block">Some Actions</span>
									</p>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li> -->
							<!-- <li class="nav-item">
								<a class="nav-link btn-rotate" href="javascript:;">
									<i class="nc-icon nc-settings-gear-65"></i>
									<p>
										<span class="d-lg-none d-md-block">Account</span>
									</p>
								</a>
							</li> -->
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
			<?php $this->load->view($view, true); ?>
			<!-- Start Body -->
			<!-- End Body -->
			<footer class="footer footer-black  footer-white " style="position: fixed;bottom: 0;">
				<div class="container-fluid">
					<div class="row">
						<nav class="footer-nav">
							<ul>
								<li><a href="https://thirtysevenprojects.com/" target="_blank">Thirtysevenprojects</a></li>
							</ul>
						</nav>
						<div class="credits ml-auto">
							<span class="copyright">
								© <script>
									document.write(new Date().getFullYear())
								</script>, made with <i class="fa fa-heart heart"></i> by Thirtysevenprojects
							</span>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<!-- AJAX -->
	<!-- <script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<!--   Core JS Files   -->
	<!-- <script src="../assets/js/core/jquery.min.js"></script> -->
	<!-- <script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
	<script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

	<!--  Google Maps Plugin    -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
	<!-- Chart JS -->
	<!-- <script src="../assets/js/plugins/chartjs.min.js"></script> -->
	<script src="<?php echo base_url();?>assets/js/plugins/chartjs.min.js"></script>
	<!--  Notifications Plugin    -->
	<!-- <script src="../assets/js/plugins/bootstrap-notify.js"></script> -->
	<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
	<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
	<!-- <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script> -->
	<!-- <script src="<?php echo base_url();?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script> -->
	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<!-- <script src="../assets/demo/demo.js"></script> -->
	<script src="<?php echo base_url();?>assets/demo/demo.js"></script>

	<?php foreach($addJs as $addJs){
            echo "<script src='".base_url().$addJs."' type='text/javascript'></script>";
	}?>
	<!-- <script src="<?php echo base_url();?>assets/js/view-dashboard.js"></script> -->

</body>

</html>
