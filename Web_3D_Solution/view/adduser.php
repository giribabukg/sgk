
<?php
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else if ($hostname == "KARTHIKEYAN577D")
{
	$proj_path = "/web3D/Web3D_Solution";
} else
{
	$proj_path = "..";
}
include('header.php');
$sql = "SELECT * FROM next_system_login_table ORDER BY active_status desc, id";

$result = mysqli_query($db, $sql);
?>            
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Users</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>Add Users LookUp Table</label>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover nowrap" id="dataTables-example">
                        <thead>
							<tr>
								<th>No.</th>
								<th>First name</th>
								<th>Second name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Role</th>
								<th>Domain</th>
								<th>Status</th>
								<th>Deactivated by</th>
								<th>Deactivated date</th>
							</tr>

						</thead>
						<?PHP
						$counter = 0;
						while ($user = mysqli_fetch_array($result, MYSQL_ASSOC))
						{
							$name ="";
							if ($user['deactivated_by']!="")
							{
								$userid = $user['deactivated_by'];
								$modal_status = "SELECT firstname,secondname FROM next_system_login_table where id=$userid";
								$modal_status_row = mysqli_fetch_array(mysqli_query($db, $modal_status), MYSQLI_ASSOC);
								$name = $modal_status_row["firstname"]." ".$modal_status_row["secondname"];
							}
							// echo "am here";
							$counter++;
							echo "<tr>";
							echo "<td>" . $counter . "</td>";
							echo "<td>" . $user['firstname'] . "</td>";
							echo "<td>" . $user['secondname'] . "</td>";
							echo "<td>" . $user['username'] . "</td>";
							echo "<td>" . $user['email'] . "</td>";
							echo "<td>" . $user['role'] . "</td>";
							echo "<td>" . $user['domain'] . "</td>";
							if ($user['active_status'] == "1")
							{
								echo '<td> <a href="../dao/approvedata.php?type=D&table=user&id=' . $user['id'] . '">A</></td>';
							} else
							{
								echo '<td> <a href="../dao/approvedata.php?type=A&table=user&id=' . $user['id'] . '">D</></td>';
							}
							echo "<td>" . $name . "</td>";
							echo "<td>" . $user['deleted_date'] . "</td>";
							echo "</tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?PHP
include('footer.php');
?>