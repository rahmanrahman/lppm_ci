<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Detail Data Buku</title>
<?php //Loading head.php
  $this->load->view('admin/templates/head');
?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php //Loading navbar.php
  $this->load->view('admin/templates/navbar');
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php //Loading sidebar.php
  $this->load->view('admin/templates/sidebar');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="col-sm-12">
            <h1 align="center">Detail Data Buku</h1>
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
                    <th>judul buku</th>
                    <td>:</td>
                    <td><?php echo $detail->judul ?></td> 
                  </tr> 
                  <tr> 
                    <th>penerbit</th> 
                    <td>:</td>
                    <td><?php echo $detail->penerbit ?></td> 
                  </tr> 
                  <tr> 
                    <th>tahun terbit</th> 
                    <td>:</td>
                    <td><?php echo $detail->tahun_terbit ?></td> 
                  </tr> 
                  <tr> 
                    <th>genre</th> 
                    <td>:</td>
                    <td><?php echo $detail->genre ?></td> 
                  </tr> 
                  <tr> 
                    <th>penulis</th> 
                    <td>:</td>
                    <td><?php echo $detail->penulis ?></td> 
                  </tr> 
                  <tr> 
                    <th>Foto</th>
                    <td>:</td>
                    <td>
                      <img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto;?>" width="90" height="110">
                    </td>
                  </tr> 
                  <tr> 
                    <th>harga</th> 
                    <td>:</td>
                    <td><?php echo $detail->harga ?></td> 
                  </tr> 
                </table> 
                <a href="<?php echo base_url('Admin/buku'); ?>" class=" btn btn-primary">Kembali</a>
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












