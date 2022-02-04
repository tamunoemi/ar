<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	$subscriber_id = isset($_POST['subscriber_id']) && is_numeric($_POST['subscriber_id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['subscriber_id']) : exit;
	$action = $_POST['action'];
	$time = time();
	
	if($action=='unsubscribe')
		$q = 'UPDATE '.SUBSCRIBERS.' SET unsubscribed = 1, timestamp = '.$time.' WHERE id = '.$subscriber_id.' AND userID = '.get_app_info('main_userID');
	else if($action=='resubscribe')
		$q = 'UPDATE '.SUBSCRIBERS.' SET unsubscribed = 0, timestamp = '.$time.' WHERE id = '.$subscriber_id.' AND userID = '.get_app_info('main_userID');
	else if($action=='confirm')
		$q = 'UPDATE '.SUBSCRIBERS.' SET confirmed = 1, timestamp = '.$time.' WHERE id = '.$subscriber_id.' AND userID = '.get_app_info('main_userID');
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		echo true; 
	}
	
?>