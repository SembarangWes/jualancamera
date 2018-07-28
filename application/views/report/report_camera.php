<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print Kamera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery UI -->
    <link href="<?php echo base_url('assets/')?>css/jquery-ui.css" rel="stylesheet" media="screen">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url('assets/')?>css/styles.css" rel="stylesheet">
</head>
<body>
    <center><h1><b>Daftar Kamera</b></h1></center>
    <div class="content-box-header">
        <div class="panel-title"><b><center><?php echo $box ?> : <?php echo $search?></center></b></div>
    </div>

    <div class="content-box-large box-with-header">
        <div class="panel-body">
            
            <br><br><br>
            <table class="table table-striped" style="white-space: nowrap; width: 1%;" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Foto Kamera</th>
                        <th>Kamera</th>
                        <th>Spesifikasi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <br>
                <tbody>
<?php $start=0; foreach($data as $row) { ?>
                    <tr>
                        <td><?php echo $start+=1 ?></td>
                        <td><?php echo $row->id_kamera ?></td>
                        <td width="100" height="100">
                            <img src=<?php echo $_SERVER['DOCUMENT_ROOT']."/jualancamera/assets/uploads/".$row->foto_kamera ?> style="display:block; width:100%; height:100%;">
                        </td>
                        <td><?php echo $row->nama_kamera ?></td>
                        <td>
                            <div class="row">
                                <?php //echo $row->spesifikasi ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if($row->nama_kategori==null) { ?>
                                    <b><center>Tidak ada kategori.</center></b>
                                    <?php } else { ?>
                                    <p align="left"><b>Kategori : <?php echo $row->nama_kategori ?></b></p>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <?php if($row->nama_merek==null) { ?>
                                    <b><center>Tidak ada merek.</center></b>
                                    <?php } else { ?>
                                    <p align="left"><b>Merek : <?php echo $row->nama_merek ?></b></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </td>
                        <td align="right">Rp. <?php echo number_format($row->harga,0,",","."); ?>,-</td>
                        <td align="right"><?php echo $row->stok ?> Buah</td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>