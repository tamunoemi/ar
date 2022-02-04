<?php 
	include('includes/functions.php');
	include('includes/login/auth.php');
	
	$ares_id = is_numeric($_POST['ares_id']) ? $_POST['ares_id'] : exit;
	$enable = is_numeric($_POST['enable']) ? $_POST['enable'] : exit;
	
	$q = 'UPDATE '.ARES_EMAILS.' SET enabled = '.$enable.' WHERE id = '.$ares_id;
	$r = mysqli_query($mysqli, $q);
	if ($r) echo 'success';
	else echo 'failed';
?>