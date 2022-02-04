<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	//------------------------------------------------------//
	//                      	INIT                       //
	//------------------------------------------------------//
	
	$app_id = isset($_POST['id']) && is_numeric($_POST['id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['id']) : exit;
	$filename = mysqli_real_escape_string($mysqli, filter_var($_POST['filename'],FILTER_SANITIZE_SPECIAL_CHARS));
	
	//------------------------------------------------------//
	//                      FUNCTIONS                       //
	//------------------------------------------------------//
	
	//delete file
	if(unlink('uploads/logos/'.basename($filename)))
	{
		//Remove filename from database
		$q = 'UPDATE '.APPS.' SET brand_logo_filename = \'\' WHERE id = '.$app_id;
		$r = mysqli_query($mysqli, $q);
		if ($r) echo true;
	}
?>