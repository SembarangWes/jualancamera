<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Transaksi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery UI -->
    <link href="<?php echo base_url('assets/')?>css/jquery-ui.css" rel="stylesheet" media="screen">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url('assets/')?>css/styles.css" rel="stylesheet">
</head>
<body>
    <center><h1><b>Daftar Transaksi per Waktu</b></h1></center>
    <div class="content-box-header">
        <div class="panel-title"><b><center>Transaksi per : <?php echo $date ?> </center></b></div>
    </div>

    <div class="content-box-large box-with-header">
        <div class="panel-body">
            
            <br><br><br>
            <table class="table table-striped" style="white-space: nowrap; width: 1%;" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>ID Transaksi</th>
                        <th>Pembeli</th>
                        <th>Produk Kamera</th>
                        <th>Stok Terjual</th>
                    </tr>
                </thead>
                <tbody>
<?php $start=0; foreach($data as $row) { ?>
                    <tr>
                        <td><?php echo $start+=1 ?></td>
                        <td align="center"><?php echo $row->tgl_transaksi ?></td>
                        <td align="center"><?php echo $row->id_transaksi ?></td>
                        <td><?php echo $row->nama_user ?></td>
                        <td><?php echo $row->nama_kamera ?></td>
                        <td align="center"><?php echo $row->jumlah ?></td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>