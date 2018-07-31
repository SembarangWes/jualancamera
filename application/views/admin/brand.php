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
						<li class="current"><a href="<?php echo site_url('admin/brand') ?>"><i class="glyphicon glyphicon-copyright-mark"></i> Merek</a></li>
                        <li><a href="<?php echo site_url('admin/user') ?>"><i class="glyphicon glyphicon-user"></i> Pengguna</a></li>
						<li><a href="<?php echo site_url('admin/transact') ?>"><i class="glyphicon glyphicon-credit-card"></i> Transaksi</a></li>
					</ul>
				</div>
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
                        <li><a href="<?php echo site_url('admin/report') ?>"><i class="glyphicon glyphicon-book"></i> Laporan</a></li>
                    </ul>
				</div>
			</div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">

                        <div class="content-box-header">
                            <div class="panel-title"><b>Admin / Merek</b></div>
                        </div>

						<div class="content-box-large box-with-header">

							<div class="panel-body">

								<form class="form-inline" action="<?php echo site_url('admin/brand') ?>" method="post">
									<label for="Cari">Pencarian : </label>
									<input class="form-control" type="text" id="search" name="search" value="" placeholder="Search...">
									<input class="btn btn-default" type="submit" name="filter" value="Go">
								</form>

								<table class="table table-striped">
									<thead>
                                        <th>No</th>
                                        <th>Nama Merek</th>
										<th width="250">Gambar Merek</th>
										<th>
                                            <!-- Tombol Modal Tambah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-plus" data-toggle="modal" data-target="#ModalTambah"> Tambah</button>

<!-- Modal Tambah -->
<div id="ModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><legend>Tambah Merek</legend></h4>
            </div>
            <div class="modal-body">
<?php echo form_open_multipart('brand/store') ?>
                <fieldset>
                    <div class="form-group">
                        <label for="Name">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ...">  
                    </div>
                    <div class="form-group">
                        <label for="Foto">Foto / Gambar :</label>
                        <input type="file" id="foto" name="foto" size="20" accept="image/*">
<?php if(isset($error)) { echo $error; } ?>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            </div>
<?php echo form_close() ?>
        </div>

    </div>
</div>
<!-- Tutup Modal Tambah -->

										</th>
									</thead>
<?php if(isset($data)) { ?>
									<tbody>
<?php foreach($data as $row) { ?>
										<tr>
										<td>
											<?php echo $start+=1 ?>
										</td>
										<td>
											<?php echo $row->nama_merek ?>
										</td>
                                        <td>
                                            <img src="<?php echo base_url('assets/uploads/').$row->foto_merek ?>"style="display:block; width:100%; height:100%;">
										</td>
										<td>
                                            <!-- Tombol Modal Ubah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalUbah<?php echo $row->id_merek ?>"></button>

<!-- Modal Ubah -->
<div id="ModalUbah<?php echo $row->id_merek ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><legend>Edit Merek</legend></h4>
            </div>
            <div class="modal-body">
<?php echo form_open_multipart('brand/update/'.$row->id_merek); echo form_hidden('id', $row->id_merek); ?>
                <fieldset>
                    <div class="form-group">
                        <label for="ID_Merek">ID Merek : <?php echo $row->id_merek ?></label>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama Merek :</label>
                        <input type="text" class="form-control" id="name" name="name"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ..." value="<?php echo $row->nama_merek ?>">  
                    </div>
                    <div class="form-group">
                        <label for="Foto">Foto / Gambar :</label>
                        <input type="file" id="foto" name="foto" size="20" accept="image/*">
<?php echo $error ?>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="ubah">Ubah</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            </div>
<?php echo form_close() ?>
        </div>

    </div>
</div>
<!-- Tutup Modal Ubah -->

											<a href="<?php echo site_url('brand/destroy/'.$row->id_merek) ?>" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
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
<?php } else { echo "<tbody></tbody> </table> </div> <center>Tidak Ada Data!</center>"; } ?>
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