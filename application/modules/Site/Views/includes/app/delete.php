<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	$id = isset($_POST['id']) && is_numeric($_POST['id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['id']) : exit;
	
	//delete links
	$q = 'SELECT id FROM '.CAMPAIGNS.' WHERE app = '.$id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$campaign_id = $row['id'];
			
			$q2 = 'DELETE FROM '.LINKS.' WHERE campaign_id = '.$campaign_id;
			mysqli_query($mysqli, $q2);
	    }  
	}
	
	//Delete campaigns
	$q3 = 'DELETE FROM '.CAMPAIGNS.' WHERE app = '.$id;
	$r3 = mysqli_query($mysqli, $q3);
	
	//Delete subscribers, ARs and Segs
	$q = 'SELECT id FROM '.LISTS.' WHERE app = '.$id;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0) 
	{
		while($row = mysqli_fetch_array($r)) 
		{
			$list_id = $row['id'];
			
			//Delete subscribers
			$q2 = 'DELETE FROM '.SUBSCRIBERS.' WHERE list = '.$list_id;
			mysqli_query($mysqli, $q2);
			
			//Delete autoresponders
			$q2 = 'SELECT id FROM '.ARES.' WHERE list = '.$list_id;
			$r2 = mysqli_query($mysqli, $q2);
			if ($r2 && mysqli_num_rows($r2) > 0)
			{
			    while($row = mysqli_fetch_array($r2))
			    {
					$ares_id = $row['id'];
					
					$q2 = 'DELETE FROM '.ARES_EMAILS.' WHERE ares_id = '.$ares_id;
					mysqli_query($mysqli, $q2);
			    }  
			    
			    $q2 = 'DELETE FROM '.ARES.' WHERE list = '.$list_id;
				mysqli_query($mysqli, $q2);
			}
			
			//Delete segments
			$q2 = 'SELECT id FROM '.SEG.' WHERE list = '.$list_id;
			$r2 = mysqli_query($mysqli, $q2);
			if ($r2 && mysqli_num_rows($r2) > 0)
			{
			    while($row = mysqli_fetch_array($r2))
			    {
					$seg_id = $row['id'];
					
					$q3 = 'DELETE FROM '.SEG_CONS.' WHERE seg_id = '.$seg_id;
					mysqli_query($mysqli, $q3);
					
					$q4 = 'DELETE FROM '.SUBSCRIBERS_SEG.' WHERE seg_id = '.$seg_id;
					mysqli_query($mysqli, $q4);
			    }  
			    
			    $q5 = 'DELETE FROM '.SEG.' WHERE list = '.$list_id;
				mysqli_query($mysqli, $q5);
			}
		}
	}
	
	//Delete lists
	$q3 = 'DELETE FROM '.LISTS.' WHERE app = '.$id;
	mysqli_query($mysqli, $q3);
	
	
	//Delete login
	$q = 'DELETE FROM '.LOGIN.' WHERE app = '.$id;
	mysqli_query($mysqli, $q);
	
	//Delete templates
	$q = 'DELETE FROM '.TEMPLATE.' WHERE app = '.$id;
	mysqli_query($mysqli, $q);
	
	//Delete zapier
	$q = 'DELETE FROM '.ZAPIER.' WHERE app = '.$id;
	mysqli_query($mysqli, $q);
	
	//Delete blocked_domains
	$q = 'DELETE FROM '.BLOCKED_DOMAINS.' WHERE app = '.$id;
	mysqli_query($mysqli, $q);
	
	//Delete suppression_list
	$q = 'DELETE FROM '.SUPPRESSION_LIST.' WHERE app = '.$id;
	mysqli_query($mysqli, $q);
	
	//Delete skipped_emails
	$q = 'DELETE FROM '.SKIPPED_EMAILS.' WHERE app = '.$id;
	mysqli_query($mysqli, $q);
	
	//Delete app
	$q = 'DELETE FROM '.APPS.' WHERE id = '.$id;
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
	    echo true;
	}
	
?>