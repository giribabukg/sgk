/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {


	$('#dataTables-example tfoot th').each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" placeholder="Search ' + title + '" />');
	});

	var table = $('#dataTables-example').DataTable({
		responsive: true,
		"paging": false,
	});

	table.columns().every(function () {
		var that = this;

		$('input', this.footer()).on('keyup change', function () {
			if (that.search() !== this.value) {
				that
						.search(this.value)
						.draw();
			}
		});
	});

	var parentDivs = $('#nestedAccordion div'),
			childDivs = $('#nestedAccordion h3').siblings('div');
	img1 = 'up.png',
			img2 = 'down.png';

	$('#nestedAccordion').on('click', 'h2', function () {
		parentDivs.slideUp();
		$('#nestedAccordion h2').find('img').attr('src', img2);
		$('#nestedAccordion h3').find('img').attr('src', img2);
		if ($(this).next().is(':hidden')) {
			$(this).next().slideDown();
			$(this).find('img').attr('src', img1);
		} else {
			$(this).next().slideUp();
			$(this).find('img').attr('src', img2);
		}
	});

	$('#nestedAccordion').on('click', 'h3', function () {
		childDivs.slideUp();
		$('#nestedAccordion h3').find('img').attr('src', img2);
		if ($(this).next().is(':hidden')) {
			$(this).next().slideDown();
			$(this).find('img').attr('src', img1);
		} else {
			$(this).next().slideUp();
			$(this).find('img').attr('src', img2);
		}
	});

});

function myFunction(x) {
	// 
	//var x = document.getElementById("myBtn").value;
	var myWindow = window.open("../dao/viewcomment.php?phaseid=" + x, "", "width=500, height=250");
	//alert(x);
}
function myFunctionInsert(x) {
	//var x = document.getElementById("myBtn1").value;
	var y = "1";
	var z = y.concat(x);
	var comments = document.getElementById(z).value;
	//alert(comments);
	var myWindow = window.open('../dao/insertcomment.php?phaseid=' + x + '&comments=' + comments, '', 'width=500, height=250');
}
function validateForm() {
	var checkboxValues = [];
	$('input[name=range_chk]:checked').map(function () {
		checkboxValues.push($(this).val());
	});
	var ids = checkboxValues.toString();
	if (ids === "")
	{
		alert("Please atleast select any one row!!!")
		return false;
	}
	$("#render_ids").val(ids);
	$("#process").val("render");
	$("#rangeform").submit();
	refresh_table();
//	$.post("../dao/ajax_process.php",
//			{
//				render_ids: ids,
//				process: "render"
//						// city: "Duckburg"
//			},
//	function (data, status) {
//		if (status == 'success')
//			alert("Data: " + data + "\nStatus: " + status);
//	});

}

function refresh_table()
{
	$("#process").val("refresh");
	$("#rangeform").submit();
}

function enable_popup(range_id)
{
	//$('#myModal').modal('hide');
	$.post("../dao/ajax_process.php",
			{
				rangeid: range_id,
				process: "show_percen"
			},
	function (data, status)
	{
		var json_array = $.parseJSON(data);
		$("#modal_title").html(json_array["title"]);
		$("#nestedAccordion").empty();

		var modal_approved_length = json_array["modal_approved_count"];
		var modal_not_approved_length = json_array["modal_not_approved_count"];
		var acc = "<h2 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Models (" + modal_approved_length + "/" + json_array["unique_model_count"] + ")</h2>";
		acc = acc + "<div>";
		if (modal_approved_length > 0)
		{
			acc = acc + "<h3 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Approved (" + modal_approved_length + ")</h3>";
			acc = acc + "<div>";
			for (var key in json_array["modal_approved"])
			{
				acc = acc + json_array["modal_approved"][key] + "<br>";
			}
			acc = acc + "</div>";
		}
//		else
//			acc = acc + "<div><h3 style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approved (" + modal_approved_length + ")</h3>";

		//acc = acc+"<div>Sub 1</div>";
		if (modal_not_approved_length > 0)
		{
			acc = acc + "<h3 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Non Approved (" + modal_not_approved_length + ")</h3>";
			acc = acc + "<div>";
			for (var key in json_array["modal_not_approved"])
			{
				acc = acc + json_array["modal_not_approved"][key] + "<br>";
			}
			acc = acc + "</div>";
		}
//		else
//			acc = acc + "<h3 style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non Approved (" + modal_not_approved_length + ")</h3>";
		acc = acc + "</div>";

		var fab_approved_length = json_array["fab_approved_count"];
		var fab_not_approved_length = json_array["fab_not_approved_count"];

		var acc = acc + "<h2 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Fabrics (" + fab_approved_length + "/" + json_array["unique_fab_count"] + ")</h2>";
		acc = acc + "<div>";
		if (fab_approved_length > 0)
		{
			acc = acc + "<h3 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Approved (" + fab_approved_length + ")</h3>";
			acc = acc + "<div>";
			for (var key in json_array["fab_approved"])
			{
				acc = acc + json_array["fab_approved"][key] + "<br>";
			}
			acc = acc + "</div>";
		}
//		else
//			acc = acc + "<h3 style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approved (" + fab_approved_length + ")</h3>";
		//acc = acc+"<div>Sub 1</div>";
		if (fab_not_approved_length > 0)
		{
			acc = acc + "<h3 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Non Approved (" + fab_not_approved_length + ")</h3>";
			acc = acc + "<div>";
			for (var key in json_array["fab_not_approved"])
			{
				acc = acc + json_array["fab_not_approved"][key] + "<br>";
			}
			acc = acc + "</div>";
		}
//		else
//			acc = acc + "<h3 style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non Approved (" + fab_not_approved_length + ")</h3>";
		acc = acc + "</div>";
		var feet_approved_length = json_array["feet_approved_count"];
		var feet_not_approved_length = json_array["feet_not_approved_count"];
		var acc = acc + "<h2 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Feet Colour (" + feet_approved_length + "/" + json_array["unique_feet_count"] + ")</h2>";
		acc = acc + "<div>";
		if (feet_approved_length > 0)
		{
			acc = acc + "<h3 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Approved (" + feet_approved_length + ")</h3>";
			acc = acc + "<div>";
			for (var key in json_array["feet_approved"])
			{
				acc = acc + json_array["feet_approved"][key] + "<br>";
			}
			acc = acc + "</div>";
		}
//		else
//			acc = acc + "<div><h3 style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approved (" + modal_approved_length + ")</h3>";

		//acc = acc+"<div>Sub 1</div>";
		if (feet_not_approved_length > 0)
		{
			acc = acc + "<h3 style='font-size:14px'><img id='show_img' src='down.png'>&nbsp;&nbsp;&nbsp;Non Approved (" + feet_not_approved_length + ")</h3>";
			acc = acc + "<div>";
			for (var key in json_array["feet_not_approved"])
			{
				acc = acc + json_array["feet_not_approved"][key] + "<br>";
			}
			acc = acc + "</div>";
		}
//		else
//			acc = acc + "<h3 style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non Approved (" + modal_not_approved_length + ")</h3>";

		acc = acc + "</div>";



		$("#nestedAccordion").append(acc);
	});
	$('#rangemodal').modal('show');
}
