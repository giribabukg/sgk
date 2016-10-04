$(document).ready(function () {
	$('#dataTables-example').DataTable({
		responsive: true,
		scrollX: true,

	});
});

function myFunction(x) {
	// 
	//var x = document.getElementById("myBtn").value;
	var myWindow = window.open("../dao/viewcomment.php?phaseid=" + x, "MsgWindow", "width=500, height=350, scrollbars=1");
	//alert(x);
}
function myFunctionInsert(x) {
	//var x = document.getElementById("myBtn1").value;
	var y = "1";
	var z = y.concat(x);
	var comments = document.getElementById(z).value;
	//alert(comments);
	var myWindow = window.open('../dao/insertcomment.php?phaseid=' + x + '&comments=' + comments, 'MsgWindow', 'width=500, height=250');
}
function validateForm() {		
	if ($("#optiondesc").val == "")
	{
		alert("Please enter Option Description");
		return false;
	}
	if ($("#optionstate").val == "0")
	{
		alert("Please Select State");
		return false;
	}
	
	var optionwrap = document.getElementById("optionwrap").value;
	if (optionwrap == 0)
	{
		alert("Please select Wrap Code");
		return false;
	}
	var optionangel = document.getElementById("optionangel").value;
	if (optionangel == 0)
	{
		alert("Please enter Angle set");
		return false;
	}
	var opcat = document.getElementById("opcat").value;
	if (opcat == 0)
	{
		alert("Please enter Category");
		return false;
	}
	$("#process").val("insert_row");
	$("#option_frm").submit();
}

function open_wind(id)
{
	var myWindow = window.open("edit_popup.php?sub_process=show&process=view_option&rowid=" + id, "MsgWindow", "width=1300, height=600, scrollbars=1");	
}


function del_row(id)
{
	var res = confirm("Are you sure want to delete?");
	
	if (res===true)
	{
		$("#del_id").val(id);
		$("#delete_action #process").val("delete_row");
		$("#delete_action").submit();
	}
}