<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php

/********************************/
$userID = get_app_info('main_userID');
$new_list_name = mysqli_real_escape_string($mysqli, $_POST['list_name']);
$app = mysqli_real_escape_string($mysqli, $_POST['app']);
/********************************/

//add new list
$q = 'INSERT INTO '.LISTS.' (app, userID, name) VALUES ('.$app.', '.$userID.', "'.$new_list_name.'")';
$r = mysqli_query($mysqli, $q);
if ($r)
{
    $listID = mysqli_insert_id($mysqli);
}

//return
header("Location: ".get_app_info('path').'/index.php/site/update-list?i='.$app.'&l='.$listID); 

?>
