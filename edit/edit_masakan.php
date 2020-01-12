<?php 
include "../admin/admin.php";
require "../config.php";

$id_masakan = $_GET['id_masakan'];
$masakan = query_mas("SELECT * FROM masakan where id_masakan = $id_masakan ")[0];

if(isset($_POST['submit'])) {
	if (ubah_mas($_POST)>0){

		echo "
			<script>
			alert('Data berhasil di edit')
			document.location.href = '../admin/entrireferensi.php';
			</script>";
	} else {
		echo "
			<script>
			alert('Data gagal di edit !!!')
			document.location.href = '../admin/entrireferensi.php'
			</script>";
	}
}

 ?>

 <!-- ubah masakan -->
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah Masakan</title>
 </head>
 <body>
 <!-- ini akhir ubah masakan -->
 <h1>Ubah <small>Masakan</small></h1>
 <hr>

 <div class="row">
 <div class="col-md-6 mb-3">
 <form method="post" action="" enctype="multipart/form-data">
 			
 	<div class="card">
 		<div class="card-header">
 			<h5>Buat masakan Baru</h5>
 		</div> <!-- end card header -->
 		<div class="card-body">
 			<input type="hidden" name="id_masakan" value="<?= $masakan["id_masakan"]; ?>">
 			<input type="hidden" name="gambarLama" value="<?= $masakan["gambar"]; ?>">

 		<!-- input gambar-->
 		<div class="form-group form-label-group">
 			<input type="hidden" name="id_masakan" value="<?= $masakan["id_masakan"]; ?>">
 			<input type="hidden" name="gambarLama" value="<?= $masakan["gambar"]; ?>">
 			<img src="img/<?=$masakan["gambar"];?>" style="width: 40%">
 			<input type="file" name="gambar">
 			<label>Gambar</label>
 		</div>

 		<!-- input nama masakan -->
 		<div class="form-group form-label-group">
 			<input type="text" name="nama_masakan" class="form-control" value="<?=$masakan['nama_masakan'];?>">
 			<label>Nama Masakan</label>
 		</div>
 		<div class="form-group form-label-group">
 			<input type="text" name="harga" class="form-control" value="<?=$masakan['harga'];?>">
 			<label>Harga</label>
 		</div>
 		<div class="form-group form-label-group">
 			<input type="text" name="status_masakan" class="form-control" value="<?=$masakan['status_masakan'];?>">
 			<label>Status Masakan</label>
 		</div>


 	</div> <!-- end card body-->
 	<button class="btn btn-primary" type="submit" name="submit">Update</button>

 	</div> <!-- end card -->
 </form>	
 </div>
 </div>
 </body>
 </html>

 <?php 
include "../footer.php";
  ?>