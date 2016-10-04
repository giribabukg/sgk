/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
	$('#dataTables-example').DataTable({
		//responsive: true,
		"scrollX": true
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

	var texitemno = document.getElementById("texitemno").value;
	if (texitemno == 0)
	{
		alert("Please enter Texture Item Number");
		return false;
	}

	var texname = document.getElementById("texname").value;
	if (texname == 0)
	{
		alert("Please enter Texture Item Name");
		return false;
	}

	var texcolor = document.getElementById("texcolor").value;
	if (texcolor == 0)
	{
		alert("Please enter Texture Color");
		return false;
	}
	
	var textwrapcode = document.getElementById("textwrapcode").value;
	if (textwrapcode == 0)
	{
		alert("Please enter Texture Text wrapcode");
		return false;
	}
	var textwrapcode1 = document.getElementById("textwrapcode1").value;
	if (textwrapcode1 == 0)
	{
		alert("Please enter Texture Text wrapcode1");
		return false;
	}

	var textwrapcode2 = document.getElementById("textwrapcode2").value;
	if (textwrapcode2 == 0)
	{
		alert("Please enter Texture Text wrapcode2");
		return false;
	}

	var textwrapcode3 = document.getElementById("textwrapcode3").value;	
	if (textwrapcode3 == 0)
	{
		alert("Please enter Texture Text wrapcode3");
		return false;
	}

	var e = document.getElementById("textseson");
	var strUser = e.options[e.selectedIndex].value;

	var strUser1 = e.options[e.selectedIndex].text;
	if (strUser == 0)
	{
		alert("Please select Season");
		return false;
	}

	var e1 = document.getElementById("textcat");
	var strUsers = e1.options[e1.selectedIndex].value;

	if (strUsers == 0)
	{
		alert("Please select  Category");
		return false;
	}

	var texfabdeg = document.getElementById("texfabdeg");
	var texfabdeg1 = texfabdeg.options[texfabdeg.selectedIndex].value;


	if (texfabdeg1 == 0)
	{
		alert("Please select Fabric Design");
		return false;
	}

	var texmd = document.getElementById("texmd");
	var texmd1 = texmd.options[texmd.selectedIndex].value;


	if (texmd1 == 0)
	{
		alert("Please select Material Design");
		return false;
	}


	var texmd = document.getElementById("texmd");
	var texmd1 = texmd.options[texmd.selectedIndex].value;

	if (texmd1 == 0)
	{
		alert("Please select Material Design");
		return false;
	}


	var textstatus = document.getElementById("textstatus");
	var textstatus1 = textstatus.options[textstatus.selectedIndex].value;

	if (textstatus1 == 0)
	{
		alert("Please select Status");
		return false;
	}
}

// function validateForm() {
	// var e = document.getElementById("phaseseason");
	// var strUser = e.options[e.selectedIndex].value;

	// var strUser1 = e.options[e.selectedIndex].text;
	// if (strUser == "")
	// {
		// alert("Please select a Season");
		// return false;
	// }

	// var e1 = document.getElementById("phasecategory");
	// var strUsers = e1.options[e1.selectedIndex].value;

	// if (strUsers == "")
	// {
		// alert("Please select a Category");
		// return false;
	// }

// }


function open_wind(id)
{
	var myWindow = window.open("edit_popup.php?sub_process=show&process=view_texture1&rowid=" + id, "MsgWindow", "width=1000, height=600, scrollbars=1");	
}


function del_row(id)
{
	var res = confirm("Are you sure want to delete?");
	
	if (res===true)
	{
		$("#del_id").val(id);
		$("#delete_action").submit();
	}
}