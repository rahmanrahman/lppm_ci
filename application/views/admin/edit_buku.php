<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Edit Data Buku</title>
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
            <h1 align="center">Update Data Buku</h1>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
      				<?php echo form_open_multipart('Admin/update_buku');?>
              	<div class="form-group">
      					<label>Nama Buku</label>
        					<input type="hidden" name="id" class="form-control" value="<?php echo $bk->id ?>">
        					<input type="text" name="judul" class="form-control" value="<?php echo $bk->judul ?>">
      					<div class="form-group">
        					<label>Penerbit</label>
        					<input type="text" name="penerbit" class="form-control" value="<?php echo $bk->penerbit ?>">
      					</div>
      					<div class="form-group">
        					<label>Tahun Terbit</label>
        					<input type="date" name="tahun_terbit" class="form-control" value="<?php echo $bk->tahun_terbit ?>"> 
      					</div>
      					<div class="form-group">
        					<label>Genre</label>
        					<input type="text" name="genre" class="form-control" value="<?php echo $bk->genre ?>"> 
      					</div>
                <div class="form-group"> 
                  <label>Penulis</label> 
                  <input type="text" name="penulis" class="form-control" value="<?php echo $bk->penulis ?>"> 
                </div> 
                <div class="form-group"> 
                  <label>Foto</label><br>
                  <img src="<?php echo base_url();?>assets/foto/<?php echo $bk->foto;?>" width="90" height="110"><br>
                  <label><?php echo $bk->foto;?></label> 
                  <input type="hidden" name="old_foto" class="form-control" value="<?php echo $bk->foto;?>">
                  <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group"> 
                  <label>Harga</label> 
                  <input type="text" name="harga" class="form-control" value="<?php echo $bk->harga ?>"> 
                </div> 
      					<a href="<?php echo base_url('Admin/buku'); ?>" class=" btn btn-primary">Kembali</a>
                <button type="reset" class="btn btn-danger">Reset</button>
      					<button type="submit" class="btn btn-success">Simpan</button>
      					</div>
      				<?php echo form_close(); ?>
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












