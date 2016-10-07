
<div class="row" id="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <!-- /.panel-heading -->
			<div class="panel-body">
				
					<div class="dataTable_wrapper">
						<div style="padding-bottom:10px;font-size:21px;font-weight: bold;">Detail Code</div>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_detailcode()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="delRec_FinalNew('<?php echo DETAIL_CODE; ?>')" style="margin-bottom: 15px;margin-left: 10px;"><span class="glyphicon glyphicon-remove"></span> Delete</a>
						<table class="table table-condensed table-striped table-bordered table-hover nowrap" id="dataTables-example">
							<thead>
								<tr style="font-size: 10px;">
									<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
									<th title="Name">Name <font color="red">*</font></th>
									<th title="Description">Description</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							$query1 = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND detail_code_error=1 GROUP BY bed_detail";
							$query1 = mysqli_query($db, $query1);
							while ($row_texture1 = mysqli_fetch_array($query1, MYSQLI_ASSOC))
							{
								$counter++;
								$temp_id = $row_texture1["id"];
								$bed_detail = $row_texture1["bed_detail"];
								$phaseid = $row_texture1["phaseid"];
								$qry = "SELECT b.DataName as season, c.DataName as cat FROM next_main_phase_table a, next_master_data_detail b,next_master_data_detail c WHERE PhaseId='$phaseid' AND a.SeasonId=b.id AND a.categoryId=c.id";
								$qry = mysqli_query($db, $qry);
								$result_set = mysqli_fetch_array($qry, MYSQLI_ASSOC);
								$season = $result_set['season'];
								$cat = $result_set['cat'];
								
								?>
								<tr style="font-size: 10px;">
									<td><input type="checkbox" class="form-control input-sm checkSingle" id="<?PHP echo $temp_id;?>" name="single_checkbox" value="<?PHP echo $counter;?>"></td>
									<td><input type="text" class="form-control input-sm" name="detail" id="detail_<?PHP echo $temp_id;?>"></td>
									<td><?php echo $bed_detail ?></td>
								</tr>	
								<?php
							}
						?>
						</tbody>
					</table>
					<form action="finalise_newness.php" method="post" name="detail_frm" id="detail_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_detail">
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