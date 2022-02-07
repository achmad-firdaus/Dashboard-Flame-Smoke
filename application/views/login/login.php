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

	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			background-color: rgba(255, 1, 1, 0.1)
		}

		.card {
			border: none;
			border-radius: 0;
			width: 420px !important;
			margin: 0 auto
		}

		.signup {
			display: flex;
			flex-flow: column;
			justify-content: center;
			padding: 10px 50px
		}

		a {
			text-decoration: none !important
		}

		h5 {
			color: #ff0147;
			margin-bottom: 3px;
			font-weight: bold
		}

		small {
			color: rgba(0, 0, 0, 0.3)
		}

		input {
			width: 100%;
			display: block;
			margin-bottom: 7px
		}

		.form-control {
			border: 1px solid #dc354575;
			border-radius: 30px;
			background-color: rgba(0, 0, 0, .075);
			letter-spacing: 1px
		}

		.form-control:focus {
			border: 0.5px solid #dc354575;
			border-radius: 30px;
			box-shadow: none;
			background-color: rgba(0, 0, 0, .075);
			color: #000;
			letter-spacing: 1px
		}

		.btn {
			display: block;
			width: 100%;
			border-radius: 30px;
			border: none;
			background: linear-gradient(to right, rgba(249, 0, 104, 1) 0%, rgba(247, 117, 24, 1) 100%);
			background: -webkit-linear-gradient(left, rgba(249, 0, 104, 1) 0%, rgba(247, 117, 24, 1) 100%)
		}

		.text-left {
			color: rgba(0, 0, 0, 0.3);
			font-weight: 400
		}

		.text-right {
			color: #ff0147;
			font-weight: bold
		}

		span.text-center {
			color: rgba(0, 0, 0, 0.3)
		}

		.fab {
			padding: 15px;
			font-size: 23px
		}

		.fa-facebook {
			color: #0303d9bf
		}

		.fa-twitter {
			color: #0078fade
		}

		.fa-linkedin {
			color: #18b1c0
		}
	</style>
</head>

<body class="">
	<div class="wrapper ">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mx-auto py-4 px-0">
					<div class="card p-0">
						<div class="card-title text-center">
							<h5 class="mt-5">HEY,</h5> <small class="para">Login to your cool account
								below.</small>
						</div>
						<form class="signup" action="login/singin" method="POST">
							<div class="form-group"><input type="text" class="form-control" placeholder="Username" name="username">
							</div>
							<div class="form-group"><input type="password" class="form-control" placeholder="password" name="password">
							</div> <button type="submit" class="btn btn-primary">Login</button>
							<div class="row mt-3">
								<div class="d-flex mx-auto pt-1 pb-3"> 
                                    <p><?= $this->session->flashdata('message_name'); ?></p>
                                </div>
							</div>
						</form>
					</div>
				</div>
			</div>
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
