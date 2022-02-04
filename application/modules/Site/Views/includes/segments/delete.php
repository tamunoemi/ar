<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php	
	$sid = is_numeric($_POST['sid']) ? $_POST['sid'] : exit;
	
	$q = 'DELETE FROM '.SEG.' WHERE id = '.$sid;
	$q2 = 'DELETE FROM '.SEG_CONS.' WHERE seg_id = '.$sid;
    $q3 = 'DELETE FROM '.SUBSCRIBERS_SEG.' WHERE seg_id = '.$sid;
	$r = mysqli_query($mysqli, $q);
	$r2 = mysqli_query($mysqli, $q2);
	$r3 = mysqli_query($mysqli, $q3);
	if ($r && $r2 && $r3)
		echo 'deleted';  
	else
		echo 'failed';
?>