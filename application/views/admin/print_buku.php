<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Data Buku	</title>
</head>
<body>
	<center><h1>Data Buku</h1></center>
	<table border="1"> 
		<tr> 
			<<th>NO</th>
                    <th>JUDUL</th>
                    <th>PENERBIT</th>
                    <th>TAHUN TERBIT</th>
                    <th>GENRE</th>
                    <th>PENULIS</th>
                    <th>harga</th> 
		</tr> 
		<?php 
			$no= 1;
			foreach ($buku as $bk){?> 
		<tr> 
			<td><?php echo $no++ ?></td> 
			<td><?php echo $bk->judul ?></td> 
			<td><?php echo $bk->penerbit ?></td> 
			<td><?php echo $bk->tahun_terbit ?></td> 
			<td><?php echo $bk->genre ?></td> 
			<td><?php echo $bk->penulis ?></td> 
			<td><?php echo $bk->harga ?></td> 
		</tr> 
		<?php 
			}; 
		?> 
	</table> 
	<!-- script dibawah ini untuk menampilkan jendela print --> 
	<script type="text/javascript"> window.print() </script>
</body> 
</html>