<!-- header modal -->
<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

<?php if($this->session->status=='Logged') { ?>

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Halo, <?php echo $this->session->username ?>!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-6 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Status</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Edit Data</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form action="<?php echo site_url("log/logout") ?>" method="post">			
													Anda Login Sebagai, <?php echo $this->session->role ?>.<br>
													<input type="submit" value="Keluar"/>
												</form>
											</div>
										</div> 
									</div>	 
									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
												<form action="<?php echo site_url('user/update/').$user->id_user ?>" method="post">
													<input type="text" class="form-control" id="name" name="name"
														pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
														placeholder="Masukkan nama ..." value="<?php echo $user->nama_user ?>"><br>
													<textarea type="text" class="form-control" id="alamat" name="alamat"
														pattern="{1,1000}" required title="Harap diisi"
														placeholder="Masukkan alamat ..."><?php echo $user->alamat ?></textarea><br>
													<input type="number" class="form-control" id="hp" name="hp"
														pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
														placeholder="Masukkan nomer handphone ..." value="<?php echo $user->no_hp ?>">
													<input type="email" class="form-control" id="email" name="email"
														pattern="{1,50}" required title="Harap diisi"
														placeholder="Masukkan email ..." value="<?php echo $user->email ?>">
													<input type="password" class="form-control" id="pass" name="pass"
														pattern=".{8,}" required title="Harap diisi sebanyak 8 karakter"
														maxlength="8" placeholder="Masukkan password ..." onmousemove="this.type='password'"
														onmousedown="this.type='text'" onmouseup="this.type='password'"
														value="<?php echo $user->password ?>">
													<font color="#808080">Klik untuk melihat</font>
													<input type="hidden" id="role" name="role" value="Pengguna">
													<div class="sign-up">
														<input type="submit" value="Ubah Data"/>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>	
							</div>
							<script src="<?php echo base_url('assets/')?>js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							</script>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<table>
										<thead>
											<th>No.</th>
											<th></th>
										</thead>
										<tbody>
											<tr>
												<td>

												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php } else {?>

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Daftar Sekarang!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Masuk</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Daftar</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form action="<?php echo site_url("log/login") ?>" method="post">			
													<input class="form-control" type="text" id="user" name="user"
														pattern="^[^\s]+$" required title="Harap diisi dengan benar"
														placeholder="Masukkan username ...">
													<input class="form-control" type="password" id="pass" name="pass"
														pattern="^[^\s]+$" required title="Harap diisi dengan benar"
														placeholder="Masukkan Password ..." onmousemove="this.type='password'"
														onmousedown="this.type='text'" onmouseup="this.type='password'">
													<div class="sign-up">
														<input type="submit" value="Masuk"/>
													</div>
												</form>
											</div>
										</div> 
									</div>	 
									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
												<form action="<?php echo site_url("user/store") ?>" method="post">			
													<input type="text" class="form-control" id="name" name="name"
														pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
														placeholder="Masukkan nama ..."><br>
													<textarea type="text" class="form-control" id="alamat" name="alamat"
														pattern="{1,1000}" required title="Harap diisi"
														placeholder="Masukkan alamat ..."></textarea><br>
													<input type="number" class="form-control" id="hp" name="hp"
														pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
														placeholder="Masukkan nomer handphone ...">
													<input type="email" class="form-control" id="email" name="email"
														pattern="{1,50}" required title="Harap diisi"
														placeholder="Masukkan email ...">
													<input type="password" class="form-control" id="pass" name="pass"
														pattern=".{8,}" required title="Harap diisi sebanyak 8 karakter"
														maxlength="8" placeholder="Masukkan password ..." onmousemove="this.type='password'"
														onmousedown="this.type='text'" onmouseup="this.type='password'">
													<font color="#808080">Klik untuk melihat</font>
													<input type="hidden" id="role" name="role" value="Pengguna">
													<div class="sign-up">
														<input type="submit" value="Buat Akun"/>
													</div>
												</form>
											</div>
										</div>
									</div> 			        					            	      
								</div>	
							</div>
							<script src="<?php echo base_url('assets/')?>js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							</script>
							<div id="OR" class="hidden-xs">|</div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<h3 class="other-nw">Masuk dengan</h3>
								</div>
								<div class="col-md-12">
									<ul class="social">
										<li class="social_facebook"><a href="http//:facebook.com" class="entypo-facebook"></a></li>
										<li class="social_dribbble"><a href="http//:google.com" class="entypo-dribbble"></a></li>
										<li class="social_twitter"><a href="http//:twitter.com" class="entypo-twitter"></a></li>
										<li class="social_behance"><a href="http//:pinterest.com" class="entypo-behance"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php } ?>

			</div>
		</div>
	</div>  
	<!-- header modal -->
	<!-- header -->
	<div class="header" id="home1">
		<div class="container">
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
			<div class="w3l_logo">
				<h1><a href="<?php echo site_url('home') ?>">Bakul Kamera<span>Bakul'e Kameramu</span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<form action="<?php echo site_url("home/products")?>" method="post">
						<input type="hidden" name="kolom" value="nama_kamera">
						<input type="text" name="search" placeholder="Cari...">
						<input type="submit" value="Kirim">
					</form>
				</div>
			</div>
			<div class="w3l_login" style="margin-left:12em;">
				<a href="<?php echo site_url("shop/cart")?>"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
			</div>
		</div>
	</div>
<!-- //header -->