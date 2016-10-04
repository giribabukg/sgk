/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});

function myFunction(x) {
	// 
	//var x = document.getElementById("myBtn").value;
	var myWindow = window.open("../dao/viewcomment.php?phaseid=" + x, "MsgWindow", "width=900, height=500, scrollbars=1");
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
function validateForm2()
{
	var texcolor2 = document.getElementById("texcolor2").value;
	if (texcolor2 == 0)
	{
		alert("Please enter Texture color");
		return false;
	}

	var textstatus = document.getElementById("textstatus2").value;
	if (textstatus == 0)
	{
		alert("Please enter Status");
		return false;
	}
	var textseson2 = document.getElementById("textseson2").value;
	if (textseson2 == 0)
	{
		alert("Please enter Season");
		return false;
	}
	var textcat2 = document.getElementById("textcat2").value;
	if (textcat2 == 0)
	{
		alert("Please enter Category");
		return false;
	}
	$("#addtexture2").submit();
}



function del_row(id)
{
	var res = confirm("Are you sure want to delete?");

	if (res === true)
	{
		$("#del_id").val(id);
		$("#delete_action").submit();
	}
}

function open_wind(id)
{
	var myWindow = window.open("edit_popup.php?sub_process=show&process=view_texture2&rowid=" + id, "MsgWindow", "width=1000, height=600, scrollbars=1");
}

