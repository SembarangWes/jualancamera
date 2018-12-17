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

		<!-- CSS Datatables -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>datatables/datatables.min.css">

		<!-- CSS Editor -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/')?>vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">

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
                        <li><a href="<?php echo site_url('admin/transact') ?>"><i class="glyphicon glyphicon-credit-card"></i> Transaksi</a></li>
                        <li class="current"><a href="<?php echo site_url('admin/delivery') ?>"><i class="glyphicon glyphicon-gift"></i> Pengiriman</a></li>
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
                            <div class="panel-title"><b>Admin / Pengiriman</b></div>
                        </div>

						<div class="content-box-large box-with-header">

                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Paket</th>
                                    <th>Tujuan</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </thead>
                                <?php if(isset($data)) { ?>
									<tbody>
										<?php $start=0; foreach($data as $row) { ?>
										<tr>
										<td>
											<?php echo $start+=1 ?>
										</td>
                                        <td>
                                        <?php echo $row->id_pengiriman ?>
                                        </td>
										<td>
											<?php echo $row->nama_paket ?>
										</td>
                                        <td>
											<b><?php echo $row->nama_penerima ?></b>
                                            <br/>
                                            <?php echo $row->alamat_penerima ?>
										</td>
                                        <td>
											<?php echo $row->jenis ?>
										</td>
                                        <td>
											<?php echo $row->status ?>
										</td>
										<td>
                                            <!-- Tombol Modal Ubah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalUbah<?php echo $row->id_pengiriman ?>"></button>

                                            <!-- Modal Ubah -->
                                            <div id="ModalUbah<?php echo $row->id_pengiriman ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"><legend>Edit Pengiriman</legend></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php echo form_open('delivery/update/'.$row->id_pengiriman) ; echo form_hidden('id', $row->id_pengiriman); ?>
                                                            <fieldset>
                                                                <div class="form-group">
                                                                    <label for="id_pengiriman">ID Pengiriman : <?php echo $row->id_pengiriman ?></label>
                                                                </div>
                                                                <div c lass="form-group">
                                                                    <l abel for="id_transaksi">ID Transaksi : <?php echo $row->id_transaksi ?></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="berat">Berat :</label>
                                                                    <input type="number" class="form-control" id="berat" name="berat"
                                                                        pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
                                                                        placeholder="Masukkan berat (dalam Kilogram) ..." value="<?php echo $row->berat ?>"">  
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ukuran">Ukuran :</label>
                                                                    <input type="number" class="form-control" id="ukuran" name="ukuran"
                                                                        pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
                                                                        placeholder="Masukkan ukuran (dalam cm3) ..." value="<?php echo $row->ukuran ?>"">  
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Jenis">Jenis :</label>
                                                                    <select  id="jenis" name="jenis">
                                                                        <?php // foreach($jenis as $j) { $s=""; if($j==$row->jenis) {$s="selected"} ?>
                                                                        <option value="<?php echo 'id_kategori' ?>" <?php echo $s ?>><?php echo "Jenis" ?></option>
                                                                        <?php //} ?>
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

											<a href="<?php echo site_url('delivery/destroy/'.$row->id_pengiriman) ?>" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
												onclick="return confirm('Apakah anda yakin?')"></a>
										</td>
										</tr>
                                        <?php } ?>
									</tbody>
                                    <?php } else {echo "<center>Tidak Ada Data!</center>";} ?>
								</table>
							</div>

							<div class="panel-footer">

							</div>

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

        <!-- JS Datatables -->
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/')?>datatables/datatables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>

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