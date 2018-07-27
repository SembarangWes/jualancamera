<!-- newsletter -->
	<div class="clearfix"> </div>
	<br>
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Buletin</h3>
				<p>Bakul KAMERA</p>
			</div>
			<div class="col-md-6 w3agile_newsletter_right">
				<form action="" method="post">
					<input type="email" name="Email" placeholder="Email" required="" disabled>
					<input type="submit" value="" disabled/>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Kontak</h3>
					<p>Hubungi Kami</p>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>JL SOEKARNO HATTA 999999, <span>INDONESIA.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">BAKULKAMERA@Xmple.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+6281230104854</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Informasi</h3>
					<ul class="info"> 
						<li><a href="<?php echo site_url('home/about_us') ?>">Tentang Kami</a></li>
						<li><a href="<?php echo site_url('home/mail_us') ?>">Hubungi Kami</a></li>
						<li><a href="faq.html">FAQ</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Kategori</h3>
					<ul class="info"> 
					<?php $a=0; foreach($kategori as $kat) { ?>
						<li><a href="<?php echo site_url('home/products/nama_kategori/').$kat->nama_kategori ?>"><?php echo $kat->nama_kategori ?> </a></li>
					<?php $a++; if($a==5){break;} } ?>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profil</h3>
					<ul class="info"> 
						<li><a href="<?php echo site_url('home') ?>">Beranda</a></li>
					</ul>
					<h4>Ikuti Kami</h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="http://facebook.com" class="facebook"> </a></li>
							<li><a href="http://twitter.com" class="twitter"> </a></li>
							<li><a href="http://google.com" class="google"> </a></li>
							<li><a href="http://pinterest.com" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="footer-copy1">
				<div class="footer-copy-pos">
					<a href="<?php echo site_url('home') ?>" class="scroll"><img src="<?php echo base_url('assets/')?>images/arrow.png" alt=" " class="img-responsive" /></a>
				</div>
			</div>
			<div class="container">
				<p>&copy; 2018 BAKUL KAMERA. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
	<!-- //footer --> 