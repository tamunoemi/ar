<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	//------------------------------------------------------//
	//                      	INIT                       //
	//------------------------------------------------------//
	
	$email_list_incl = isset($_POST['include_lists']) ? mysqli_real_escape_string($mysqli, $_POST['include_lists']) : exit;	
	$email_list_excl = isset($_POST['exclude_lists']) ? mysqli_real_escape_string($mysqli, $_POST['exclude_lists']) : exit;	
	$email_list_seg_incl = isset($_POST['include_lists_seg']) ? mysqli_real_escape_string($mysqli, $_POST['include_lists_seg']) : exit;	
	$email_list_seg_excl = isset($_POST['exclude_lists_seg']) ? mysqli_real_escape_string($mysqli, $_POST['exclude_lists_seg']) : exit;	
	
	//Check input
	$input = $email_list_incl.','.$email_list_excl.','.$email_list_seg_incl.','.$email_list_seg_excl;
	$input = str_replace(',', '', $input);
	if(!is_numeric($input)) exit;
	
	if($email_list_incl==0 && $email_list_seg_incl==0) 
	{
		echo 0; 
		exit;
	}
	if(($email_list_excl != 0 || $email_list_seg_excl != 0) && ($email_list_incl==0 && $email_list_seg_incl==0)) 
	{
		echo 0; 
		exit;
	}
	
	//Include main list query
	$main_query = $email_list_incl == 0 ? '' : SUBSCRIBERS.'.list in ('.$email_list_incl.') ';
	
	//Include segmentation query
	$seg_query = $main_query != '' && $email_list_seg_incl != 0 ? 'OR ' : ''; 
	$seg_query .= $email_list_seg_incl == 0 ? '' : '('.SUBSCRIBERS_SEG.'.seg_id IN ('.$email_list_seg_incl.')) ';
	
	//Exclude list query
	$exclude_query = $email_list_excl == 0 ? '' : SUBSCRIBERS.'.email NOT IN (SELECT email FROM '.SUBSCRIBERS.' WHERE list IN ('.$email_list_excl.')) ';
	
	//Exclude segmentation query
	$exclude_seg_query = $exclude_query != '' && $email_list_seg_excl != 0 ? 'AND ' : ''; 
	$exclude_seg_query .= $email_list_seg_excl == 0 ? '' : SUBSCRIBERS.'.email NOT IN (SELECT '.SUBSCRIBERS.'.email FROM '.SUBSCRIBERS.' LEFT JOIN '.SUBSCRIBERS_SEG.' ON ('.SUBSCRIBERS.'.id = '.SUBSCRIBERS_SEG.'.subscriber_id) WHERE '.SUBSCRIBERS_SEG.'.seg_id IN ('.$email_list_seg_excl.'))';
	
	//------------------------------------------------------//
	//                      FUNCTIONS                       //
	//------------------------------------------------------//
	
	//Check if we should send to GDPR subscribers only
	if($email_list_incl!=0) $q = 'SELECT gdpr_only FROM '.APPS.' LEFT JOIN '.LISTS.' ON ('.APPS.'.id = '.LISTS.'.app) WHERE '.LISTS.'.id IN ('.$email_list_incl.') LIMIT 1';
	else $q = 'SELECT gdpr_only FROM '.APPS.' LEFT JOIN '.SEG.' ON ('.APPS.'.id = '.SEG.'.app) WHERE '.SEG.'.id IN ('.$email_list_seg_incl.') LIMIT 1';
	$r = mysqli_query($mysqli, $q);
	if ($r) while($row = mysqli_fetch_array($r)) $gdpr_only = $row['gdpr_only'];
	$gdpr_line = $gdpr_only ? 'AND gdpr = 1 ' : '';
	
	//Get totals from lists
	$q  = 'SELECT 1 FROM '.SUBSCRIBERS;
	$q .= $email_list_seg_incl==0 && $email_list_seg_excl==0 ? ' ' : ' LEFT JOIN '.SUBSCRIBERS_SEG.' ON ('.SUBSCRIBERS.'.id = '.SUBSCRIBERS_SEG.'.subscriber_id) ';
	$q .= 'WHERE ('.$main_query.$seg_query.') ';
	$q .= $exclude_query != '' || $exclude_seg_query != '' ? 'AND ('.$exclude_query.$exclude_seg_query.') ' : '';
	$q .= 'AND '.SUBSCRIBERS.'.unsubscribed = 0 AND '.SUBSCRIBERS.'.bounced = 0 AND '.SUBSCRIBERS.'.complaint = 0 AND '.SUBSCRIBERS.'.confirmed = 1 '.$gdpr_line.'
		   GROUP BY '.SUBSCRIBERS.'.email';
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
	    $total = mysqli_num_rows($r);
	    echo $total;
	}
	else echo 'failed';
?>