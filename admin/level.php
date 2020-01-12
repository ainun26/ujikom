<?php 
include "admin.php";
include "../config.php";
$result = mysqli_query($dbconnect,"SELECT * FROM level ORDER BY id_level DESC");
?>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Level</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <div class="col-md-6 mb-3">
                <thead>
                  <tr>
                    <th>No Level</th>
                    <th>Nama Level</th>
                </thead>
			

			<?php while ($data =mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><?= $data['id_level']; ?></td>
					<td><?= $data['nama_level']; ?></td>
				</tr>
			<?php endwhile; ?>
		</div>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
<?php include "../footer.php"; ?>
