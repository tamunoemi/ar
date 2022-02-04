<?php include('../functions.php');?>
<?php include('../login/auth.php');?>
<?php require_once('../helpers/parsecsv.php');?>
<?php

/********************************/
$line = $_POST['line'];
$databasetable = "blocked_domains";
$app = isset($_POST['app']) && is_numeric($_POST['app']) ? mysqli_real_escape_string($mysqli, (int)$_POST['app']) : exit;
$time = time();
/********************************/

//get comma separated lists belonging to this app
$q2 = 'SELECT id FROM '.LISTS.' WHERE app = '.$app;
$r2 = mysqli_query($mysqli, $q2);
if ($r2)
{
	$all_lists = '';
    while($row = mysqli_fetch_array($r2)) $all_lists .= $row['id'].',';
    $all_lists = substr($all_lists, 0, -1);
}

//if user did not enter anything
if($line=='')
{
	//show error msg
	header("Location: ".get_app_info('path').'/index.php/site/blacklist-blocked-domains?i='.$app.'&e=3'); 
	exit;
}

$line_array = explode("\r\n", $line);

foreach($line_array as $line)
{
	//cleanup line
	$line = trim($line," \t");
	$line = str_replace("\r","",$line);
	$line = str_replace('"','',$line);
	$line = str_replace("'",'',$line);
	
	//Remove any 'http' or 'https'
	$line = str_replace('http://', '', $line);
	$line = str_replace('https://', '', $line);
	
	//Check if email is valid
	if (is_valid_domain_name(trim($line)))
	{
		//Import immediately. Start by checking for duplicates
		$q = 'SELECT id FROM '.$databasetable.' WHERE app = '.$app.' AND domain = "'.$line.'"';
		$r = mysqli_query($mysqli, $q);
		if (mysqli_num_rows($r) == 0)
		{
			//insert email into database
			$q = 'INSERT INTO '.$databasetable.' (app, domain, timestamp) values('.$app.', "'.trim($line).'", '.$time.')';
			mysqli_query($mysqli, $q);
		}
	
		//delete email from any existing lists within the brand
		$q2 = 'DELETE FROM '.SUBSCRIBERS.' WHERE list IN ('.$all_lists.') AND email LIKE "%@'.trim($line).'"';
		mysqli_query($mysqli, $q2);
	}
}

//return
header("Location: ".get_app_info('path').'/index.php/site/blacklist-blocked-domains?i='.$app); 

?>