<!DOCTYPE php>
<html>
	<head>
		<title>Halaman Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- jQuery UI -->
		<link href="<?php echo base_url('assets/')?>css/jquery-ui.css" rel="stylesheet" media="screen">
		<!-- Bootstrap -->
		<link href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- styles -->
		<link href="<?php echo base_url('assets/')?>css/styles.css" rel="stylesheet">

		<!-- CSS Editor -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>

		<!-- CSS Form -->
		<link href="<?php echo base_url('assets/')?>css/fontawesome.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/')?>vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/')?>vendors/select/bootstrap-select.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/')?>vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

		<link href="<?php echo base_url('assets/')?>css/forms.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
  	
<?php $this->load->view('admin/header') ?>

	<div class="page-content">
		<div class="row">

			<div class="col-md-2">
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
						<!-- Main menu -->
						<li><a href="<?php echo site_url('admin/') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
						<li><a href="<?php echo site_url('admin/camera') ?>"><i class="glyphicon glyphicon-camera"></i> Kamera</a></li>
                        <li><a href="<?php echo site_url('admin/category') ?>"><i class="glyphicon glyphicon-list"></i> Kategori</a></li>
                        <li><a href="<?php echo site_url('admin/brand') ?>"><i class="glyphicon glyphicon-copyright-mark"></i> Merek</a></li>
						<li><a href="<?php echo site_url('admin/user') ?>"><i class="glyphicon glyphicon-user"></i> Pengguna</a></li>
                        <li class="current"><a href="<?php echo site_url('admin/transact') ?>"><i class="glyphicon glyphicon-credit-card"></i> Transaksi</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">

                        <div class="content-box-header">
                            <div class="panel-title"><b>Admin / Transaksi</b></div>
                        </div>

						<div class="content-box-large box-with-header">

							<div class="panel-body">
								<div class="row">
									<form class="form-inline" action="<?php echo site_url('admin/transact') ?>" method="post">
									<div class="col-md-6">
										<label for="Cari">Pencarian : </label>
										<select class="form-control" id="kolom" name="kolom">
											<option value="id_transaksi">ID Transaksi</option>
											<option value="nama_user">User</option>
											<option value="bayar">Dibayar</option>
											<option value="status">Diverifikasi</option>
										</select>
										<input class="form-control" type="text" id="search" name="search" value="" placeholder="Search...">
										<button class="btn btn-default" type="submit" name="tombol" value="filter">Go</button>
                                    </div>
									<div class="col-md-6" align="right">
                                        <button class="btn btn-default" type="submit" name="tombol" value="print"><span class="glyphicon glyphicon-print"></span></button>
                                    </div>
                                    </form>
                                </div>

								<table class="table table-striped">
									<thead>
										<th>No</th>
										<th class="text-center">ID Transaksi</th>
                                        <th>User</th>
                                        <th class="text-center">Total Pembayaran</th>
                                        <th class="text-center">Dibayar</th>
                                        <th class="text-center">Diverifikasi</th>
										<th class="text-center">Hapus</th>
									</thead>
<?php if(isset($data)) { ?>
									<tbody>
										<?php foreach($data as $row) { ?>
										<tr>
											<td>
												<?php echo $start+=1 ?>
											</td>
											<td align="center">
												<?php echo $row->id_transaksi ?>
											</td>
											<td>
												<?php echo $row->nama_user ?>
											</td>
											<td align="right">
												Rp. <?php echo number_format( $row->total+ $row->kode_unik,0,",","."); ?>,-
											</td>
											<td align="center">
												<?php if ($row->bayar==true) { ?>
													<a type="button" class="btn btn-link btn-md"><span class="glyphicon glyphicon-check"></span></a>
												<?php } else { ?>
													<a type="button" class="btn btn-link btn-md" href="<?php echo site_url("transact/pay/1/".$row->id_transaksi) ?>"><span class="glyphicon glyphicon-unchecked"></span></a>
												<?php } ?>
											</td>
											<td align="center">
												<?php if ($row->status==true) { ?>
													<a type="button" class="btn btn-link btn-md"><span class="glyphicon glyphicon-check"></span></a>
												<?php } else { ?>
													<a type="button" class="btn btn-link btn-md" href="<?php echo site_url("transact/ver/1/".$row->id_transaksi) ?>"><span class="glyphicon glyphicon-unchecked"></span></a>
												<?php } ?>
											</td>
											<td align="center">
												<a href="<?php echo site_url('transact/destroy/'.$row->id_transaksi) ?>" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
													onclick="return confirm('Apakah anda yakin?')"></a>
											</td>
										</tr>
<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="panel-footer">
<?php echo $links ?>
							</div>

<?php } else {echo "<tr><td colspan='7'><center>Tidak Ada Data!</center></td></tr>";} ?>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php $this->load->view('admin/footer') ?>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url('assets/')?>js/jquery.js"></script>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
		<!-- jQuery UI -->
		<script src="<?php echo base_url('assets/')?>js/jquery-ui.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('assets/')?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/')?>js/custom.js"></script>

		<!-- JS Form -->
		<script src="<?php echo base_url('assets/')?>vendors/select/bootstrap-select.min.js"></script>

		<script src="<?php echo base_url('assets/')?>vendors/tags/js/bootstrap-tags.min.js"></script>

		<script src="<?php echo base_url('assets/')?>vendors/mask/jquery.maskedinput.min.js"></script>

		<script src="<?php echo base_url('assets/')?>vendors/moment/moment.min.js"></script>

		<script src="<?php echo base_url('assets/')?>vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

		<link href="<?php echo base_url('assets/')?>css/bootstrap-editable.css" rel="stylesheet"/>
		<script src="<?php echo base_url('assets/')?>js/bootstrap-editable.min.js"></script>

		<script src="<?php echo base_url('assets/')?>js/forms.js"></script>
  	</body>
</html>