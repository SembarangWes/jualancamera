<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Admin Theme v3</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="<?php echo base_url('assets/')?>css/styles.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login-bg">

<?php $this->load->view('admin/header') ?>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
					<div class="box">
						<div class="content-wrap">
<?php if($this->session->status=='Logged') { ?>
							<h6>Halo, <?php echo $this->session->username ?>!</h6>
							<h5>Anda Login Sebagai,</h5>
							<h4><?php echo $this->session->role ?></h4>
<?php } else { ?>
							<h6>Sign In</h6>
<?php echo form_open('log/login') ?>							
							<input class="form-control" type="text" id="user" name="user"
								pattern="^[^\s]+$" required title="Harap diisi dengan benar"
								placeholder="Masukkan username ...">
							<input class="form-control" type="password" id="pass" name="pass"
								pattern="^[^\s]+$" required title="Harap diisi dengan benar"
								placeholder="Masukkan Password ..." onmousemove="this.type='password'"
								onmousedown="this.type='text'" onmouseup="this.type='password'">
<?php echo $error; ?><br>
							<button type="submit" class="btn btn-primary signup" id="log">Login</button>
<?php echo form_close(); } ?>
						</div>
					</div>

					<div class="already">
						<p>Bukan Administrator?</p>
						<a href="<?php echo site_url('home/') ?>">Kembali ke Web</a>
					</div>

				</div>
			</div>
		</div>
	</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url('assets/')?>js/jquery.js"></script>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url('assets/')?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/custom.js"></script>
</body>
</html>