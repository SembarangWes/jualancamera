<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bakul'e Kamera :: Keranjang Belanja</title>
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
	<div class="banner banner10">
		<div class="container">
			<h2>Keranjang</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Beranda</a> <i>/</i></li>
				<li><?php if($page=='confirm'){echo'Konfirmasi Pemesanan';}elseif($page=='pay'){echo'Pembayaran';}else{echo'Keranjang Belanja';} ?></li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">

<?php if($page=='confirm') { //KONFIRMASI PESANAN ?>

					<div class="additional_info_grid">
						<h3>Konfirmasi Pemesanan</h3>
                        <p>
                            <table class="table" border="0" style="white-space: nowrap; width: 1%;">
                                <tbody>
                                    <tr>
                                        <td>Nama Pemesan</td>
                                        <td>:</td>
                                        <td><b><?php echo $user->nama_user ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Pengiriman</td>
                                        <td>:</td>
                                        <td><b><?php echo $user->alamat ?></b></td>
									</tr>
										<td>Kontak Telepon (Email)</td>
										<td>:</td>
										<td><b><?php echo $user->no_hp ?> (<?php echo $user->email ?>)</b></td>
                                </tbody>
                            </table>
						</p>
						<br>
                        <p>
                            <table class="table table-bordered">
                                <thead>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Kamera</th>
                                    <th class="text-center">Jumlah Pembelian</th>
                                    <th class="text-center">Harga Satuan </th>
                                    <th class="text-center">Total Harga</th>
                                </thead>
                                <tbody>
<?php if(!empty($carts)) { $a=0; foreach ($carts as $c) { ?>
									<tr>
										<td align="center"><?php echo $a++ ?></td>
										<td><?php echo $c['name'] ?></td>
										<td align="right"><?php echo $c['qty'] ?> buah</td>
										<td align="right">Rp. <?php echo number_format($c['price'],0,",","."); ?>,-</td>
										<td align="right">Rp. <?php echo number_format($c['price']*$c['qty'],0,",","."); ?>,-</td>
									</tr>
<?php } } else { ?>
									<tr>
										<td colspan='6'><center>Keranjang Anda kosong.</center></td>
									</tr>								
<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<td align="center">##</td>
										<td colspan="3"><h4><b>Total</b></h4></td>
										<td align="right"><h4><b>Rp. <?php echo number_format($this->cart->total(),0,",","."); ?>,-</b></h4></td>
									</tr>
								</tfoot>
                            </table>
                            <div class="row">
								<div class="col-sm-6 text-left">
								<button onclick="history.go(-1);" class="btn btn-primary"><span class="glyphicon glyphicon-hand-left"> Kembali</span></a>
								</div>
								<div class="col-sm-6 text-right">
                                	<a type="button" href="<?php echo site_url("shop/payment") ?>" class="btn btn-success" ><span class="fa fa-money"></span> Pembayaran <span class="fa fa-money"></span></a>
								</div>
							</div>
							<br>
                        </p>
					</div>

<?php } elseif ($page=='pay') { //PEMBAYARAN ?>

					<div class="additional_info_grid">
						<h3>Pembayaran</h3>
						<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Selamat!</strong> Pembelian Anda Berhasil!
						</div>
                        <p>
							<center>
								<br><h4><b>TERIMA KASIH TELAH BERBELANJA
								<br>DI BAKUL KAMERA.</b></h4>
								<br>
								<table class="table" style="white-space: nowrap; width: 1%;">
									<tbody>
										<tr>
											<td>ID Transaksi</td>
											<td>:</td>
											<td align="right"><b><?php echo $id ?></b></td>
										</tr>
										<tr>
											<td>Total Pembelian</td>
											<td>:</td>
											<td align="right"><b>Rp. <?php echo number_format($total,0,",","."); ?>,-</b></td>
										</tr>
										<tr>
											<td>Kode Unik</td>
											<td>:</td>
											<td align="right"><?php echo $kode ?></td>
										</tr>
										<tr>
											<td>Total Pembayaran</td>
											<td>:</td>
											<td align="right"><b>Rp. <?php echo number_format($total+$kode,0,",","."); ?>,-</b></td>
										</tr>
									</tbody>
								</table>
								<br>
								<hr>
								<br>
								<a type="button" href="<?php echo site_url("transact/pay/1/").$id?>" class="btn btn-link">Konfirmasi Pembayaran</a>
							</center>
                        </p>
					</div>

<?php } else { //KERANJANG ?>

<div class="additional_info_grid">
						
						<h3>Keranjang Belanja</h3>
                        <p>
                            <table class="table table-bordered">
                                <thead>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama Kamera</th>
                                    <th class="text-center">Jumlah Pembelian</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <th class="text-center">Total Harga</th>
                                    <th class="text-center">Hapus</th>
								</thead>
                                <tbody>
<?php if(!empty($carts)) { $d=''; $a=0; foreach ($carts as $c) {$a++; ?>
									<tr>
										<td align="center"><?php echo $a ?></td>
										<td><a href="<?php echo site_url("home/show/").$c['id'] ?>"><?php echo $c['name'] ?></a></td>
										<td align="center"><?php echo $c['qty'] ?> Buah</td>
										<td align="right">Rp. <?php echo number_format($c['price'],0,",","."); ?>,-</td>
										<td align="right">Rp. <?php echo number_format($c['price']*$c['qty'],0,",","."); ?>,-</td>
										<td align="center"><a href="<?php echo site_url('shop/cancel/'.$c['rowid']) ?>" type="button" class="btn btn-danger btn-sm">X</a></td>
									</tr>
<?php } } else { $d='disabled' ?>
									<tr>
										<td colspan='6'><center>Keranjang Anda kosong.</center></td>
									</tr>								
<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<td align="center">##</td>
										<td colspan="3"><h4><b>Total</b></h4></td>
										<td align="right"><h4><b>Rp. <?php echo number_format($this->cart->total(),0,",","."); ?>,-</b></h4></td>
										<td align="center"><a href="<?php echo site_url('shop/cancel/') ?>delete" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
									</tr>
								</tfoot>
                            </table>
                            <div class="row">
								<div class="col-sm-6 text-left">
									<button onclick="history.go(-1);" class="btn btn-warning"><span class="glyphicon glyphicon-hand-left"> Kembali</span></a>
								</div>
								<div class="col-sm-6 text-right">
									<a type="button" href="<?php echo site_url("shop/confirm") ?>" class="btn btn-primary" <?php echo $d; ?>>Lanjutkan <span class="glyphicon glyphicon-hand-right"></span></a>
								</div>
							</div>
							<br>
						</p>
					</div>

<?php } ?>

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