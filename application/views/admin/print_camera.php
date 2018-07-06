<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tes Print</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery UI -->
    <link href="<?php echo base_url('assets/')?>css/jquery-ui.css" rel="stylesheet" media="screen">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url('assets/')?>css/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Print PDF</h1>
    <div class="content-box-header">
        <div class="panel-title"><b>Admin / Kamera</b></div>
    </div>

    <div class="content-box-large box-with-header">
        <div class="panel-body">
            <table class="table table-striped">
                <thead><tr>
                    <th>No</th>
                    <th>Spesifikasi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr></thead>
                <br>
                <tbody>
<?php $start=0; foreach($data as $row) { ?>
                    <tr>
                        <td>
                            <?php echo $start+=1 ?>
                        </td>
                        <td>
                            <a href="#bannerformmodal" data-toggle="modal" data-target="#modalDetail">Detail</a>
                        </td>
                        <td>
                            <?php echo $row->harga ?>
                        </td>
                        <td>
                            <?php echo $row->stok ?>
                        </td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>