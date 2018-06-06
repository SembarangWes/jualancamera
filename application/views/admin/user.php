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

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- JsGrid User -->
		<link type="text/css" href="<?php echo base_url('assets/jsgrid/jsgrid.min.css') ?>" rel="stylesheet">
    	<link type="text/css" href="<?php echo base_url('assets/jsgrid/jsgrid-theme.min.css') ?>" rel="stylesheet">

		<script type="text/javascript" src="<?php echo base_url('assets/jsgrid/jsgrid.min.js') ?>"></script>

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
						<li class="current"><a href="<?php echo site_url('admin/user') ?>"><i class="glyphicon glyphicon-user"></i> Pengguna</a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">

							<div class="panel-heading">
								<div class="panel-title"><legend>Daftar Anggota, filter masih bejat</legend></div>
							</div>

							<div class="panel-body">
                                <div id="JGU">
									<script>
											$("#JGU").jsGrid({
												height: "300px",
												width: "100%",
												filtering: true,
												inserting: true,
												editing: true,
												sorting: true,
												paging: true,
												autoload: true,
												pageSize: 10,
												pageButtonCount: 5,
												deleteConfirm: "Anda Yakin?",
												controller: {
												loadData: function(filter) {
													return $.ajax({
													type: "GET",
													url: "<?php echo base_url('user/list') ?>",
													data: filter
													});
												},
												insertItem: function(item) {
													return $.ajax({
													type: "POST",
													url: "<?php echo base_url('user/add') ?>",
													data: item
													});
												},
												updateItem: function(item) {
													return $.ajax({
													type: "POST",
													url: "<?php echo base_url('user/edit') ?>",
													data: item
													});
												},
												deleteItem: function(item) {
													return $.ajax({
													type: "POST",
													url: "<?php echo base_url('user/destroy') ?>",
													data: item
													});
												}
												},
												fields: [
												{ name: "id_user", title: "ID Anggota", type: "display", width: 50 },
												{ name: "nama_user", title: "Nama Anggota", type: "text", width: 50 },
												{ name: "email", title: "E-mail", type: "text", width: 50 },
												{ name: "no_hp", title: "Nomor Handphone", type: "text", width: 50 },
												{ type: "control" }
												]
											});
									</script>
								</div>				
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
  	</body>
</html>