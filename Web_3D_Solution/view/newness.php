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
?>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Newness</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->



<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>Newness Approval Table</label>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover"
						   id="dataTables-example">
						<thead>
							<tr style="font-size: 10px;">
								<th>No</th>
								<th title="System Id">626</th>											
								<th title="Fabric Item No">Fab Item No</th>
								<th title="Fabric Name">Fab Name</th>
								<th title="Fabric Colour">Fab Colour</th>
								<th title="Standard Wrap Code">Std WC</th>
								<th title="Detail Code">Alt WC</th>
								<th title="Fabric Type">Fabric Type</th>
								<th title="Status">Status</th>											
								<th title="Season">Season</th>
								<th title="Date Added">Date Added</th>
								<th title="Is Approved?">App?</th>
								<th title="Date Approved">Date Approved</th>
								<th title="Approved By">Approved by</th>
								<th title="Comments">Comments</th>

							</tr>
						</thead>
						<tbody>

							<?php
							$counter = 0;
							foreach ($newnessarray as $tablevalues)
							{
								$counter++;
								$tablevaluesarr = explode("/**/", $tablevalues);
								?>


								<tr style="font-size: 10px;">
									<td><?php echo $counter; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td></tr>
							<?php } ?>



						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->

			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
