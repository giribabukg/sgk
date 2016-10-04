<?php
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}

include('header.php');

$del_id = trim(addslashes(filter_input(INPUT_POST, 'del_id')));
$process = trim(addslashes(filter_input(INPUT_POST, 'process')));
$userid = $_SESSION ['login_id'];
$username = $_SESSION ['user_name'];
if (isset($process) && $del_id != "")
{
	$t = time();
	$timelog = date("dmYhms", $t);
	try
	{
		$header_name = trim(addslashes(filter_input(INPUT_POST, 'header_name')));
		$flag = 0;
		if ($header_name == "Season")
		{
			$sel_qry = "SELECT count(id) as dupcount FROM next_main_phase_table WHERE SeasonId=$del_id";
			$result = mysqli_query($db, $sel_qry);
			$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$dup_count = $row1['dupcount'];

			if ($dup_count > "0")
			{
				echo "Season cannot be deleted. It is Mapped to Phase!!!";
				$flag = 1;
			}
			if ($flag == 0)
			{
				$sel_qry = "SELECT count(id) as dupcount FROM next_texture_lookup_table WHERE Season=$del_id";
				$result = mysqli_query($db, $sel_qry);
				$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dup_count = $row1['dupcount'];

				if ($dup_count > "0")
				{
					echo "Season cannot be deleted. It is Mapped to Texture1 Data!!!";
					$flag = 1;
				}
			}
			if ($flag == 0)
			{
				$sel_qry = "SELECT count(id) as dupcount FROM next_texturesec_lookup_table WHERE Season=$del_id";
				$result = mysqli_query($db, $sel_qry);
				$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dup_count = $row1['dupcount'];

				if ($dup_count > "0")
				{
					echo "Season cannot be deleted. It is Mapped to Texture2 Data!!!";
					$flag = 1;
				}
			}
		}
		else if ($header_name == "Category")
		{
			$sel_qry = "SELECT count(id) as dupcount FROM next_main_phase_table WHERE categoryId=$del_id";
			$result = mysqli_query($db, $sel_qry);
			$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$dup_count = $row1['dupcount'];

			if ($dup_count > "0")
			{
				echo "Category cannot be deleted. It is Mapped to Phase!!!";
				$flag = 1;
			}
			if ($flag == 0)
			{
				$sel_qry = "SELECT count(id) as dupcount FROM next_texture_lookup_table WHERE Category=$del_id";
				$result = mysqli_query($db, $sel_qry);
				$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dup_count = $row1['dupcount'];

				if ($dup_count > "0")
				{
					echo "Category cannot be deleted. It is Mapped to Texture1 Data!!!";
					$flag = 1;
				}
			}
			if ($flag == 0)
			{
				$sel_qry = "SELECT count(id) as dupcount FROM next_texturesec_lookup_table WHERE Category=$del_id";
				$result = mysqli_query($db, $sel_qry);
				$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dup_count = $row1['dupcount'];

				if ($dup_count > "0")
				{
					echo "Category cannot be deleted. It is Mapped to Texture2 Data!!!";
					$flag = 1;
				}
			}
			if ($flag == 0)
			{
				$sel_qry = "SELECT count(id) as dupcount FROM next_option_lookup_table WHERE Category=$del_id";
				$result = mysqli_query($db, $sel_qry);
				$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dup_count = $row1['dupcount'];

				if ($dup_count > "0")
				{
					echo "Category cannot be deleted. It is Mapped to Option Data!!!";
					$flag = 1;
				}
			}
			if ($flag == 0)
			{
				$sel_qry = "SELECT count(id) as dupcount FROM next_range_lookup_table WHERE Category=$del_id";
				$result = mysqli_query($db, $sel_qry);
				$row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$dup_count = $row1['dupcount'];

				if ($dup_count > "0")
				{
					echo "Category cannot be deleted. It is Mapped to Range Data!!!";
					$flag = 1;
				}
			}
		}
		if ($flag == 0)
		{
			$del_qry = "DELETE FROM next_master_data_detail WHERE id=$del_id";
			if (mysqli_query($db, $del_qry))
			{
				echo "Row deleted successfully!!";
				$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Success: [$del_id] deleted successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
				error_log($del_qry . "\n", 3, "../log/Transaction.log");
			} else
			{
				echo "Row not able to delete!!";
				$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Error: [$del_id] not deleted Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
				error_log($del_qry . "\n", 3, "../log/Transaction.log");
			}
		}
	} catch (Exception $ex)
	{
		echo '<span style="color:red;text-align:center;">We are sorry to inform that the latest transaction failed due to some technical constraint.
    		</span>' . "\n";
		echo '<br></br>';
		echo '<span style="color:red;text-align:center;">Please contact RND team and please provive the transaction ID
    		<span style="font-weight: 900;">' . $timelog . '</span>
    		</span>';
		error_log($timelog . " => Error: [$timelog]." . $ex->getMessage() . "\n", 3, "../log/Error.log");
	}
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Master Data</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php
foreach ($masterdataarray as $valuesmasterdata)
{
	$temp = $valuesmasterdata;
	?>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<label><?php echo $valuesmasterdata ?> Table</label> 
				</div>
				<?php $valuesmasterdata = str_replace(' ', '', $valuesmasterdata);
				?>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover"
							   id="dataTables-example-<?php echo $valuesmasterdata ?>">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Description</th>
									<th>Created By</th>
									<th>Created On</th>
									<th></th>

								</tr>
							</thead>
							<tbody>

								<?php
								$looper = 1;
								$phase_sql1a = mysqli_query($db, "SELECT a.id as dataid, b.id as headerid, dataname, description, c.firstname,c.secondname,a.createddt FROM 
								next_master_data_detail a,
								next_master_header_detail b,
								next_system_login_table c
								WHERE headerid = b.id
								AND b.headername = '$temp'
								AND c.id = a.createdby");

								while ($row_master_headera = mysqli_fetch_array($phase_sql1a, MYSQLI_ASSOC))
								{
									$dataid = $row_master_headera['dataid'];
									$headerid = $row_master_headera['headerid'];
									$dataname = $row_master_headera['dataname'];
									$description = $row_master_headera['description'];
									$pass_id = $headerid . "___" . $dataid;
									?>
									<tr class="odd gradeX">
										<td><?php echo $looper ?></td>
										<td><a href="javascript:void(0);" class="fields_enable" name="Name" id="<?PHP echo "name___" . $pass_id; ?>" data-type="text" data-placement="right" data-title="Enter Name" onclick="link_click(this.id)" data-pk="<?PHP echo $dataid ?>"><?PHP echo $dataname; ?></a></td>
										<td><a href="javascript:void(0);" class="fields_enable" name="Name" id="<?PHP echo "desc___" . $pass_id; ?>" data-type="text" data-placement="right" data-title="Enter Description" onclick="link_click(this.id)" data-pk="<?PHP echo $dataid ?>"><?PHP echo $description; ?></a></td>
										<td><?php echo $row_master_headera['firstname'] ?> <?php echo $row_master_headera['secondname'] ?></td>
										<td><?php echo $row_master_headera['createddt'] ?></td>
										<td><a href="javascript:void(0);" onclick="del_row(<?PHP echo $dataid; ?>, '<?PHP echo $valuesmasterdata; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
									</tr>
									<?php
									$looper++;
								}
								?>					

							</tbody>
						</table>
						<form action="viewmasterdata.php" method="post" name="delete_action" id="delete_action">
							<input type="hidden" name ="del_id" id="del_id" value="">
							<input type="hidden" name ="header_name" id="header_name" value="">
							<input type ="hidden" name="process" id="process" value="delete_row">
						</form>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<?php
}
include('footer.php');
?>
