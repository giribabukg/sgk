<?php

include('../dao/config.php');
session_start();
//$user_check=$_POST['username'];
//Get Id and firstname
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db, "SELECT id,firstname FROM next_system_login_table where username='$user_check' ");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['firstname'];
$personId_session = $row['id'];
$_SESSION ['login_id'] = $personId_session;
$_SESSION ['user_name'] = $login_session;

//number of registred people
$ses_sql1 = mysqli_query($db, "SELECT count(id) as number FROM next_system_login_table");
$row1 = mysqli_fetch_array($ses_sql1, MYSQLI_ASSOC);
$noofpeople_session = $row1['number'];

//get season masterdata
$seasonmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Season'");

//get category masterdata
$categorymasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Category'");

$categorymasterdata_sql1 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Category'");

//get Normal Status 
$statusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Status'");

//get Normal Status
$wrapcodemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Wrapcode LUT'");

$wrapcodemasterdata_sql1 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");
$wrapcodemasterdata_sql2 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");
$wrapcodemasterdata_sql3 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");

//get Fabric
$fabricmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Fabric'");

$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Fabric Status'");

//get Material
$matmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Material Type LUT'");

//get State
$wrapopmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Wrapcode Option'");

//get Bead
$beadmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Bead Option'");



//get Wrap Code Option
$statemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'State LUT'");

//get Wrap Code Option
$anglesetmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
next_master_header_detail b
WHERE a.headerid = b.id
AND b.HeaderName = 'Angle Set LUT'");

// get all range data
$sql_range = "SELECT Range_desc,
(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Bead Option'
		AND aa.bead_option = a.id
	) AS bead,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Angle Set LUT'
		AND aa.angle_set_option = a.id
	) AS angle,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Category'
		AND aa.Category = a.id
	) AS Category,
	bb.Firstname,
	bb.secondname,
	dateadded,
	isapproved,
	dateapproved,aa.id
	FROM 
	next_range_lookup_table aa,
	next_system_login_table bb
	WHERE aa.Addedby = bb.id";

$range_sql = mysqli_query($db, $sql_range);

while ($row_range = mysqli_fetch_array($range_sql, MYSQLI_ASSOC))
{
	//echo $row_master_header['headername'];
	$collectionrange = $row_range['Range_desc'] . "/**/" . $row_range['bead']
			. "/**/" . $row_range['angle'] . "/**/" . $row_range['Category'] . "/**/" . $row_range['Firstname'] . " " . $row_range['secondname']
			. "/**/" . $row_range['dateadded'] . "/**/" . $row_range['isapproved']
			. "/**/" . $row_range['dateapproved'] . "/**/" . $row_range['id'];
	$rangearray[] = $collectionrange;
}


//get all newness data
//$newnessdata_sql = mysqli_query($db, "Select * from next_main_upload_newness");
//
//while ($row_newness = mysqli_fetch_array($newnessdata_sql, MYSQLI_ASSOC))
//{
//	//echo $row_newness['six_two_six'];
//	/* $collectiontexture2 = $row_texture2['Texture_Item_no']."/** /".$row_texture2['Texture_Color']
//	  ."/** /".$row_texture2['STATUS']."/** /".$row_texture2['Season']."/** /".$row_texture2['Category']
//	  ."/** /".$row_texture2['dateadded']."/** /".$row_texture2['Firstname']." ".$row_texture2['secondname']."/** /".$row_texture2['isapproved']
//	  ."/** /".$row_texture2['dateapproved']."/** /".$row_texture2['id'];
//	  $texture2array[] = $collectiontexture2; */
//
//	$collectionnewnes = $row_newness['id'] . "/**/" . $row_newness['six_two_six'];
//	$newnessarray [] = $collectionnewnes;
//}

//get all range overview
//$rangeoverview_sql = mysqli_query($db, "Select * from next_range_overview_table");

