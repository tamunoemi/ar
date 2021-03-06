<?php require('includes/functions.php');?>
<?php require('includes/login/auth.php');?>
<?php 
	$campaign_id = isset($_POST['campaign_id']) && is_numeric($_POST['campaign_id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['campaign_id']) : exit;
	
	//Get the existing number of quota_deducted
	$q = 'SELECT app, quota_deducted FROM '.CAMPAIGNS.' WHERE id = '.$campaign_id;
	$r = mysqli_query($mysqli, $q);
	if ($r) 
	{
		while($row = mysqli_fetch_array($r)) 
		{
			$app = $row['app'];
			$current_quota_deducted = $row['quota_deducted']=='' ? 0 : $row['quota_deducted'];
		}
		
		//Check if monthly quota needs to be updated
		$q2 = 'SELECT allocated_quota, current_quota FROM '.APPS.' WHERE id = '.$app;
		$r2 = mysqli_query($mysqli, $q2);
		if($r2) 
		{
			while($row2 = mysqli_fetch_array($r2)) 
			{
				$allocated_quota = $row2['allocated_quota'];
				$current_quota = $row2['current_quota'];
			}
		}
		$updated_quota = $current_quota - $current_quota_deducted;
		
		//Update quota if a monthly limit was set
		if($allocated_quota!=-1)
		{			
			//if so, update quota
			$q3 = 'UPDATE '.APPS.' SET current_quota = '.$updated_quota.' WHERE id = '.$app;
			mysqli_query($mysqli, $q3);
		}
	}
	
	$q = 'DELETE FROM '.CAMPAIGNS.' WHERE id = '.$campaign_id.' AND userID = '.get_app_info('main_userID');
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		$q2 = 'DELETE FROM '.LINKS.' WHERE campaign_id = '.$campaign_id;
		$r2 = mysqli_query($mysqli, $q2);
		if ($r2)
		{
			if(file_exists('uploads/attachments/'.$campaign_id))
			{
				$files = glob('uploads/attachments/'.$campaign_id.'/*'); // get all file names
				foreach($files as $file){
				    unlink($file); 
				}
				rmdir('uploads/attachments/'.$campaign_id);
			}
		    echo true; 
		}
	}
	
?>