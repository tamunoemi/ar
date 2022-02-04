<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	//------------------------------------------------------//
	//                      	INIT                       //
	//------------------------------------------------------//
	$tid = isset($_GET['t']) && is_numeric($_GET['t']) ? mysqli_real_escape_string($mysqli, $_GET['t']) : exit;
	$aid = isset($_GET['i']) && is_numeric($_GET['i']) ? mysqli_real_escape_string($mysqli, $_GET['i']) : exit;
	
	if(get_app_info('is_sub_user')) 
	{
		if(get_app_info('app')!=get_app_info('restricted_to_app'))
		{
			echo '<script type="text/javascript">window.location="'.addslashes(get_app_info('path')).'index.php/site/templates?i='.get_app_info('restricted_to_app').'"</script>';
			exit;
		}
		$q = 'SELECT app FROM '. TEMPLATE .' WHERE id = '.$tid;
		$r = mysqli_query($mysqli, $q);
		if ($r)
		{
		    while($row = mysqli_fetch_array($r))
		    {
				$a = $row['app'];
		    }  
		    if($a!=get_app_info('restricted_to_app'))
		    {
			    echo '<script type="text/javascript">window.location="'.addslashes(get_app_info('path')).'index.php/site/templates?i='.get_app_info('restricted_to_app').'"</script>';
				exit;
		    }
		}
	}
	
	//------------------------------------------------------//
	//                      FUNCTIONS                       //
	//------------------------------------------------------//
	
	//Get brand info
	$q = 'SELECT app_name, from_name, from_email, reply_to, query_string FROM '. APPS .' WHERE id = '.$aid;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$app_name = $row['app_name'];
			$from_name = $row['from_name'];
			$from_email = $row['from_email'];
			$reply_to = $row['reply_to'];
			$query_string = $row['query_string'];
	    }  
	}
	
	//Get template
	$q = 'SELECT template_name, html_text FROM '. TEMPLATE .' WHERE id = '.$tid;
	$r = mysqli_query($mysqli, $q);
	if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$template_name = $row['template_name'];
			$html_text = stripslashes($row['html_text']);
	    }  
	}
	
	//Create new campaign with template
	$q = 'INSERT INTO '. CAMPAIGNS .' (userID, app, from_name, from_email, reply_to, query_string, title, html_text, wysiwyg) VALUES ('.get_app_info('main_userID').', '.$aid.', "'.$from_name.'", "'.$from_email.'", "'.$reply_to.'", "'.$query_string.'", "'.$template_name.'", "'.addslashes($html_text).'", 1)';
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
	    $campaign_id = mysqli_insert_id($mysqli);
	    header("Location: ".get_app_info('path')."/index.php/site/edit?i=".get_app_info('app')."&c=$campaign_id");
	}
	else echo _('Failed to create new campaign with template, please try again.');
?>

