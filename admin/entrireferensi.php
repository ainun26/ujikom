<?php 
include "admin.php";
include "../config.php";
$result = mysqli_query($dbconnect,"SELECT * FROM masakan");
 ?>

  <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Entri Referensi </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <a href="../add/add_entrireferensi.php" class="fa fa-plus-square btn btn-info">Add</a>
                <div class="col-md-6 mb-3">
			
      <thead>
			<tr>
				<th>Gambar</th><th>Nama Menu</th><th>Status Menu</th><th>Harga</th><th>Opsi</th>
			</tr>
      </thead>

			<?php while ($data =mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><img src="../gmb/<?= $data["gambar"]; ?>" height="130" width="150"></td>
					<td><?= $data["nama_masakan"]; ?></td>
					<td><?= $data["status_masakan"]; ?></td>
          <td><?= $data["harga"]; ?></td>
					<td>
						<a href="../edit/edit_masakan.php?id_masakan=<?= $data["id_masakan"];?>" class="btn btn-info btn-sm">Edit</a>

						<a href="../deleted/delete_masakan.php?id_masakan=<?= $data["id_masakan"];?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya ?');" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
			<?php endwhile; ?>
		</div>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>
      <!-- /.container-fluid -->

<?php include "../footer.php";
 ?>


