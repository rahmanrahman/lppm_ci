<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Pembayaran</title>
<?php //Loading head.php
  $this->load->view('admin/templates/head');
?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <!-- Navbar -->
<?php //Loading navbar.php
  $this->load->view('pengguna/templates/navbar');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="col-sm-12">
            <h1 align="center">Detail Data Pembayaran</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table"> 
                  <tr> 
                    <th>Nama Pengguna</th>
                    <td>:</td>
                    <td><?php echo $detail->nama_pengguna ?></td> 
                  </tr> 
                  <tr> 
                    <th>Judul</th> 
                    <td>:</td>
                    <td><?php echo $detail->judul_buku ?></td> 
                  </tr> 
                  <tr> 
                    <th>Harga</th> 
                    <td>:</td>
                    <td><?php echo $detail->harga_buku ?></td> 
                  </tr> 
                  <tr> 
                    <th>Metode Pembayaran</th> 
                    <td>:</td>
                    <td><?php echo $detail->metode ?></td> 
                  </tr>
                  <tr> 
                    <th>Kode Pembayaran</th> 
                    <td>:</td>
                    <td><?php echo $detail->kode_pembayaran ?></td> 
                  </tr> 
                  <
                </table> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php //Loading footer.php
  $this->load->view('admin/templates/footer');
?>

</body>
</html>












