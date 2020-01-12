<?php 
include "admin.php";
include "../config.php";
$result = mysqli_query($dbconnect,"SELECT * FROM user ORDER BY id_user DESC");
?>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table User</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <a href="../add/register.php" class="fa fa-plus-square btn btn-info">Add</a>
                <div class="col-md-6 mb-3">
			
      <thead>
			<tr>
				<th>Username</th><th>Password</th><th>Nama User</th><th>Level</th><th>Opsi</th>
			</tr>
      </thead>

			<?php while ($data =mysqli_fetch_assoc($result)): ?>
				<tr>
					<td><?= $data['username']; ?></td>
					<td><?= $data['password']; ?></td>
					<td><?= $data['nama_user']; ?></td>
					<td><?= $data['id_level']; ?></td>
					<td>
						<a href="../edit/edit_user.php?id_user=<?= $data["id_user"];?>" class="btn btn-info btn-sm">Edit</a>

						<a href="../deleted/delete_user.php?id_user=<?= $data["id_user"];?>" onclick="return confirm('Apakah anda yakin ?');" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
			<?php endwhile; ?>
		</div>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table user coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->
<?php include "../footer.php"; ?>
