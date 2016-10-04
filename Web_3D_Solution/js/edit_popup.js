/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validate_Form() {

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
		//alert("textwrapcode");
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
		alert("Please select  Season");
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

	//document.edit_form.submit()
	//alert ($('form').attr("id"));
	//$('form[name="edit_form"]').submit();
	//$( "form:first" ).submit();
	$("#edit_form").submit();
}
function close_text1()
{
	//window.opener.location.reload(true);
	window.opener.location.href="viewtexture1.php";
	window.close();
}
function close_text2()
{
	//window.opener.location.reload(true);
	window.opener.location.href="viewtexture2.php";
	window.close();
}
function close_range()
{
	//window.opener.location.reload(true);
	window.opener.location.href="range.php";
	window.close();
}

function close_popup()
{
	//window.opener.location.reload(true);
	window.opener.location.href="optioncode.php";
	window.close();
}

function validateForm1() {
	var texcolor2 = document.getElementById("texcolor2").value;
	if (texcolor2 == 0)
	{
		alert("Please enter Texture color");
		return false;
	}
	
	var textstatus = document.getElementById("textstatus").value;
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
	$("#edit_form1").submit();	
}

function validateForm2() 
	{
	var texitemno2 = document.getElementById("texitemno2").value;
	if (texitemno2 == 0)
	{
		alert("Please enter Item number");
		return false;
	}

	var texcolor2 = document.getElementById("texcolor2").value;
	if (texcolor2 == 0)
	{
		alert("Please enter Texture color");
		return false;
	}
	
	var textstatus = document.getElementById("textstatus").value;
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
	$("#edit_form2").submit();	
}


function check_data() {
	var opcat = document.getElementById("opcat").value;
	if (opcat == 0)
	{
		alert("Please enter Category");
		return false;
	}

	var optionmt = document.getElementById("optionmt").value;
	if (optionmt == 0)
	{
		alert("Please enter Material Type");
		return false;
	}

	var optionstate = document.getElementById("optionstate").value;
	if (optionstate == 0)
	{
		alert("Please enter State");
		return false;
	}
	
	
		var optionwrap = document.getElementById("optionwrap").value;
		//alert("optionwrap");
	if (optionwrap == 0)
	{
		alert("Please enter Texture Text wrapcode");
		return false;
	}
	var optionangel = document.getElementById("optionangel").value;
	if (optionangel == 0)
	{
		alert("Please enter Angle set");
		return false;
	}

	var optioncode = document.getElementById("optioncode").value;
	if (optioncode == 0)
	{
		alert("Please enter Option code");
		return false;
	}
	
	var optiondesc = document.getElementById("optiondesc").value;
	if (optiondesc == 0)
	{
		alert("Please enter Option description");
		return false;
	}

	$("#edit_form3").submit();	
}

function check_range() 
	{			
	var rengedesc = document.getElementById("rengedesc").value;
	if (rengedesc == 0)
	{
		alert("Please enter Range description");
		return false;
	}
	if ($("#range_mt").val() ==="0")
	{
		alert("Please select Material type");
		return false;
	}
	var rangebead = document.getElementById("rangebead").value;
	if (rangebead == 0)
	{
		alert("Please enter Range bead");
		return false;
	}
	
	var rangeangle = document.getElementById("rangeangle").value;
	if (rangeangle == 0)
	{
		alert("Please enter Range angle");
		return false;
	}
		var rangecat = document.getElementById("rangecat").value;
	if (rangecat == 0)
	{
		alert("Please enter Range category");
		return false;
	}
	
	$("#edit_form4").submit();
}