<?php include('includes/functions.php');?>
<?php include('includes/login/auth.php');?>
<?php 
	$id = isset($_POST['id']) && is_numeric($_POST['id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['id']) : exit;
	
	$q = 'DELETE FROM '.ARES_EMAILS.' WHERE id = '.$id;
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		if(file_exists('uploads/attachments/a'.$id))
		{
			$files = glob('uploads/attachments/a'.$id.'/*'); // get all file names
			foreach($files as $file){
			    unlink($file); 
			}
			rmdir('uploads/attachments/a'.$id);
		}
		
		//Delete links
		$q2 = 'DELETE FROM '.LINKS.' WHERE ares_emails_id = '.$id;
		mysqli_query($mysqli, $q2);
		
		echo true;
	}
	
?>