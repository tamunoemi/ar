<?php
defined('BASEPATH') OR exit('No direct script access allowed');


 class User_model extends Ion_auth_model {
    public function __construct()
    {
        //$this->load->database();
    }

    public function session_set($username, $password){
		if(isset($_POST['redirect'])) $redirect_to = $_POST['redirect'];
		else $redirect_to = '';
		$time = time();
        $query = $this->db->select('id, tied_to, app, auth_enabled, auth_key, password')
						  ->where('username', $username)
						  ->limit(1)
						  ->get('login');

        if ($query->num_rows() === 1)
        {
            $user = $query->row();
            $userID = $user->id;
			$tied_to = $user->tied_to;
			$auth_enabled = $user->auth_enabled;
            $_SESSION['auth_key'] = $user->auth_key;
            $_SESSION['restricted_to_app'] = $user->app;
            $_SESSION['userID'] = $userID;

			if ($this->bcrypt->verify($password, $user->password))
			{
				//Reset any pending password requests
				$reset_password_update = array('reset_password_key' => "");
				$this->db->where('id', $userID);
				$this->db->update('login', $reset_password_update);

				//If 2FA enabled
				if($auth_enabled)
				{
					$_SESSION['cookie'] = hash('sha512', $userID.$username.$user->password.'PectGtma');
					if($tied_to=='')
					{
						if($redirect_to=='') header("Location: ".get_app_info('path').'/two-factor');
						else header("Location: ".get_app_info('path').'/two-factor?redirect='.$redirect_to);
					}
					else
					{
					if($redirect_to=='') header("Location: ".get_app_info('path')."/two-factor?redirect=app?i=".$_SESSION['restricted_to_app']);
					else header("Location: ".get_app_info('path')."/two-factor?redirect=".$redirect_to);
					}
				}	
				//set cookie and log in
				else if(setcookie('logged_in', hash('sha512', $userID.$username.$user->password.'PectGtma'), time()+31556926, '/', get_app_info('cookie_domain')))
				{			
					if($tied_to=='')
					{
						if($redirect_to=='') header("Location: ".get_app_info('path'));
						else header("Location: ".get_app_info('path').'/'.$redirect_to);
					}
					else
					{
					if($redirect_to=='') header("Location: ".get_app_info('path')."/app?i=".$_SESSION['restricted_to_app']);
					else header("Location: ".get_app_info('path')."/".$redirect_to);
					}
				}
			}
        }

		
		
	    
		
		
		
        
    }

    /*
    public function hash_password_db($id, $password, $use_sha1_override = FALSE)
	{
		if (empty($id) || empty($password))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$query = $this->db->select('password') // removed 'salt' from the select query
		                  ->where('id', $id)
		                  ->limit(1)
		                  ->order_by('id', 'desc')
		                  ->get($this->tables['login']);

		$hash_password_db = $query->row();

		if ($query->num_rows() !== 1)
		{
			return FALSE;
		}

		// bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			if ($this->bcrypt->verify($password,$hash_password_db->password))
			{
				return TRUE;
			}

			return FALSE;
		}

		// sha1
		if ($this->store_salt)
		{
			$db_password = sha1($password . $hash_password_db->salt);
		}
		else
		{
			$salt = substr($hash_password_db->password, 0, $this->salt_length);

			$db_password =  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}

		if($db_password == $hash_password_db->password)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
    */
 }