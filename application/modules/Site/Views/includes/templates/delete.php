<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	$template_id = isset($_POST['template_id']) && is_numeric($_POST['template_id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['template_id']) : exit;
	
	//delete list and its subscribers
	$q = 'DELETE FROM '.TEMPLATE.' WHERE id = '.$template_id.' AND userID = '.get_app_info('main_userID');
	$r = mysqli_query($mysqli, $q);
	if ($r) echo true; 
	else echo false;
?>