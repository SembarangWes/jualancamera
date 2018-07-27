<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bakul'e Kamera :: Detail Kamera</title>
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
						<li><a href="<?php echo site_url('home/products') ?>" class="act">Kamera</a></li>
						<li><a href="<?php echo site_url('home/about_us') ?>">Tentang</a></li> 
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
			<h2>Detail Kamera</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Beranda</a> <i>/</i></li>
				<li>Detail Kamera</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="<?php echo base_url('assets/uploads/').$kamerow->foto_kamera ?>">
							<div class="thumb-image"> <img src="<?php echo base_url('assets/uploads/').$kamerow->foto_kamera ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="<?php echo base_url('assets/')?>js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="<?php echo base_url('assets/')?>js/imagezoom.js"></script>
                <!-- //zooming-effect -->
			</div>

			<div class="col-md-8 single-right">
				<h3><?php echo $kamerow->nama_kamera ?></h3>
				<div class="color-quality">					
					<div class="color-quality-left">
						<br>
						<h5>Stok : <?php echo $kamerow->stok ?></h5>
						<form action="<?php echo site_url("shop/add") ?>" method="post">
						<h5>Jumlah : <br><br>
							<input type="number" maxlength="3" size="3" id="jumkam" name="jumkam"
							value=
							"<?php $q='';
								foreach ($cart as $c)
								{
									if ($c['id'] == $kamerow->id_kamera)
									{ $q=$c['qty'];}
								}
								if ($q!='') {echo $q;} else {echo 1;}
							?>"
							min="1" max="<?php echo $kamerow->stok ?>" required class="form-control">
						</h5>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="simpleCart_shelfItem">
					<p><i class="item_price">Rp. <?php echo number_format($kamerow->harga,0,",","."); ?>,-</i></p>
					
						<input type="hidden" name="idkam" id="idkam" value="<?php echo $kamerow->id_kamera ?>">
						<input type="hidden" name="namkam" value="<?php echo $kamerow->nama_kamera ?>">
						<input type="hidden" name="harga" value="<?php echo $kamerow->harga ?>">   
						<button type="submit" class="btn">Tambahkan</button>
					</form>
				</div> 
			</div>
		</div>
    </div> 
    
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Informasi Produk</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Komentar</span></li>
                    </ul>		
                    
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3><?php echo $kamerow->nama_kamera ?></h3>
						<p><?php echo $kamerow->spesifikasi ?></p>
					</div>	

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
                        <h4>2 Komentar</h4>
                        
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="<?php echo base_url('assets/')?>images/t1.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Laura</a>
									<h5>Oct 06, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
                        </div>
                        
						<div class="review_grids">
							<h5>Add A Review</h5>
							<form action="#" method="post">
								<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="email" name="Email" placeholder="Email" required="">
								<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
								<textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
								<input type="submit" value="Submit" >
							</form>
                        </div>
                        
                    </div> 			        					            	      
                    
				</div>	
			</div>
			<script src="<?php echo base_url('assets/')?>js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>
	<!-- //single -->

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