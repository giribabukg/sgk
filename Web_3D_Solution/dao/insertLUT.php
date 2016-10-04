<?php
$errMsg = '';
include('config2.php');


$tables = $_POST ["tables"];

$t = time();
$timelog = date("dmYhms", $t);

if ($tables == "Texture1")
{
	$texitemno = $_POST ["texitemno"];
	$texname = $_POST ["texname"];
	$texcolor = $_POST ["texcolor"];
	$textseson = $_POST ["textseson"];
	$textcat = $_POST ["textcat"];
	$texfabdeg = $_POST ["texfabdeg"];
	$texmd = $_POST ["texmd"];
	$textwrapcode = $_POST ["textwrapcode"];
	$textwrapcode1 = $_POST ["textwrapcode1"];
	$textwrapcode2 = $_POST ["textwrapcode2"];
	$textwrapcode3 = $_POST ["textwrapcode3"];
	$textstatus = $_POST ["textstatus"];
	$texcomments = $_POST ["texcomments"];

	$dup_qry = "SELECT COUNT(id) as Texture1RecExists FROM next_texture_lookup_table WHERE Texture_Item_No='$texitemno'";
	$dup_qry = mysqli_query($db, $dup_qry);
	$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
	$texture1RecExists = $dup_qry_row["Texture1RecExists"];

	if($texture1RecExists == 0){

		$sql_insert_comment = "INSERT INTO next_texture_lookup_table(Texture_Item_No,Texture_Name,Texture_Color,StdWrapCode,AltWrapCode1,
		AltWrapCode2,AltWrapCode3,FabricDesign,MaterialType,Status,Season,Category,AddedBy) VALUES
		(
		'$texitemno','$texname','$texcolor','$textwrapcode','$textwrapcode1','$textwrapcode2','$textwrapcode3'
		,'$texfabdeg','$texmd','$textstatus','$textseson','$textcat','$personId_session')";

		if (mysqli_query($db, $sql_insert_comment))
		{
			$errMsg = "Texture 1 data succesfully inserted.";
			$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [] Texture 1 data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		} else
		{
			$errMsg = "Texture 1 data not succesfully inserted.";
			$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [] Texture 1 data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		}



		//echo $id_texture1;

		$newid = "TexO" . $id_texture1;
		//echo $newid;
		$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcomments','$newid',$personId_session)";
		if (mysqli_query($db, $sql_insert_comment1))
		{
			$errMsg .= " Comments succesfully inserted.";
			$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [] comments successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
		} else
		{
			$errMsg .= " Comments not succesfully inserted.";
			$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [] comments Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
		}
	} else
	{
		$errMsg = "Texture 1 data not succesfully inserted. Record already Exists.";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Error: [] Texture 1 data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
	}
	header("location:../view/viewtexture1.php?msg=".trim(base64_encode($errMsg)));
}

