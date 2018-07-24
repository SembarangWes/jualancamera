<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bakul'e Kamera :: Tentang</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!-- Custom Theme files -->
	<link href="<?php echo base_url('assets/')?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url('assets/')?>css/style.css" rel="stylesheet" type="text/css" media="all" /> 
	<!-- //Custom Theme files -->
	<!-- font-awesome icons -->
	<link href="<?php echo base_url('assets/')?>css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="<?php echo base_url('assets/')?>js/jquery.min.js"></script> 
	<!-- //js -->  
	<!-- web fonts --> 
	<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //web fonts --> 
	<!-- for bootstrap working -->
	<script type="text/javascript" src="<?php echo base_url('assets/')?>js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling --> 
</head> 
<body> 
	
<?php $this->load->view('header') ?>

	<!-- navigation -->
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo site_url('home') ?>">Beranda</a></li>	
						<!-- Mega Menu -->
						<li class="w3pages"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kamera <span class="caret"></span></a>
							<ul class="dropdown-menu">
							<?php foreach($kategori as $row) { ?>
								<li><a href="products.html"><?php echo $row->nama_kategori ?></a></li>
							<?php } ?>
							</ul>
						</li>
						<li><a href="<?php echo site_url('home/about_us') ?>" class="act">Tentang</a></li> 
						<li><a href="<?php echo site_url('home/mail_us') ?>">Kontak</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>Tentang Kami</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Beranda</a> <i>/</i></li>
				<li>Tentang Kami</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- about -->
	<div class="about">
		<div class="container">	
			<div class="w3ls_about_grids">
				<div class="col-md-6 w3ls_about_grid_left">
					<p>Bakul kamera merupakan salah satu website jual beli kamera untuk memudahkan Anda mendapatkan kamera yang Anda inginkan,
					kami menjual produk asli 100%, ayo wujudkan impian kamera Anda bersama Bakul kamera, dapatkan diskon 10% untuk pembelanjaan kamera Nikon
					.</p>
					
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 w3ls_about_grid_right">
					<img src="<?php echo base_url('assets/')?>images/52.jpg" alt=" " class="img-responsive" />
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about --> 
	<!-- team -->
	<div class="team">
		<div class="container">
			<h3>Tim Kami</h3>
			<div class="wthree_team_grids">
				<div class="col-md-6 wthree_team_grid">
					<img src="<?php echo base_url()?>assets/images/t55.jpg" alt=" " class="img-responsive" />
					<h4>M. Iqbal Maulana<span>Developer</span></h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 wthree_team_grid">
					<img src="<?php echo base_url()?>assets/images/t44.jpg" alt=" " class="img-responsive" />
					<h4>Riza Awwalul Baqy<span>Developer</span></h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //team -->
	<!-- team-bottom -->
	<div class="team-bottom">
		<div class="container">
			<h3>Siap dengan Diskon 30%?</h3>
			<p>Tunggu apa lagi.</p>
			<a href="products.html">Belanja Sekarang</a>
		</div>
	</div>
	<!-- //team-bottom -->

<?php $this->load->view('footer') ?>

	<!-- cart-js -->
	<script src="<?php echo base_url('assets/')?>js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js --> 
</body>
</html>