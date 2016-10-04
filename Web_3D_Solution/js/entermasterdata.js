
$(document).ready(function () {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});
function validateForm() {
	var e = document.getElementById("masterds");
	var strUser = e.options[e.selectedIndex].value;

	var strUser1 = e.options[e.selectedIndex].text;
	if (strUser == 0)
	{
		alert("Please select a Header");
		return false;
	}

	var comments = document.getElementById("masterd").value;
	if (comments == 0)
	{
		alert("Please enter Data");
		return false;
	}



}

function validateMaster() {

	var comments = document.getElementById("masterh").value;
	if (comments == 0)
	{
		alert("Please enter Header");
		return false;
	}
}
