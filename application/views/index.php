<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bakul'e Kamera :: Beranda</title>
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
	<link href="<?php echo base_url('assets/')?>css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo base_url('assets/')?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- font-awesome icons -->
	<link href="<?php echo base_url('assets/')?>css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="<?php echo base_url('assets/')?>js/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/jquery.countdown.css" /> <!-- countdown --> 
	<!-- //js -->  
	<!-- web fonts --> 
	<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- //web fonts -->  
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
	<!-- for bootstrap working -->
	<script type="text/javascript" src="<?php echo base_url('assets/')?>js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->

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
						<li><a href="<?php echo site_url('home') ?>" class="act">Beranda</a></li>
						<li><a href="<?php echo site_url('home/products') ?>">Kamera</a></li>
						<li><a href="<?php echo site_url('home/about_us') ?>">Tentang</a></li> 
						<li><a href="<?php echo site_url('home/mail_us') ?>">Kontak</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<h3>Bakul Kamera, <span></span></h3>
		</div>
	</div>
	<!-- //banner --> 
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-5 wthree_banner_bottom_left">
				<div class="video-img">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
						<span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
					</a>
				</div> 
					<!-- pop-up-box -->     
					<script src="<?php echo base_url('assets/')?>js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!--//pop-up-box -->
					<div id="small-dialog" class="mfp-hide">
						<iframe src="https://www.youtube.com/embed/ZQa6GUVnbNM"></iframe>
					</div>
					<script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
					</script>
			</div>
			<div class="col-md-7 wthree_banner_bottom_right">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">

<?php $a=1; $b=""; foreach($kategori as $row) { if($a==1) { $b="class='active'"; } else { $b=""; } $a++; ?>

						<li role="presentation" <?php echo $b; ?>><a href="#<?php echo $row->nama_kategori.$row->id_kategori ?>" id="<?php echo $row->id_kategori ?>" role="tab" data-toggle="tab" aria-controls="home"><?php echo $row->nama_kategori ?></a></li>

<?php } ?>

					</ul>
					
					<div id="myTabContent" class="tab-content">

<?php  $x=1; $y=""; foreach($kategori as $row) { if($x==1) { $y="active in"; } else { $y=""; } $x++; ?>

						<div role="tabpanel" class="tab-pane fade <?php echo $y; ?>" id="<?php echo $row->nama_kategori.$row->id_kategori ?>" aria-labelledby="<?php echo $row->nama_kategori ?>-tab">
							<div class="agile_ecommerce_tabs">

<?php $a=0; foreach($kamera as $kam) { if($kam->id_kategori==$row->id_kategori) { ?>

								<div class="col-md-4 agile_ecommerce_tab_left">
									<div class="hs-wrapper">
									<?php for ($i = 0; $i < 8; $i++) { ?>
										<img src="<?php echo base_url('assets/uploads/').$kam->foto_kamera ?>" alt=" " class="img-responsive" />\
									<?php } ?>
										<div class="w3_hs_bottom">
											<ul>
												<li>
													<a href="<?php echo site_url("home/show/").$kam->id_kamera ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
												</li>
											</ul>
										</div>
									</div> 
									<h5><a href="<?php echo site_url("home/show/").$kam->id_kamera ?>"><?php echo $kam->nama_kamera ?></a></h5>
									<div class="simpleCart_shelfItem">
										<p><i class="item_price">Rp. <?php echo number_format($kam->harga,0,",","."); ?>,-</i></p>
										<form action="<?php echo site_url("shop/add") ?>" method="post">
											<input type="hidden" name="idkam" id="idkam" value="<?php echo $kam->id_kamera ?>" />
											<input type="hidden" name="namkam" id="namkam" value="<?php echo $kam->nama_kamera ?>" />
											<input type="hidden" name="harga" id="harga" value="<?php echo $kam->harga ?>" />
											<input type="hidden" name="jumkam" id="jumkam" value="1" />  
											<button type="submit" class="w3ls-cart">Tambahkan</button>
										</form>
									</div>
								</div>

<?php if($a<3){ $a++; } else { break; } } } ?>

							</div>
						</div>

<?php } ?>

					</div>
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //banner-bottom -->

	<!-- new-products -->
	<div class="new-products">
		<div class="container">
			<h3>Produk Baru</h3>
			<div class="agileinfo_new_products_grids">

<?php foreach($kamorder as $row) { ?>

				<div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="<?php echo base_url('assets/uploads/').$row->foto_kamera ?>" alt=" " class="img-responsive" />
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
									<a href="<?php echo site_url("home/show/").$row->id_kamera ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="<?php echo site_url("home/show/").$row->id_kamera ?>"><?php echo $row->nama_kamera ?></a></h5>
						<div class="simpleCart_shelfItem">
							<p><i class="item_price">Rp. <?php echo number_format($row->harga,0,",","."); ?>,-</i></p>
							<form action="<?php echo site_url("shop/add") ?>" method="post">
								<input type="hidden" name="idkam" id="idkam" value="<?php echo $row->id_kamera ?>" />
								<input type="hidden" name="namkam" id="namkam" value="<?php echo $row->nama_kamera ?>" />
								<input type="hidden" name="harga" id="harga" value="<?php echo $row->harga ?>" />
								<input type="hidden" name="jumkam" id="jumkam" value="1" />  
								<button type="submit" class="w3ls-cart">Tambahkan</button>
							</form>
						</div>
					</div>
				</div>

<?php if($a<4){ $a++; } else { break; } } ?>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //new-products -->

	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">			

<?php foreach($merek as $m) { ?>

					<li>
						<img src="<?php echo base_url('assets/uploads/').$m->foto_merek ?>" alt=" " class="img-responsive" />
					</li>

<?php } ?>

				</ul>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="<?php echo base_url('assets/')?>js/jquery.flexisel.js"></script>
		</div>
	</div>
	<!-- //top-brands --> 
	
<?php $this->load->view('footer'); ?>

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