<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 	
	$campaign_id = isset($_POST['campaign_id']) && is_numeric($_POST['campaign_id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['campaign_id']) : exit;
	$campaign_title = mysqli_real_escape_string($mysqli, $_POST['campaign_title']);
	
	//Update campaign title
	$q = 'UPDATE '.CAMPAIGNS.' SET label = "'.$campaign_title.'" WHERE id = '.$campaign_id;
	$r = mysqli_query($mysqli, $q);
	if ($r) echo true;
	else echo false;
?>