/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
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
	var myWindow = window.open('../dao/insertcomment.php?phaseid='+x+'&comments='+comments, 'MsgWindow', 'width=500, height=250');
}
function validateForm() {
	if ($("#rengedesc").val() ==="")
	{
		alert("Please enter Range Description");
		return false;
	}
	if ($("#range_mt").val() ==="0")
	{
		alert("Please select Material type");
		return false;
	}
	if ($("#rangebead").val() ==="0")
	{
		alert("Please select Bead option");
		return false;
	}
	if ($("#rangeangle").val() ==="0")
	{
		alert("Please select Angle set option");
		return false;
	}
	if ($("#rangecat").val() ==="0")
	{
		alert("Please select Category");
		return false;
	}
	$("#process").val("insert_row");
	$("#range_frm").submit();
}

function open_wind(id)
{
	var myWindow = window.open("edit_popup.php?sub_process=show&process=view_range&rowid=" + id, "MsgWindow", "width=1000, height=600, scrollbars=1");	
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
