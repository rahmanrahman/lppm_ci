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
            <button class="btn btn-primary" data-toggle="modal" data-target="#inputModal"><i class="fa fa-plus"></i> Tambah Data Buku</button>
            <a class="btn btn-danger" href=" <?php echo base_url('Admin/report_buku') ?>"> <i class="fa fa-print"></i> Export dan Print </a>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr class="bg-info" align="center">
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>PENERBIT</th>
                    <th>TAHUN TERBIT</th>
                    <th>GENRE</th>
                    <th>PENULIS</th>
                    <th>harga</th>
                    <th>Detail</th>
                    <th>Hapus</th>
                    <th>Edit</th>
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
                    <td><?php echo $bk->penulis ?></td>
                    <td><?php echo $bk->harga ?></td>
                    <td align="center">
                      <a class="btn btn-success btn-sm " href="<?php echo base_url('Admin/detail_buku/'.$bk->id)?>">
                        <i class="fa fa-search-plus"></i>
                      </a>
                    </td > 
                    <td onclick="javascript: return  confirm('Anda  yakin  hapus?')" align="center">
                      <a class="btn btn-danger btn-sm " href="<?php echo base_url('Admin/hapus_buku/'.$bk->id)?>">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                    <td align="center">
                      <a class="btn btn-primary btn-sm " href="<?php echo base_url('Admin/edit_buku/'.$bk->id)?>">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
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
        <!-- Modal -->
        <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA BUKU</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('admin/tambah_buku');?>
                  <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judul" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="penerbit" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="text" name="tahun_terbit" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Penulis</label> 
                    <input type="text" name="penulis" class="form-control"> 
                  </div> 
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control">
                  </div>
                  <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
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
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "responsive": true, 
        "buttons": ["copy", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>
