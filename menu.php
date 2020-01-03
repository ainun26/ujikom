<?php 
include "customer.php";
include "config.php";
$result = mysqli_query($dbconnect,"SELECT * FROM masakan");
 ?>

<h2 style="text-align: center; margin-top: 10px; margin-bottom: 20px;">List Masakan</h2>
 <hr>
 <br></br>

 <div class="container">
 	<div class="row">
 		<?php while ($data = mysqli_fetch_assoc($result)) : ?>
 			<div class="col-lg-3 text-center">
 				<div class="" style="margin-bottom: 20px;">
 				<img src="img/<?= $data["gambar"]; ?>" height="150" width="250"><br>
 				<h6 style="color: deepskyblue; "><?= $data["nama_masakan"]; ?></h6>
 				<h6>Harga : <?=$data["harga"]; ?></h6>
 				<h6>Status : <?=$data["status_masakan"]; ?></h6>
 					<a href="#" class="btn btn-primary">Detail</a>
 					<a href="#" class="btn btn-danger">Order</a>
 					
 				</div>
 			</div>
 		<?php endwhile; ?> 
 	</div>
 </div>
 <!-- ini akhir berita -->

 				<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['nama']; ?></h3></div>
                        <img src="admin/<?php echo $data['gambar']; ?>" style="border: 2px solid grey; border-radius: 5px; width: 250px; height: 200px;"  />
						<div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div>
					<!--	<p>
						
						</p> -->
						<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?kd=<?php echo $data['kode'];?>" class="clear"> <a href="index.html" class="btn btn-lg btn-success">Beli &raquo;</a></div>
					
                    </div>
        		</div>

 <?php include "footer.php";
 ?>