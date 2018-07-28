<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery UI -->
    <link href="<?php echo base_url('assets/')?>css/jquery-ui.css" rel="stylesheet" media="screen">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/')?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url('assets/')?>css/styles.css" rel="stylesheet">
</head>
<body>
    <center><h1><b>Daftar User</b></h1></center>
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
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>Kontak Telepon (E-mail)</th>
                        <th class="text-center">Hak Akses</th>
                    </tr>
                </thead>
                <br>
                <tbody>
<?php $start=0; foreach($data as $row) { ?>
                    <tr>
                        <td><?php echo $start+=1 ?></td>
                        <td><?php echo $row->id_user ?></td>
                        <td><?php echo $row->nama_user ?></td>
                        <td><?php echo $row->alamat ?></td>
                        <td><?php echo $row->no_hp." (".$row->email.")" ?></td>
                        <td align="center"><?php echo $row->role ?></td>
                    </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>