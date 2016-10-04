<?PHP
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}
?>
<html>
<body style="background: url(<?PHP echo $proj_path; ?>/expire.jpg) no-repeat center center fixed;" >
</body>
</html>
<?PHP exit; ?>