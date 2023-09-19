<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Mahasiswa</title>
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
            <h1 align="center">Checkout Buku</h1>
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
              <?php echo form_open_multipart('C_pengguna/payment');?>
                <div class="form-group">
                <label>Nama Buku</label>
                  <input type="hidden" name="id" class="form-control" value="<?php echo $bk->id ?>">
                  <input type="text" name="judul_buku" di class="form-control" value="<?php echo $bk->judul ?>">
                <div class="form-group">
                  <label>penerbit</label>
                  <input type="text" name="penerbit" class="form-control" value="<?php echo $bk->penerbit ?>">
                </div>
                <div class="form-group">
                  <label>tahun_terbit</label>
                  <input type="text" name="tahun_terbit" class="form-control" value="<?php echo $bk->tahun_terbit ?>"> 
                </div>
                <div class="form-group">
                  <label>genre</label>
                  <input type="text" name="genre" class="form-control" value="<?php echo $bk->genre ?>"> 
                </div>
                <div class="form-group"> 
                  <label>penulis</label> 
                  <input type="text" name="penulis" class="form-control" value="<?php echo $bk->penulis ?>"> 
                </div> 
                <div class="form-group"> 
                  <label>Foto</label><br>
                  <img src="<?php echo base_url();?>assets/foto/<?php echo $bk->foto;?>" width="90" height="110"><br>
                  <label><?php echo $bk->foto;?></label> 
                  <input type="hidden" name="old_foto" class="form-control" value="<?php echo $bk->foto;?>">
                  <!-- <input type="file" name="foto" class="form-control"> -->
                </div>
                <div class="form-group"> 
                  <label>harga</label> 
                  <input type="text" name="harga_buku" class="form-control" value="<?php echo $bk->harga ?>"> 
                </div>
                <div class="form-group">
                <label>Metode Pembayaran</label> 
                  <select class="form-control select2" name="metode" style="width: 100%;">
                    <option selected="selected" value="transfer bank">Transfer Bank</option>
                    <option value="alfamart">alfamart</option>
                    <option value="indomart">indomart</option>
                    <option value="COD">COD</option>
                  </select>
                </div> 
                <a href="<?php echo base_url('C_pengguna/index'); ?>" class=" btn btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success">BELI</button>
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