if ($tables == "Texture2")
{
	//$texitemno = $_POST ["texitemno2"];
	$texcolor = trim(addslashes($_POST ["texcolor2"]));
	$textseson = $_POST ["textseson2"];
	$textcat = $_POST ["textcat2"];
	$textstatus = $_POST ["textstatus2"];
	$texcomments = trim(addslashes($_POST ["texcomments2"]));

	$dup_qry = "SELECT COUNT(id) as texture2RecExists FROM next_texturesec_lookup_table WHERE Texture_Color='$texcolor'";
	$dup_qry = mysqli_query($db, $dup_qry);
	$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
	$texture2RecExists = $dup_qry_row["texture2RecExists"];

	if($texture2RecExists == 0){
		$sql_insert_comment = "INSERT INTO next_texturesec_lookup_table(Texture_Color,Status,Season,Category,AddedBy) VALUES
		('$texcolor','$textstatus','$textseson','$textcat','$personId_session')";

		if (mysqli_query($db, $sql_insert_comment))
		{
			$sql_id = mysqli_query($db, " select id from next_texturesec_lookup_table ORDER BY dateadded DESC LIMIT 1");
			$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
			$id_texture1 = $row_id['id'];

			$strtest = "TIN2-" . str_pad($id_texture1, 3, "0", STR_PAD_LEFT);
			$upd_qry = "update next_texturesec_lookup_table set Texture_Item_No='$strtest' where id=$id_texture1";
			mysqli_query($db, $upd_qry);
			
			$errMsg = "Texture 2 data succesfully inserted.";
			$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [] Texture 2 data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		} else
		{
			$errMsg = "Texture 2 data not succesfully inserted.";
			$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [] Texture 2 data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		}

		//echo $id_texture1;

		if ($texcomments)
		{
			$newid = "TexS" . $id_texture1;
			//echo $newid;
			$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcomments','$newid',$personId_session)";
			if (mysqli_query($db, $sql_insert_comment1))
			{
				$errMsg .= "  Comments succesfully inserted.";
				$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Success: [] comments successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
				error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
			} else
			{
				$errMsg .= "Comments not succesfully inserted.";
				$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Error: [] comments Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
				error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
			}
		}
	} else {
		$errMsg = "Texture 2 data not succesfully inserted. Record already Exists.";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Error: [] Texture 1 data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
	}
	header("location:../view/viewtexture2.php?msg=".trim(base64_encode($errMsg)));
}

if ($tables == "Option")
{
	$opcat = $_POST ["opcat"];
	//$optionmt = $_POST ["optionmt"];
	$optionstate = $_POST ["optionstate"];
	$optionwrap = $_POST ["optionwrap"];
	$optionangel = $_POST ["optionangel"];
	$optioncode = $_POST ["optioncode"];
	$optiondesc = $_POST ["optiondesc"];
	$optcomments = $_POST ["optcomments"];
	$_onecangle = $_POST ["_onecangle"];
	$_twocangle = $_POST ["_twocangle"];
	$_threecangle = $_POST ["_threecangle"];
	$_fourcangle = $_POST ["_fourcangle"];
	$_fivecangle = $_POST ["_fivecangle"];
	$_sixcangle = $_POST ["_sixcangle"];
	$_sevencangle = $_POST ["_sevencangle"];
	$_eightcangle = $_POST ["_eightcangle"];
	$_ninecangle = $_POST ["_ninecangle"];
	$_tencangle = $_POST ["_tencangle"];
	$_elevencangle = $_POST ["_elevencangle"];
	$_twelvecangle = $_POST ["_twelvecangle"];
	$_thirteencangle = $_POST ["_thirteencangle"];
	$_forteencangle = $_POST ["_forteencangle"];
	$_fifteencangle = $_POST ["_fifteencangle"];
	$_maincangle = $_POST ["maincangle"];


	$sql_insert_comment = "INSERT INTO next_option_lookup_table(
	Category,
	State,
	WrapCode_Option,
	AngleSet,
	Option_Code,
	Description,
	Main,
	_1,
	_2,
	_3,
	_4,
	_5,
	_6,
	_7,
	_8,
	_9,
	_10,
	_11,
	_12,
	_13,
	_14,
	_15,
	AddedBy
	) VALUES
	(
	'$opcat',
	'$optionstate',
	'$optionwrap',
	'$optionangel',
	'$optioncode',
	'$optiondesc'
	,'$_maincangle',
	'$_onecangle',
	'$_twocangle',
	'$_threecangle',
	'$_fourcangle',
	'$_fivecangle',
	'$_sixcangle',
	'$_sevencangle',
	'$_eightcangle',
	'$_ninecangle',
	'$_tencangle',
	'$_elevencangle',
	'$_twelvecangle',
	'$_thirteencangle',
	'$_forteencangle',
	'$_fifteencangle',
	'$personId_session')";

	if (mysqli_query($db, $sql_insert_comment))
	{
		echo "Option Code data succesfully inserted. Redirecting to Option Code Data Add page in 3 secs...";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Success: [] Texture 1 data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		header("refresh:3;url=../view/optioncode.php");
	} else
	{
		echo "Option Code data not succesfully inserted. Redirecting to Option Code Data Add page in 3 secs...";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Error: [] Texture 1 data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		header("refresh:3;url=../view/optioncode.php");
	}


	$sql_id = mysqli_query($db, " select id from next_option_lookup_table ORDER BY dateadded DESC LIMIT 1");
	$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
	$id_texture1 = $row_id['id'];

	//echo $id_texture1;

	$newid = "OptC" . $id_texture1;
	//echo $newid;
	$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$optcomments	','$newid',$personId_session)";
	if (mysqli_query($db, $sql_insert_comment1))
	{
		echo "Comments succesfully inserted.";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Success: [] comments successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
	} else
	{
		echo "Comments not succesfully inserted.";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Error: [] comments Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
	}
}

