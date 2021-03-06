<?php 
	//------------------------------------------------------//
	//                      FUNCTIONS                       //
	//------------------------------------------------------//
	
	$app = isset($_GET['i']) && is_numeric($_GET['i']) ? mysqli_real_escape_string($mysqli, (int)$_GET['i']) : exit;
	
	//------------------------------------------------------//
	function get_app_data($val)
	//------------------------------------------------------//
	{
		global $mysqli;
		$q = 'SELECT '.$val.' FROM '.APPS.' WHERE id = "'.get_app_info('app').'" AND userID = '.get_app_info('userID');
		$r = mysqli_query($mysqli, $q);
		if ($r && mysqli_num_rows($r) > 0)
		{
		    while($row = mysqli_fetch_array($r))
		    {
				return $row[$val];
		    }  
		}
	}
	
	//------------------------------------------------------//
	function get_saved_data($val)
	//------------------------------------------------------//
	{
		global $mysqli;
		global $app;
		
		$q = 'SELECT '.$val.' FROM '.APPS.' WHERE id = "'.mysqli_real_escape_string($mysqli, $app).'" AND userID = '.get_app_info('userID');
		$r = mysqli_query($mysqli, $q);
		if ($r && mysqli_num_rows($r) > 0)
		{
		    while($row = mysqli_fetch_array($r))
		    {
				return $row[$val];
		    }  
		}
	}
	
	//------------------------------------------------------//
	function get_login_data($val)
	//------------------------------------------------------//
	{
		global $mysqli;
		global $app;
		
		$q = 'SELECT '.$val.' FROM '.LOGIN.' WHERE app = '.mysqli_real_escape_string($mysqli, $app);
		$r = mysqli_query($mysqli, $q);
		if ($r && mysqli_num_rows($r) > 0)
		{
		    while($row = mysqli_fetch_array($r))
		    {
				return $row[$val];
		    }  
		}
	}
?>