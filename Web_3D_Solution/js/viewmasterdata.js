/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
	$.fn.editable.defaults.mode = 'popup';
	//$('.fields_enable').editable();
	
	$('#dataTables-example-Season').DataTable({
		responsive: true
	});

	$('#dataTables-example-Category').DataTable({
		responsive: true
	});
	$('#dataTables-example-StateLUT').DataTable({
		responsive: true
	});
	$('#dataTables-example-WrapcodeLUT').DataTable({
		responsive: true
	});
	$('#dataTables-example-BatchStatus').DataTable({
		responsive: true
	});
	$('#dataTables-example-ModelStatus').DataTable({
		responsive: true
	});
	$('#dataTables-example-FabricStatus').DataTable({
		responsive: true
	});
	$('#dataTables-example-Fabric').DataTable({
		responsive: true
	});
	$('#dataTables-example-WrapcodeOption').DataTable({
		responsive: true
	});
	$('#dataTables-example-Status').DataTable({
		responsive: true
	});
});

function myFunction(x) {
	// 
	//var x = document.getElementById("myBtn").value;
	var myWindow = window.open("../dao/viewcomment.php?phaseid=" + x, "MsgWindow", "width=700, height=350, scrollbars=1");
	//alert(x);
}
function myFunctionInsert(x) {
	//var x = document.getElementById("myBtn1").value;
	var y = "1";
	var z = y.concat(x);
	var comments = document.getElementById(z).value;
	//alert(comments);
	var myWindow = window.open('entermasterdatasub.php?phaseid=' + x + '&comments=' + comments, 'MsgWindow', 'width=500, height=250, scrollbars=1');
}
function validateForm() {
	var e = document.getElementById("phaseseason");
	var strUser = e.options[e.selectedIndex].value;

	var strUser1 = e.options[e.selectedIndex].text;
	if (strUser == 0)
	{
		alert("Please select a Season");
		return false;
	}

	var e1 = document.getElementById("phasecategory");
	var strUsers = e1.options[e1.selectedIndex].value;

	if (strUsers == 0)
	{
		alert("Please select a Category");
		return false;
	}

}

function link_click(myid) {
	$('#' + myid).editable({
		url: '../dao/ajax_process.php',
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		success: function (response) {
			var res = JSON.parse(response.toString());
			if (res.status === 'error')
			{
				return res.msg; //msg will be shown in editable form
			}
		},
		params: function (params) {
			//originally params contain pk, name and value
			params.process = "edit_masterdata";
			return params;
		},
		validate: function (v) {
			
			var col_name = $('#' + myid).attr('name');
			
			var reg = new RegExp('^[a-z_]+$');
			var reg1 = new RegExp('^[a-z_0-9A-Z ]+$');
			var int_reg = new RegExp('^[0-9]+$');
			var inp_count = new RegExp('^[1-5]{1}$');
			if (col_name === "projectname")
			{
				if (!v)
					return 'Project name cannot be empty!!';
				if (!reg.test(v))
					return 'Project name can consist of alphabets and _ only!!';
			}
			if (col_name === "noofinput")
			{
				if (!int_reg.test(v))
					return 'The value is not an integer!!';
				if (!inp_count.test(v))
					return 'Input count cannot be greater than 5!!';
			}
			if (col_name === "locationmas")
			{
				if (!v)
					return 'Location name cannot be empty!!';
				if (!reg1.test(v))
					return 'Location name can consist of alphabets, Numbers, spaces and _ only!!';
			}
			if (col_name === "accountmas")
			{
				if (!v)
					return 'Account name cannot be empty!!';
				if (!reg1.test(v))
					return 'Account name can consist of alphabets, Numbers, spaces and _ only!!';
			}


		}
	});

}
function del_row(id,header)
{
	var res = confirm("Are you sure want to delete?");
	
	if (res===true)
	{
		$("#del_id").val(id);
		$("#header_name").val(header);
		$("#delete_action").submit();
	}
}