<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php

/********************************/
$userID = get_app_info('main_userID');
$app = isset($_POST['app']) && is_numeric($_POST['app']) ? mysqli_real_escape_string($mysqli, (int)$_POST['app']) : exit;
$listID = isset($_POST['list_id']) && is_numeric($_POST['list_id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['list_id']) : exit;
$line = $_POST['line'];
/********************************/

//if user did not enter anything
if($line=='')
{
	//show error msg
	header("Location: ".get_app_info('path').'/index.php/site/delete-from-list?i='.$app.'&l='.$listID.'&e=2'); 
	exit;
}

$line_array = explode("\r\n", $line);

for($i=0;$i<count($line_array);$i++)
{
	$q = 'DELETE FROM '.SUBSCRIBERS.' WHERE email = "'.mysqli_real_escape_string($mysqli, trim($line_array[$i])).'" AND list = '.$listID.' AND userID = '.$userID;
	$r = mysqli_query($mysqli, $q);
	if ($r){}
}

header("Location: ".get_app_info('path').'/index.php/site/subscribers?i='.$app.'&l='.$listID); 

?>
