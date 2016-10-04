<?php
include('../view/header_without_menu.php');

$phaseid = $_GET['phaseid'];
$qry = "SELECT Comments, Firstname, Commenteddt FROM 
next_trans_cmtt_table a
, next_system_login_table b
WHERE a.commentedby = b.id
		and TransId='$phaseid'";
$ses_sql1 = mysqli_query($db, $qry);
?>
<div class="row" style="height: 55px;">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>View Comments</label> 
			</div>
			<form name="addtexture1" action="../dao/insertLUT.php"
				  method="post" enctype="multipart/form-data"
				  onsubmit="return validateForm()">
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover nowrap" id="dataTables-example">
							<thead>
								<tr style="font-size: 11px;">
									<th>Comments</th>
									<th>Commented By</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
								while ($row_comments = mysqli_fetch_array($ses_sql1, MYSQLI_ASSOC))
								{
									?>
									<tr style="font-size: 10px;">
										<td><?php echo $row_comments['Comments']; ?></td>
										<td><?php echo $row_comments['Firstname']; ?></td>
										<td><?php echo $row_comments['Commenteddt']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->

	<?PHP
	include('../view/footer.php');
	?>