$rangeoverview_sql = mysqli_query($db, "SELECT id,Phaseval,Rangeval,batchid,RenderVol,range_status,Date,PhaseId,model_percen,fabric_percen,feet_percen,RenderVol,overall_percen, batchid
FROM
next_range_overview_table a");
while ($row_rangeoverview = mysqli_fetch_array($rangeoverview_sql, MYSQLI_ASSOC))
{
	$collectionrangeoverview = $row_rangeoverview['Phaseval'] . "/**/" . $row_rangeoverview['Rangeval'] . "/**/" . $row_rangeoverview['batchid']
			. "/**/" . $row_rangeoverview['RenderVol'] . "/**/" . $row_rangeoverview['range_status'] . "/**/" . $row_rangeoverview['Date'] . "/**/" . $row_rangeoverview['PhaseId']
			. "/**/" . $row_rangeoverview['model_percen'] . "/**/" . $row_rangeoverview['fabric_percen']."/**/" . $row_rangeoverview['id']."/**/".$row_rangeoverview['feet_percen']."/**/".$row_rangeoverview['RenderVol']."/**/".$row_rangeoverview['overall_percen']."/**/".$row_rangeoverview['batchid'];
	
	$rangeoverviewarray [] = $collectionrangeoverview;
}

//get all texture 2 data
$sql_texture2 = "SELECT aa.id,Texture_Item_no,Texture_Color,DateAdded,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Status'
		AND aa.Status = a.id
	) AS STATUS
	,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Season'
		AND aa.Season = a.id
	) AS Season,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Category'
		AND aa.Category = a.id
	) AS Category,
	bb.Firstname,
	bb.secondname,
	dateadded,
	isapproved,
	dateapproved
	FROM 
	next_texturesec_lookup_table aa,
	next_system_login_table bb
	WHERE aa.Addedby = bb.id";

$texture2_sql = mysqli_query($db, $sql_texture2);

while ($row_texture2 = mysqli_fetch_array($texture2_sql, MYSQLI_ASSOC))
{
	//echo $row_master_header['headername'];
	$collectiontexture2 = $row_texture2['Texture_Item_no'] . "/**/" . $row_texture2['Texture_Color']
			. "/**/" . $row_texture2['STATUS'] . "/**/" . $row_texture2['Season'] . "/**/" . $row_texture2['Category']
			. "/**/" . $row_texture2['dateadded'] . "/**/" . $row_texture2['Firstname'] . " " . $row_texture2['secondname'] . "/**/" . $row_texture2['isapproved']
			. "/**/" . $row_texture2['dateapproved'] . "/**/" . $row_texture2['id'];
	$texture2array[] = $collectiontexture2;
}

//get all option code data
$sql_optioncode = "	SELECT	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Category'
		AND aa.Category = a.id
	) AS Category
	,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName =  'Material Type LUT'
		AND aa.MaterialType = a.id
	) AS material,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'State LUT'
		AND aa.State = a.id
	) AS state,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode Option'
		AND aa.Wrapcode_option = a.id
	) AS wrap,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Angle Set LUT'
		AND aa.Angleset = a.id
	) AS angle,
	Option_code,
	Description,
	main,
	_1,_2,_3,_4,_5,_6,_7,_8,_9,_10,_11,_12,_13,_14,_15,
	bb.Firstname,
	bb.secondname,
	dateadded,
	isapproved,
	dateapproved,aa.id
	FROM 
	next_option_lookup_table aa,
	next_system_login_table bb
	WHERE aa.Addedby = bb.id";

$optioncode_sql = mysqli_query($db, $sql_optioncode);

while ($row_optioncode = mysqli_fetch_array($optioncode_sql, MYSQLI_ASSOC))
{
	//echo $row_master_header['headername'];
	$collectionoptioncode = $row_optioncode['Category'] . "/**/" . $row_optioncode['material']
			. "/**/" . $row_optioncode['state'] . "/**/" . $row_optioncode['wrap'] . "/**/" . $row_optioncode['angle']
			. "/**/" . $row_optioncode['Option_code'] . "/**/" . $row_optioncode['Description'] . "/**/" . $row_optioncode['main'] . "/**/" . $row_optioncode['_1']
			. "/**/" . $row_optioncode['_2'] . "/**/" . $row_optioncode['_3'] . "/**/" . $row_optioncode['_4'] . "/**/" . $row_optioncode['_5']
			. "/**/" . $row_optioncode['_6'] . "/**/" . $row_optioncode['_7'] . "/**/" . $row_optioncode['_8'] . "/**/" . $row_optioncode['_9']
			. "/**/" . $row_optioncode['_10'] . "/**/" . $row_optioncode['_11'] . "/**/" . $row_optioncode['_12'] . "/**/" . $row_optioncode['_13']
			. "/**/" . $row_optioncode['_14'] . "/**/" . $row_optioncode['_15'] . "/**/" . $row_optioncode['Firstname'] . " " . $row_optioncode['secondname']
			. "/**/" . $row_optioncode['dateadded'] . "/**/" . $row_optioncode['isapproved'] . "/**/" . $row_optioncode['dateapproved']
			. "/**/" . $row_optioncode['id'];
	$optioncodearray[] = $collectionoptioncode;
}

