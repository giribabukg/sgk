/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
	$('#dataTables-example').DataTable({
		responsive: true
	});

	$('#spinner').ajaxStart(function () {
		$(this).fadeIn('fast');
	}).ajaxStop(function () {
		$(this).stop().fadeOut('fast');
	});

});

function del_phase(pid)
{
	var result = confirm("Are you sure want to delete the Phase. It cannot be reverted back?");
	if (result === false)
	{
		return false;
	}
	$("#delid").val(pid);
	$("#delphase").submit();
}
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
	var myWindow = window.open('../dao/insertcomment.php?phaseid=' + x + '&comments=' + comments, 'MsgWindow', 'width=500, height=250');
}



function check_validation_new() {

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
	if ($("#brief").val() == "")
	{
		alert("Please select a file");
		return false;
	}

	//var file = _("brief").files[0];
	
	var file = new FormData($("#uploadphase")[0]);
	//alert (file);
//	var progress = $(".loading-progress").progressTimer({
//		timeLimit: 40,
////		onFinish: function () {
//////			$('#myModal').modal({
//////				show: true,
//////				keyboard: false
//////			});
////			//alert('completed!');
////			//location.reload();
////		}
//	});
	//$('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');

	//$('#spinner').fadeIn('fast');
	document.getElementById('modal').style.display = 'block';
	document.getElementById('fade').style.display = 'block';
	$.ajax({
		url: '../dao/briefupload.php',
		type: 'POST',
		data: file,
		processData: false,
		contentType: false,
	}).done(function (data)
	{
		document.getElementById('modal').style.display = 'none';
		document.getElementById('fade').style.display = 'none';
		//$('#spinner').stop().fadeOut('fast');
//		setTimeout(function () {
//			$('#loading').html();
//		}, 2000);
		var res = data.split("-");
		if (res[0] === "Allold")
		{
			//call second procedure
			$('#myModal').modal('hide');
			location.reload();
		}
		else
		{
			var json_array = $.parseJSON(data);
			var i = 1;
			var acc = "";
			var div_class = "";
			$("#accordion").empty();
			for (var key in json_array)
			{
				if (key == "phaseid")
					continue;
				if (i == 1)
					div_class = "in";

				acc = "<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#collapse" + i + "'>" + key + "</a></h4></div><div id='collapse" + i + "' class='panel-collapse collapse " + div_class + "'><div class='panel-body'>";
				for (var key1 in json_array[key])
				{
					acc = acc + "<p>" + json_array[key][key1] + "</p>";
				}
				$("#accordion").append(acc + "</div></div></div");
				i++;
				div_class = "";
			}
			$("#phaseid").val(json_array["phaseid"]);
			$('#myModal').modal({show: true, keyboard: false});
			//progress.progressTimer('complete');
		}
	});
}

function cancel_upload()
{
	var result = confirm("Are you sure want to cancel Import process?");
	if (result === false)
	{
		return false;
	}
	$('#myModal').modal('hide');
	$.post("../dao/ajax_process.php",
			{
				phaseid: $("#phaseid").val(),
				process: "cancel_import"
			},
	function (data, status) {
		location.reload();
	});
}

//function check_newness(phid)
//{
//	$.post("../dao/ajax_process.php",
//			{
//				phaseid: phid,
//				process: "check_newness",
//				dataType: "JSON",
//			},
//			function (data, status) {
//				//if (data === "Allold")
//				if (data.indexOf("Allold") != -1)
//				{
//					var res = data.split("-");
//					//call second procedure
//					//progress.progressTimer('complete');
//					$('#myModal').modal('hide');
//					$.post("../dao/ajax_process.php",
//							{
//								phaseid: res[1],
//								process: "call_store"
//							},
//					function (data, status) {
//						//location.reload();
//					});
//				}
//				else
//				{
//					var json_array = $.parseJSON(data);
//					var i = 1;
//					var acc = "";
//					var div_class = "";
//					$("#accordion").empty();
//					for (var key in json_array)
//					{
//						if (key == "phaseid")
//							continue;
//						if (i == 1)
//							div_class = "in";
//
//						acc = "<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#collapse" + i + "'>" + key + "</a></h4></div><div id='collapse" + i + "' class='panel-collapse collapse " + div_class + "'><div class='panel-body'>";
//						for (var key1 in json_array[key])
//						{
//							acc = acc + "<p>" + json_array[key][key1]["data"] + "</p>";
//						}
//						$("#accordion").append(acc + "</div></div></div");
//						i++;
//						div_class = "";
//					}
//					$("#phaseid").val(json_array["phaseid"]);
//					$('#myModal').modal({show: true, keyboard: false});
//					//progress.progressTimer('complete');
//				}
//			});
//}


function insert_lookups()
{

//	var result = confirm("Are you sure want to Insert all the info into the relevent LUTs?");
//	if (result === "true")
//	{
//		$('#myModal').modal('hide');
//		$.post("../dao/ajax_process.php",
//		{
//			phaseid: $("#phaseid").val(),
//			process: "insert_lookup",
//			dataType: "JSON",
//		},
//		function (data, status) {
//			//check_newness
//			if (data === "Allold")
//			{
//				//call second procedure
//				//progress.progressTimer('complete');
//				ignore_newness()
//			}
//			else
//			{
//				//call check_newness
//				check_newness($("#phaseid").val())
//			}
//		});
	//}
	//move to new screen

}

//function ignore_newness()
//{
//	$('#myModal').modal('hide');
//	$.post("../dao/ajax_process.php",
//	{
//		phaseid: $("#phaseid").val(),
//		process: "call_store"
//	},
//	function (data, status) {
//		location.reload();
//	});
//}

