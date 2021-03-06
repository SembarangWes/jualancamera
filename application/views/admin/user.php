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
						<li class="current"><a href="<?php echo site_url('admin/user') ?>"><i class="glyphicon glyphicon-user"></i> Pengguna</a></li>
                        <li><a href="<?php echo site_url('admin/transact') ?>"><i class="glyphicon glyphicon-credit-card"></i> Transaksi</a></li>
                        <li><a href="<?php echo site_url('admin/delivery') ?>"><i class="glyphicon glyphicon-gift"></i> Pengiriman</a></li>
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
                            <div class="panel-title"><b>Admin / Pengguna</b></div>
                        </div>

						<div class="content-box-large box-with-header">

							<div class="panel-body">
                                <div class="row">
                                    <form class="form-inline" action="<?php echo site_url('admin/user') ?>" method="post">
                                    <div class="col-md-6">
                                        <label for="Cari">Pencarian : </label>
                                        <select class="form-control" id="kolom" name="kolom">
                                            <option value="nama_user">Nama</option>
                                            <option value="alamat">Alamat</option>
                                            <option value="no_hp">HP</option>
                                            <option value="email">E-mail</option>
                                            <option value="role">Hak Akses</option>
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
										<th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Handphone</th>
                                        <th>E-mail</th>
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
                <h4 class="modal-title"><legend>Tambah Pengguna</legend></h4>
            </div>
            <div class="modal-body">
<?php echo form_open('user/store') ?>
                <fieldset>
                    <div class="form-group">
                        <label for="Name">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ...">  
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat :</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat"
                            pattern="{1,1000}" required title="Harap diisi"
                            placeholder="Masukkan alamat ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hp">No. HP :</label>
                        <input type="number" class="form-control" id="hp" name="hp"
                            pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
                            placeholder="Masukkan nomer handphone ...">  
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="email" class="form-control" id="email" name="email"
                            pattern="{1,50}" required title="Harap diisi"
                            placeholder="Masukkan email ...">  
                    </div>
                    <div class="form-group">
                        <label for="pass">Password :</label>
                        <input type="password" class="form-control" id="pass" name="pass"
                            pattern=".{8,}" required title="Harap diisi sebanyak 8 karakter"
                            maxlength="8" placeholder="Masukkan password ..." onmousemove="this.type='password'"
                            onmousedown="this.type='text'" onmouseup="this.type='password'">
                        <font color="#808080">Klik untuk melihat</font>
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses Sebagai :</label>
                        <select class="form-control" id="role" name="role">
                            <option value="Administrator">Administrator</option>
                            <option value="Pengguna">Pengguna</option>
                        </select>
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
											<?php echo $row->nama_user ?>
										</td>
                                        <td>
											<?php echo $row->alamat ?>
										</td>
                                        <td>
											<?php echo $row->no_hp ?>
										</td>
                                        <td>
											<?php echo $row->email ?>
										</td>
										<td>
                                            <!-- Tombol Modal Ubah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalUbah<?php echo $row->id_user ?>"></button>

<!-- Modal Ubah -->
<div id="ModalUbah<?php echo $row->id_user ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><legend>Edit Pengguna</legend></h4>
            </div>
            <div class="modal-body">
<?php echo form_open('user/update/'.$row->id_user); echo form_hidden('id', $row->id_user); ?>
                <fieldset>
                    <div class="form-group">
                        <label for="ID_Pengguna">ID Pengguna : <?php echo $row->id_user ?></label>
                    </div>
                    <div class="form-group">
                        <label for="Name">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ..." value="<?php echo $row->nama_user ?>">  
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat :</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat"
                            pattern="{1,1000}" required title="Harap diisi"
                            placeholder="Masukkan alamat ..."><?php echo $row->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hp">No. HP :</label>
                        <input type="number" class="form-control" id="hp" name="hp"
                            pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
                            placeholder="Masukkan nomer handphone ..." value="<?php echo $row->no_hp ?>">  
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input type="email" class="form-control" id="email" name="email"
                            pattern="{1,50}" required title="Harap diisi"
                            placeholder="Masukkan email ..." value="<?php echo $row->email ?>">  
                    </div>
                    <div class="form-group">
                        <label for="pass">Password :</label>
                        <input type="password" class="form-control" id="pass" name="pass"
                            pattern=".{8,}" required title="Harap diisi sebanyak 8 karakter"
                            maxlength="8" placeholder="Masukkan password ..." onmousemove="this.type='password'"
                            onmousedown="this.type='text'" onmouseup="this.type='password'"
                            value="<?php echo $this->encryption->decrypt($row->password) ?>">
                        <font color="#808080">Klik untuk melihat</font>
                    </div>
                    <div class="form-group">
                        <label for="role">Hak Akses Sebagai :</label>
<?php if($row->role=="Administrator"){$a='selected';$p=null;}else{$a=null;$p='selected';}?>
                        <select class="form-control" id="role" name="role">
                            <option value="Administrator" <?php echo $a ?>>Administrator</option>
                            <option value="Pengguna" <?php echo $p ?>>Pengguna</option>
                        </select>
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

											<a href="<?php echo site_url('user/destroy/'.$row->id_user) ?>" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
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

<?php } else {echo "<center>Tidak Ada Data!</center>";} ?>

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