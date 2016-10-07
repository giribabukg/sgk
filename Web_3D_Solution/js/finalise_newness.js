/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
	$('#dataTables-example').DataTable({
		lengthMenu: [[10, 25, 50, 75, 100, 500, 1000], [10, 25, 50, 75, 100, 500, 1000]],
		responsive: true,
		scrollX: true,
	});
	$('#dataTables-example1').DataTable({
		lengthMenu: [[10, 25, 50, 75, 100, 500, 1000], [10, 25, 50, 75, 100, 500, 1000]],
		responsive: true,
		scrollX: true,
		ordering: false,
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

	$('#dataTables-example1').on('click', '.checkSingle' ,function () {
		var idd =$(this).attr("parent");
		if ($(this).is(":checked")) {
			$(".checkSingle[parent="+idd+"]").prop("checked", true);
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
			$(".checkSingle[parent="+idd+"]").prop("checked", false);
		}
	});


	var table = $('#dataTables-example1');
	$(table).delegate('.tr_clone_remove', 'click', function () {
		var thisRow = $(this).closest('tr')[0];
		thisRow.remove();
		var i = 1;
		$(".checkSingle").each(function () {
			$(this).val(i);
			i++;
		});
	});

	$(table).delegate('.tr_clone_add', 'click', function () {
		var thisRow = $(this).closest('tr')[0];

		var par_id = $(this).attr("id");
		start: while (true) {
			var random_num = Math.floor(Math.random() * 100);
			var gen_id = par_id + "_" + random_num;

			if ($("#" + gen_id).length > 0)
			{
				continue start;
			}
			break start;
		}
		var clo = $(thisRow).clone().insertAfter(thisRow);
		clo.find(".tr_clone_remove").css("display", "inline");
		clo.find(".tr_clone_remove").attr("id", par_id);
		clo.find(".tr_clone_add").css("display", "none");
		clo.find('input:text').val('');

		clo.find('[id]').each(function () {
			var $th = $(this);
			var newID = $th.attr('id').replace(/\d+$/, gen_id);
			$th.attr('id', newID);
			//$th.attr('id', "100");
		});
		var i = 1;
		$(".checkSingle").each(function () {
			//alert ($(this).val());
			$(this).val(i);
			i++;
		});
	});
});
function link_click(processname)
{
	$("#process").val(processname);
	$("#display_form").submit();
}

function update_range()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var fullarray = [];
	var error_flag = 0;
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#bead_opt_" + tempid).val() == "0")
		{
			alert("Please select Bead in row " + rowid + "!!!");
			error_flag = 1;
			return false;
		}
		if ($("#angle_set_" + tempid).val() == "0")
		{
			alert("Please select Angle set in row " + rowid + "!!!");
			error_flag = 1;
			return false;
		}
		str = $(this).attr("id") + "$$$$$" + $("#bead_opt_" + tempid).val() + "$$$$$" + $("#angle_set_" + tempid).val() + "$$$$$" + $("#comment_" + tempid).val();
		fullarray.push(str);
	})
	if (error_flag == 1)
		return false;
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	//alert (strtext);
	$("#range_frm #dataset").val(strtext);
	$("#range_frm").submit();
}

function update_texture1()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var fullarray = [];
	var error_flag = 0;
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#swrapcode_" + tempid).val() == "0")
		{
			alert("Please select Std Wrap Code in row " + rowid + "!!!");
			error_flag = 1;
			return false;
		}
		if ($("#awrapcode1_" + tempid).val() == "0")
		{
			alert("Please select Alt Wrap Code1 in row " + rowid + "!!!");
			error_flag = 1;
			return false;
		}
//		if ($("#awrapcode2_" + tempid).val() == "0")
//		{
//			alert("Please select Alt Wrap Code2 in row " + rowid + "!!!");
//			error_flag=1;
//			return false;
//		}
//		if ($("#awrapcode3_" + tempid).val() == "0")
//		{
//			alert("Please select Alt Wrap Code3 in row " + rowid + "!!!");
//			error_flag=1;
//			return false;
//		}
		if ($("#fab_design_" + tempid).val() == "0")
		{
			alert("Please select Alt Fabric Design in row" + rowid + "!!!");
			error_flag = 1;
			return false;
		}
		if ($("#text1_status_" + tempid).val() == "0")
		{
			alert("Please select Status in row " + rowid + "!!!");
			error_flag = 1;
			return false;
		}
		str = $(this).attr("id") + "$$$$$" + $("#swrapcode_" + tempid).val() + "$$$$$" + $("#awrapcode1_" + tempid).val() + "$$$$$" + $("#awrapcode2_" + tempid).val() + "$$$$$" + $("#awrapcode3_" + tempid).val() + "$$$$$" + $("#fab_design_" + tempid).val() + "$$$$$" + $("#text1_status_" + tempid).val() + "$$$$$" + $("#comment_" + tempid).val();
		fullarray.push(str);
	})
	if (error_flag == 1)
		return false;
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	//alert (strtext);
	$("#text1_frm #dataset").val(strtext);
	$("#text1_frm").submit();
}
function update_texture2()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var fullarray = [];
	var error_flag = 0;
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#text2_status_" + tempid).val() == "0")
		{
			alert("Please select Status in row " + rowid + "!!!");
			error_flag = 1;
			return false;
		}
		str = $(this).attr("id") + "$$$$$" + $("#text2_status_" + tempid).val() + "$$$$$" + $("#comment_" + tempid).val();
		fullarray.push(str);
	});
	if (error_flag == 1)
		return false;
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	//alert (strtext);
	$("#text2_frm #dataset").val(strtext);
	$("#text2_frm").submit();
}




