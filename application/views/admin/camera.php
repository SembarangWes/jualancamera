<!DOCTYPE php>
<html>
	<head>
		<title>Bootstrap Admin Theme v3</title>
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
						<li class="current"><a href="<?php echo site_url('admin/camera') ?>"><i class="glyphicon glyphicon-camera"></i> Kamera</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">

<?php if($page=="create") { // Tampilan Tambah ?>

							<div class="panel-heading">
					            <div class="panel-title">Tambah Kamera</div>
							</div>
							
			  				<div class="panel-body">
<?php echo form_open_multipart('admin/store') ?>
								<fieldset>
									<div class="form-group">
										<label for="Kamera">Kamera :</label>
										<input type="text" class="form-control" id="kamera" name="kamera"
											pattern="[A-Za-z0-9-]{1,50}" title="Harap diisi dengan angka dan/atau huruf"
											placeholder="Nama Kamera/Jenis Kamera/Tipe Kamera ..."
											value="<?php echo set_value('kamera') ?>">  
									</div>
									<div class="form-group">
										<label for="Foto">Foto / Gambar :</label>
										<input type="file" id="foto" name="foto" size="20" accept="image/*">
									</div>
									<div class="form-group">
										<label for="Spesifikasi">Spesifikasi :</label>
										<textarea id="bootstrap-editor" style="width:98%;height:200px;" id="spesifikasi"
											name="spesifikasi" pattern="{1,1000}" title="Harap diisi dengan angka dan/atau huruf"
											placeholder="Masukkan Spesifikasi ...">
											<?php echo set_value('spesifikasi') ?>
										</textarea>
									</div>
									<div class="form-group">
										<label for="Harga">Harga (Rp.) :</label>
										<input type="number" class="form-control" id="harga" name="harga"
											pattern="[0-9]{1,15}" title="Harap diisi dengan angka"
											placeholder="Masukkan Harga ..."
											value="<?php echo set_value('harga') ?>">  
									</div>
									<div class="form-group">
										<label for="Stok">Stok Kamera :</label>
										<input type="number" class="form-control" id="stok" name="stok"
											pattern="[0-9]{1,5}" title="Harap diisi dengan angka"
											placeholder="Masukkan Jumlah Stok ..."
											value="<?php echo set_value('stok') ?>">  
									</div>
<?php echo $error ?>
								</fieldset>
							</div>
							<div>
								<button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
							</div>
<?php
	
	echo form_close(); }
	elseif ($page=="edit") { // Tampilan Edit
?>
							<div class="panel-heading">
					            <div class="panel-title">Edit Kamera</div>
							</div>
							
			  				<div class="panel-body">
<?php echo form_open_multipart('admin/update/'.$dataid->id_kamera) ?>
								<fieldset>
<?php echo form_hidden('id', $dataid->id_kamera) ?>
									<div class="form-group">
										<label for="Kamera">Kamera :</label>
										<input type="text" class="form-control" id="kamera" name="kamera"
											pattern="[A-Za-z0-9-]{1,50}" title="Harap diisi dengan angka dan/atau huruf"
											placeholder="Nama Kamera/Jenis Kamera/Tipe Kamera ..."
											value="<?php echo $dataid->nama_kamera ?>">  
									</div>
									<div class="form-group">
										<label for="Foto">Foto / Gambar :</label>
										<input type="file" id="foto" name="foto" size="20" accept="image/*">
									</div>
									<div class="form-group">
										<label for="Spesifikasi">Spesifikasi :</label>
										<textarea id="bootstrap-editor" style="width:98%;height:200px;" id="spesifikasi"
											name="spesifikasi" pattern="{1,1000}" title="Harap diisi dengan angka dan/atau huruf"
											placeholder="Masukkan Spesifikasi ...">
											<?php echo $dataid->spesifikasi ?>
										</textarea>
									</div>
									<div class="form-group">
										<label for="Harga">Harga (Rp.) :</label>
										<input type="number" class="form-control" id="harga" name="harga"
											pattern="[0-9]{1,15}" title="Harap diisi dengan angka"
											placeholder="Masukkan Harga ..."
											value="<?php echo $dataid->harga ?>">  
									</div>
									<div class="form-group">
										<label for="Stok">Stok Kamera :</label>
										<input type="number" class="form-control" id="stok" name="stok"
											pattern="[0-9]{1,5}" title="Harap diisi dengan angka"
											placeholder="Masukkan Jumlah Stok ..."
											value="<?php echo $dataid->stok; ?>">  
									</div>
<?php if($error != 'null') {echo $error;} ?>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" id="ubah">Ubah</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
							</div>

<?php echo form_close(); } else { ?> <!-- Daftar Tabel -->

							<div class="panel-heading">
								<div class="panel-title"><legend>Daftar Kamera</legend></div>
							</div>

							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<th>No</th>
										<th width="200">Kamera</th>
										<th>Spesifikasi</th>
										<th>Harga</th>
										<th>Stok</th>
										<th>
											<a href="<?php echo site_url('admin/camera/create') ?>" type="button" class="btn btn-info btn-sm">Tambah</a>
										</th>
									</thead>
									<tbody>
										<?php foreach($data as $row) { ?>
										<tr>
										<td>
											<?php echo $start+=1 ?>
										</td>
										<td>
											<img src="<?php echo base_url('assets/uploads/').$row->foto_kamera ?>"style="display:block; width:100%; height:100%;">
											<b><?php echo $row->nama_kamera ?></b>
										</td>
										<td>
											<!--Tombol Modal Detail-->
											<a href="#bannerformmodal" data-toggle="modal" data-target="#modalDetail">Detail</a>
											
<!-- Modal Detail -->
<div id="modalDetail" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detail Spesifikasi Kamera</h4>
			</div>
			<div class="modal-body">
				<?php echo $row->spesifikasi ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
			</div>
		</div>

	</div>
</div>
<!-- Tutup Modal Detail-->

										</td>
										<td>
											<?php echo $row->harga ?>
										</td>
										<td>
											<?php echo $row->stok ?>
										</td>
										<td>
											<?php echo form_open('admin/destroy/'.$row->id_kamera); ?>
											<a href="<?php echo site_url('admin/camera/edit/null/'.$row->id_kamera) ?>" type="button" class="btn btn-info btn-sm">Ubah</a>
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
											<?php echo form_close() ?>
										</td>
										</tr>
										<?php } echo $error ?>
									</tbody>
								</table>
<?php echo $links ?>
							</div>

<?php } ?>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php $this->load->view('admin/footer') ?>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url('assets/')?>js/jquery.js"></script>
		<!-- jQuery UI -->
		<script src="<?php echo base_url('assets/')?>js/jquery-ui.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('assets/')?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/')?>js/custom.js"></script>
		
		<!-- JS Editor -->
	    <script src="<?php echo base_url('assets/')?>js/editors.js"></script>

		<script src="<?php echo base_url('assets/')?>vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    	<script src="<?php echo base_url('assets/')?>vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

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