if ($tables == "Range")
{
	$rengedesc = $_POST ["rengedesc"];
	$rangebead = $_POST ["rangebead"];
	$rangemt = $_POST ["range_mt"];
	$rangeangle = $_POST ["rangeangle"];
	$rangecat = $_POST ["rangecat"];
	$rangecomments = $_POST ["rangecomments"];
	//$texcomments = $_POST ["texcomments2"];

	$sql_insert_comment = "INSERT INTO next_range_lookup_table(Range_desc,Bead_Option,Angle_Set_Option,material_type,Category,AddedBy) VALUES
	('$rengedesc','$rangebead','$rangeangle','$rangemt','$rangecat','$personId_session')";

	if (mysqli_query($db, $sql_insert_comment))
	{
		$sql_id = mysqli_query($db, " select id from next_range_lookup_table ORDER BY dateAdded DESC LIMIT 1");
		$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
		$rangeid = $row_id['id'];

		$strtest = "RA" . str_pad($rangeid, 5, "0", STR_PAD_LEFT);
		$upd_qry = "update next_range_lookup_table set range_id='$strtest' where id=$rangeid";
		mysqli_query($db, $upd_qry);

		echo "Range data succesfully inserted. Redirecting to Texture 2 Data Add page in 3 secs...";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Success: [] Texture 2 data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		header("refresh:3;url=../view/range.php");
	} else
	{
		echo "Range data not succesfully inserted. Redirecting to Texture 2 Add page in 3 secs...";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Error: [] Texture 2 data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment . "\n", 3, "../log/Transaction.log");
		header("refresh:3;url=../view/range.php");
	}


	$sql_id = mysqli_query($db, " select id from next_texturesec_lookup_table ORDER BY dateadded DESC LIMIT 1");
	$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
	$id_texture1 = $row_id['id'];

	//echo $id_texture1;

	$newid = "Ran" . $id_texture1;
	//echo $newid;
	$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$rangecomments','$newid',$personId_session)";
	if (mysqli_query($db, $sql_insert_comment1))
	{
		echo "Comments succesfully inserted.";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Success: [] comments successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
	} else
	{
		echo "Comments not succesfully inserted.";
		$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
		error_log($timelog . " => Error: [] comments Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
		error_log($sql_insert_comment1 . "\n", 3, "../log/Transaction.log");
	}
}


/* echo "texitemno ".$texitemno."</br>";
  echo "texname ".$texname ."</br>";
  echo "texcolor ".$texcolor."</br>";
  echo "textseson ".$textseson ."</br>";
  echo "textcat ".$textcat ."</br>";
  echo "texfabdeg ".$texfabdeg ."</br>";
  echo "texmd ".$texmd."</br>";
  echo "textwrapcode ".$textwrapcode ."</br>";
  echo "textwrapcode1 ".$textwrapcode1."</br>";
  echo "textwrapcode2 ".$textwrapcode2."</br>";
  echo "textwrapcode3 ".$textwrapcode3."</br>";
  echo "textstatus ".$textstatus ."</br>";
  echo "texcomments ".$texcomments ."</br>"; */
mysqli_close($db);
?>