function update_option()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var err_flag = 0;
	var fullarray = [];
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		//alert(tempid);
		rowid = $(this).val();
		if ($("#state_" + tempid).val() == "0")
		{
			alert("Please select State in row " + rowid + "!!!");
			err_flag = 1;
			return false;
		}
		if ($("#wrapcode1_" + tempid).val() == "0")
		{
			alert("Please select Wrap Code1 in row " + rowid + "!!!");
			err_flag = 1;
			return false;
		}
		//var idd=$(this).attr("id") 
		str = $(this).attr("parent") + "$$$$$" + $("#state_" + tempid).val() + "$$$$$" + $("#wrapcode1_" + tempid).val() + "$$$$$" + $("#main_angle_" + tempid).val() + "$$$$$" + $("#cam1_" + tempid).val() + "$$$$$" + $("#cam2_" + tempid).val() + "$$$$$" + $("#cam3_" + tempid).val() + "$$$$$" + $("#cam4_" + tempid).val() + "$$$$$" + $("#cam5_" + tempid).val() + "$$$$$" + $("#cam6_" + tempid).val() + "$$$$$" + $("#cam7_" + tempid).val() + "$$$$$" + $("#cam8_" + tempid).val() + "$$$$$" + $("#cam9_" + tempid).val() + "$$$$$" + $("#cam10_" + tempid).val() + "$$$$$" + $("#cam11_" + tempid).val() + "$$$$$" + $("#cam12_" + tempid).val() + "$$$$$" + $("#cam13_" + tempid).val() + "$$$$$" + $("#cam14_" + tempid).val() + "$$$$$" + $("#cam15_" + tempid).val() + "$$$$$" + $("#comment_" + tempid).val();
		fullarray.push(str);
	});
	if (err_flag == 1)
	{
		return false;
	}
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	//alert(strtext);
	$("#option_frm #dataset").val(strtext);
	$("#option_frm").submit();
}

function update_detailcode()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var err_flag = 0;
	var fullarray = [];
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#detail_" + tempid).val() == "")
		{
			alert("Please Enter Name in row " + rowid + "!!!");
			err_flag = 1;
			return false;
		}
		str = $(this).attr("id") + "$$$$$" + $("#detail_" + tempid).val();
		fullarray.push(str);
	});
	if (err_flag == 1)
	{
		return false;
	}
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	$("#detail_frm #dataset").val(strtext);
	$("#detail_frm").submit();
}

function update_foottype()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var err_flag = 0;
	var fullarray = [];
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#detail_" + tempid).val() == "")
		{
			alert("Please Enter Name in row " + rowid + "!!!");
			err_flag = 1;
			return false;
		}
		str = $(this).attr("id") + "$$$$$" + $("#detail_" + tempid).val();
		fullarray.push(str);
	});
	if (err_flag == 1)
	{
		return false;
	}
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	$("#foottype_frm #dataset").val(strtext);
	$("#foottype_frm").submit();
}

function update_model()
{
	var str = "";
	var tempid = "";
	var rowid = "";
	var flag = 0;
	var err_flag = 0;
	var fullarray = [];
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		flag = 1;
		tempid = $(this).attr("id");
		rowid = $(this).val();
		if ($("#model_status_" + tempid).val() == "0")
		{
			alert("Please select Status in row " + rowid + "!!!");
			err_flag = 1;
			return false;
		}
		str = $(this).attr("id") + "$$$$$" + $("#tempid_" + tempid).val() + "$$$$$" + $("#model_status_" + tempid).val() + "$$$$$" + $("#comment_" + tempid).val();
		fullarray.push(str);
	});
	if (err_flag == 1)
	{
		return false;
	}
	if (flag == 0)
	{
		alert("Please select atleast one Row!!!");
		return false;
	}
	var strtext = fullarray.toString();
	strtext = fullarray.join('|||||');
	$("#model_frm #dataset").val(strtext);
	$("#model_frm").submit();
}

function delRec_FinalNew(process){
	if(process == ''){
		return false;
	}
	var tempid = "";
	var delObj = {};
	var isRowChecked = false;
	var isValidatePass = true;
	$("input:checkbox[name=single_checkbox]:checked").each(function () {
		isRowChecked = true;
		tempid = $(this).attr("id");
		if ($("#comment_" + tempid).val() == "") {
			alert("Please enter comment in row " + tempid + "!!!");
			isValidatePass = false;
			return false;
		}
		var $comnt = ''
		if($("#comment_" + tempid).val()){
			$comnt = $("#comment_" + tempid).val();
		}

		delObj[tempid] = {comment:$comnt};
	});
	if (isRowChecked !== true) {
		alert("Please select atleast one Row!!!");
		return false;
	}

	if (isRowChecked === true && isValidatePass === true) {
		if(confirm("Are you sure? You really want to DELETE?")){
			var loadIndic = '';
			loadIndic = $('body').loadingIndicator();
			//$('#wrapper').fadeOut(1500);
			$.ajax({
			   type: "POST",
			   data: {delData:delObj, process:process},
			   url: "../dao/ajax_process.php",
			   success: function(msg){
			   		//loadIndic.hide();
			   		//$('#wrapper').fadeIn();
		   		  // console.log(msg);
			   		if(msg == 'done successfully'){
			   			window.location = 'finalise_newness.php?msg=1';
			   		} else {
			   			window.location = 'finalise_newness.php?msg=0';
			   		}
			     //$('.answer').html(msg);
			   }
			});
		}
	}
}

