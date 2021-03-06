<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 	
	//init
	$lid = isset($_POST['list_id']) && is_numeric($_POST['list_id']) ? (int)mysqli_real_escape_string($mysqli, $_POST['list_id']) : 0;
	$userID = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
    
	$server_path_array = explode('/index.php/site/list/progress', $_SERVER['SCRIPT_FILENAME']);
	$server_path = str_replace('includes/list/', '', $server_path_array[0]);
	if(file_exists($server_path.'/uploads/csvs/'.$userID.'-'.$lid.'.csv'))
	{
		$csv_file = $server_path.'/uploads/csvs/'.$userID.'-'.$lid.'.csv';
		$linecount = count(file($csv_file));
	}
	else
		$linecount = 0;
	
	//Get subscriber count
	$q = "SELECT COUNT(*) FROM ".SUBSCRIBERS." WHERE list = '$lid' AND unsubscribed = 0 AND bounced = 0 AND complaint = 0 AND confirmed = 1";
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		while($row = mysqli_fetch_array($r)) $count = $row['COUNT(*)'];
		
		//Get prev_count and currently_processing
		$q = 'SELECT prev_count, currently_processing, app FROM '.LISTS.' WHERE id = '.$lid;
		$r = mysqli_query($mysqli, $q);
		if ($r) 
		{
			while($row = mysqli_fetch_array($r)) 
			{
				$prev_count = $row['prev_count'];
				$currently_processing = $row['currently_processing'];
				$app = $row['app'];
			}
		}
		
		//If import is completed
		if($linecount==0)
		{
			//Redirect to subscribers page for this list
			echo '<script type="text/javascript">window.location = "'.get_app_info('path').'/index.php/site/subscribers?i='.$app.'&l='.$lid.'";</script>';
		}
		//else, showing progress
		else
		{
			$percentage = $currently_processing ? ($count-$prev_count) / $linecount * 100 : 0;
			echo '<span class="badge badge-success">'.$count.'</span>'.' <span style="color:#488846;">('.round($percentage).'%)</span> <img src="img/loader.gif" style="width:16px;"/>';
		}
	}
?>