//get all texture 1 data
$sql_texture1 = "SELECT aa.id,Texture_Item_no,Texture_Name,Texture_Color,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.StdWrapCode = a.id
	) AS StandardWrapCode,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.AltWrapCode1 = a.id
	) AS AltWrapCode1,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.AltWrapCode2 = a.id
	) AS AltWrapCode2,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.AltWrapCode3 = a.id
	) AS AltWrapCode3,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Fabric'
		AND aa.FabricDesign = a.id
	) AS FabricDesign,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Material Type LUT'
		AND aa.MaterialType = a.id
	) AS MaterialType,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Status'
		AND aa.Status = a.id
	) AS STATUS
	,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Season'
		AND aa.Season = a.id
	) AS Season,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Category'
		AND aa.Category = a.id
	) AS Category,
	bb.Firstname,
	bb.secondname,
	dateadded,
	isapproved,
	dateapproved
	FROM 
	next_texture_lookup_table aa,
	next_system_login_table bb
	WHERE aa.Addedby = bb.id";


$texture1_sql = mysqli_query($db, $sql_texture1);

while ($row_texture1 = mysqli_fetch_array($texture1_sql, MYSQLI_ASSOC))
{
	//echo $row_master_header['headername'];
	$collectiontexture1 = $row_texture1['Texture_Item_no'] . "/**/" . $row_texture1['Texture_Name'] . "/**/" . $row_texture1['Texture_Color']
			. "/**/" . $row_texture1['StandardWrapCode'] . "/**/" . $row_texture1['AltWrapCode1'] . "/**/" . $row_texture1['AltWrapCode2']
			. "/**/" . $row_texture1['AltWrapCode3'] . "/**/" . $row_texture1['FabricDesign'] . "/**/" . $row_texture1['MaterialType']
			. "/**/" . $row_texture1['STATUS'] . "/**/" . $row_texture1['Season'] . "/**/" . $row_texture1['Category']
			. "/**/" . $row_texture1['dateadded'] . "/**/" . $row_texture1['Firstname'] . " " . $row_texture1['secondname'] . "/**/" . $row_texture1['isapproved']
			. "/**/" . $row_texture1['dateapproved'] . "/**/" . $row_texture1['id'];
	$texture1array[] = $collectiontexture1;
}


/* $categorymd=array(""=>"",""=>"");
  while($row_category_md=mysqli_fetch_array($categorymasterdata_sql,MYSQLI_ASSOC))
  {

  array_push($categorymd,$row_category_md["id"],$row_category_md["dataname"]);
  } */

/* $row_category_md=mysqli_fetch_array($categorymasterdata_sql,MYSQLI_ASSOC);

  while($row_category_md=mysqli_fetch_array($categorymasterdata_sql,MYSQLI_ASSOC))
  {

  //echo "Key=" . $x . ", Value=" . $x_value;
  //echo "<br>";
  echo '<option value="'.$row_category_md['id'].'">'.$row_category_md['dataname'].'</option>';
  }

  /*foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
  }
  //get phase table */




$phase_all = array();
/* $phase_all_data=mysqli_query($db,"SELECT 
  (SELECT b.dataname FROM
  next_master_header_detail a,
  next_master_data_detail b,
  next_main_phase_table c
  WHERE a.headername IN ('Season')
  AND b.headerid IN( a.id )
  AND b.id IN(c.SeasonId)
  AND c.seasonid = m.seasonid) Season,
  (SELECT b.dataname FROM
  next_master_header_detail a,
  next_master_data_detail b,
  next_main_phase_table c
  WHERE a.headername IN ('Category')
  AND b.headerid IN( a.id )
  AND b.id IN(c.categoryId)
  AND c.categoryid = m.categoryid) Category,
  Description descs,
  brieffilename brief,
  uploadeddt
  FROM
  next_main_phase_table m"); */




$texture1_all = mysqli_query($db, "SELECT m.phaseid phaseid,a.dataname Season, b.dataname Category,
m.Description descs,
brieffilename brief,
m.uploadeddt FROM
next_master_data_detail a
,next_master_data_detail b
,next_main_phase_table m
WHERE a.id = m.seasonid
AND b.id = m.categoryid");

//number of phase
$phase_sql1 = mysqli_query($db, "SELECT count(id) as number FROM next_main_phase_table");
$rowphase = mysqli_fetch_array($phase_sql1, MYSQLI_ASSOC);
$noofphase_session = $rowphase['number'];

//masterheader 
$masterheader = mysqli_query($db, "SELECT id,headername dataname FROM next_master_header_detail;");

//masterdata data view
$masterdataarray = array();
$masterdataview = mysqli_query($db, "SELECT headername FROM next_master_header_detail ");
$temp = "NA";
$temp1 = "NA";
$arrayheader = array();

while ($row_master_header = mysqli_fetch_array($masterdataview, MYSQLI_ASSOC))
{
	//echo $row_master_header['headername'];
	$masterdataarray[] = $row_master_header['headername'];
}
$dataPoints = array();


//echo "</br>";

/* echo "</br>"; */




//mysqli_close($db);
if (!isset($login_session))
{
	header("Location: ../index.php");
}
?>