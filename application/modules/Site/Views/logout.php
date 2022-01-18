<?php 
	include_once('includes/functions.php');
	
	if(unlog_session())
	{
		header('Location: '.get_app_info('path').'/index.php/auth/logins');
	}
?>