<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	/********************************/
	$l = isset($_POST['l']) && is_numeric($_POST['l']) ? mysqli_real_escape_string($mysqli, (int)$_POST['l']) : '';
	/********************************/
	
	//Delete skipped emails
	$q = 'DELETE FROM '.SKIPPED_EMAILS.' WHERE list = '.$l;
	$r = mysqli_query($mysqli, $q);
	echo $r ? true : false;
?>