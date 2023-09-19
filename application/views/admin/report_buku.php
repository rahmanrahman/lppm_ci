<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Buku</title>
<?php //Loading head.php
  $this->load->view('admin/templates/head');
?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins')?>/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1 align="center">Data Buku</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a class="btn btn-primary" href=" <?php echo base_url('Admin/buku') ?>">Kembali</a>
            <a target="_blank" class="btn btn-danger" href=" <?php echo base_url('Admin/cetak_buku') ?>"> <i class="fa fa-print"></i> Print</a>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr class="bg-info" align="center">
                    <th>NO</th>
                    <th>JUDUL BUKU</th>
                    <th>PENERBIT</th>
                    <th>TAHUN TERBIT</th>
                    <th>GENRE</th>
                    <th>PENULIS</th>
    
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach($buku as $bk) : ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $bk->judul ?></td>
                    <td><?php echo $bk->penerbit ?></td>
                    <td><?php echo $bk->tahun_terbit ?></td>
                    <td><?php echo $bk->genre ?></td>
                    <td><?php echo $bk->harga ?></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
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
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/plugins')?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/plugins')?>/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "responsive": true, 
        "buttons": ["copy", "csv", "excel", "pdf"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
