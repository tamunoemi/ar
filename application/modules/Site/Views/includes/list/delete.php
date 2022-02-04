<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	$list_id = isset($_POST['list_id']) && is_numeric($_POST['list_id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['list_id']) : exit;
	
	//delete autoresopnder emails
	$q = 'SELECT id FROM '.ARES.' WHERE list = '.$list_id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$ares_id = $row['id'];
			
			$q2 = 'DELETE FROM '.ARES_EMAILS.' WHERE ares_id = '.$ares_id;
			mysqli_query($mysqli, $q2);
	    }  
	}	
	//delete autoresponder
	$q = 'DELETE FROM '.ARES.' WHERE list = '.$list_id;
	mysqli_query($mysqli, $q);
	
	//delete segments
	$q = 'SELECT id FROM '.SEG.' WHERE list = '.$list_id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$seg_id = $row['id'];
			
			$q2 = 'DELETE FROM '.SEG_CONS.' WHERE seg_id = '.$seg_id;
			mysqli_query($mysqli, $q2);
	    }  
	}	
	//delete segments
	$q = 'DELETE FROM '.SEG.' WHERE list = '.$list_id;
	mysqli_query($mysqli, $q);
	
	//delete list and its subscribers
	$q = 'DELETE FROM '.LISTS.' WHERE id = '.$list_id.' AND userID = '.get_app_info('main_userID');
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		$q2 = 'DELETE FROM '.SUBSCRIBERS.' WHERE list = '.$list_id;
		$r2 = mysqli_query($mysqli, $q2);
		if ($r2)
		{
			//delete CSV file (in case it was uploaded and waiting for import by cron)
			$server_path_array = explode('delete.php', $_SERVER['SCRIPT_FILENAME']);
			$server_path = str_replace('includes/list/', '', $server_path_array[0]).'uploads/csvs/';
		
			$filename = $server_path.get_app_info('main_userID').'-'.$list_id.'.csv';
			
			if(file_exists($filename))	unlink($filename);
	
		    echo true; 
		}
	}
?>