<?php
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
    $pass_encrypted = hash('sha512', $pass.'PectGtma');
    if(isset($_POST['redirect'])) $redirect_to = $_POST['redirect'];
    else $redirect_to = '';
    $time = time();

    $q = 'SELECT id, tied_to, app, auth_enabled, auth_key FROM login WHERE username = "'.$email.'" AND password = "'.$pass_encrypted.'" '.$app_id_line.' ORDER BY id ASC LIMIT 1';
	$r = mysqli_query($mysqli, $q);

    if ($r && mysqli_num_rows($r) > 0)
	{
	    while($row = mysqli_fetch_array($r))
	    {
			$userID = $row['id'];
			$tied_to = $row['tied_to'];
			$auth_enabled = $row['auth_enabled'];
			$_SESSION['auth_key'] = $row['auth_key'];
			$_SESSION['restricted_to_app'] = $row['app'];
			$_SESSION['userID'] = $userID;
	    }
    }
?>