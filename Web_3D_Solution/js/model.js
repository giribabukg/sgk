/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
	$('#dataTables-example').DataTable({
		responsive: true,
		"scrollX": true
	});
		$('#checkedAll').on('click', function () {
		if (this.checked) {
			$(".checkSingle").each(function () {
				this.checked = true;
			})
		} else {
			$(".checkSingle").each(function () {
				this.checked = false;
			})
		}
	});

	$('.checkSingle').on('click', function () {
		if ($(this).is(":checked")) {
			var isAllChecked = 0;
			$(".checkSingle").each(function () {
				if (!this.checked)
					isAllChecked = 1;
			})
			if (isAllChecked == 0) {
				$("#checkedAll").prop("checked", true);
			}
		} else {
			$("#checkedAll").prop("checked", false);
		}
	});
});

function update_dbmodel()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var err_flag=0;
	var fullarray =[];
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#model_status_" + tempid).val() == "0")
		{
			alert("Please select Status in row " + rowid + "!!!");
			err_flag=1;
			return false;
		}
		str = $(this).attr("id")+"$$$$$"+$("#model_status_" + tempid).val()+"$$$$$"+$("#cat_" + tempid).val();
		fullarray.push(str);
	});
	if (err_flag==1)
	{
		return false;
	}
	if (flag==0)
	{
		alert ("Please select atleast one Row!!!");
		return false;
	}
	var strtext=fullarray.toString();
	 strtext = fullarray.join('|||||');
	$("#model_frm #dataset").val(strtext);
	$("#model_frm").submit();
}