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
	var myWindow = window.open("../dao/viewcomment.php?phaseid="+x, "", "width=500, height=250");
	//alert(x);
}
function myFunctionInsert(x) {
	//var x = document.getElementById("myBtn1").value;
	var y = "1";
	var z = y.concat(x);
	var comments = document.getElementById(z).value;
	//alert(comments);
	var myWindow = window.open('../dao/insertcomment.php?phaseid='+x+'&comments='+comments, '', 'width=500, height=250');
}
function validateForm() {
	var e = document.getElementById("phaseseason");
    var strUser = e.options[e.selectedIndex].value;

    var strUser1 = e.options[e.selectedIndex].text;
    if(strUser==0)
    {
        alert("Please select a Season");
        return false;
    }

    var e1 = document.getElementById("phasecategory");
    var strUsers = e1.options[e1.selectedIndex].value;

    if(strUsers==0)
    {
        alert("Please select a Category");
        return false;
    }
   
}
