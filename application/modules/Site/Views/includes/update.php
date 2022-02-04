<?php 	
	//================= Version 1.0.1 =================//
	//New column in table: campaigns, named wysiwyg
	//=================================================//
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'wysiwyg'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.CAMPAIGNS.' add column wysiwyg INT (11) DEFAULT \'0\'';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){
		    $q = 'UPDATE '.CAMPAIGNS.' SET wysiwyg=0';
		    $r = mysqli_query($mysqli, $q);
		    if ($r){}
	    }
	}
	//================= Version 1.0.3 =================//
	//New column in table: login, named tied_to & app
	//=================================================//
	$q = "SHOW COLUMNS FROM ".LOGIN." WHERE Field = 'tied_to' || Field = 'app' || Field = 'paypal'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LOGIN.' add (tied_to INT (11), app INT (11), paypal VARCHAR (100))';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	//-------------------------------------------------//
	//New column in table: apps, named currency, delivery_fee & cost_per_recipient
	//-------------------------------------------------//
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'currency' || Field = 'delivery_fee' || Field = 'cost_per_recipient'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.APPS.' add (currency VARCHAR (100), delivery_fee VARCHAR (100), cost_per_recipient VARCHAR (100))';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	//================= Version 1.0.4 =================//
	//New column in table: campaigns, named send_date, lists & timezone
	//=================================================//
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'send_date' || Field = 'lists' || Field = 'timezone'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.CAMPAIGNS.' add (send_date VARCHAR (100), lists VARCHAR (100), timezone VARCHAR (100))';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	//-------------------------------------------------//
	//New column in table: login, named, cron
	//-------------------------------------------------//
	$q = "SHOW COLUMNS FROM ".LOGIN." WHERE Field = 'cron'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LOGIN.' add (cron INT (11) default 0)';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	//================= Version 1.0.5 =================//
	//New column in table: lists, named opt_in, subscribed_url, unsubscribed_url, thankyou, thankyou_message, goodbye, goodbye_message, unsubscribe_all_list
	//=================================================//
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'opt_in' || Field = 'subscribed_url' || Field = 'unsubscribed_url' || Field = 'thankyou' || Field = 'thankyou_subject' || Field = 'thankyou_message' || Field = 'goodbye' || Field = 'goodbye_subject' || Field = 'goodbye_message' || Field = 'unsubscribe_all_list'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LISTS.' add (opt_in INT (11) DEFAULT \'0\', subscribed_url VARCHAR (100), unsubscribed_url VARCHAR (100), thankyou int (11) DEFAULT \'0\', thankyou_subject VARCHAR(100), thankyou_message MEDIUMTEXT, goodbye INT (11) DEFAULT \'0\', goodbye_subject VARCHAR(100), goodbye_message MEDIUMTEXT, unsubscribe_all_list INT (11) DEFAULT \'1\')';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	//-------------------------------------------------//
	//New column in table: subscribers, named, confirmed
	//-------------------------------------------------//
	$q = "SHOW COLUMNS FROM ".SUBSCRIBERS." WHERE Field = 'confirmed'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.SUBSCRIBERS.' add (confirmed INT (11) default 1)';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	
	//================= Version 1.0.6 =================//
	//New column in table: campaigns, to_send, to_send_lists
	//=================================================//
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'to_send' || Field = 'to_send_lists'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.CAMPAIGNS.' ADD COLUMN to_send INT (100) AFTER sent';
	    $q2 = 'alter table '.CAMPAIGNS.' ADD COLUMN to_send_lists VARCHAR (100) AFTER to_send';
	    $r = mysqli_query($mysqli, $q);
	    $r2 = mysqli_query($mysqli, $q2);
	    if ($r && $r2){}
	}
	//-------------------------------------------------//
	//New column in table: confirm_url
	//-------------------------------------------------//
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'confirm_url'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LISTS.' ADD COLUMN confirm_url VARCHAR (100) AFTER opt_in';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	
	//================= Version 1.0.7 =================//
	//New column in table: subscribers, named, complaint
	//=================================================//
	$q = "SHOW COLUMNS FROM ".SUBSCRIBERS." WHERE Field = 'complaint'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.SUBSCRIBERS.' ADD COLUMN complaint INT (11) DEFAULT \'0\' AFTER bounced';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	
	//================= Version 1.0.8 =================//
	//New column in table: lists & subscribers, custom_fields & custom_fields
	//=================================================//
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'custom_fields'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LISTS.' ADD COLUMN custom_fields MEDIUMTEXT';
	    $q2 = 'alter table '.SUBSCRIBERS.' ADD COLUMN custom_fields LONGTEXT AFTER email';
	    $q3 = 'alter table '.SUBSCRIBERS.' ADD COLUMN join_date INT (100) AFTER timestamp';
	    $r = mysqli_query($mysqli, $q);
	    $r2 = mysqli_query($mysqli, $q2);
	    $r3 = mysqli_query($mysqli, $q3);
	    if ($r && $r2 && $r3){}
	}
	
	//================= Version 1.0.9 =================//
	//New columns in table: subscribers, login, links and new autoresponders tables
	//=================================================//
	$q = "SHOW COLUMNS FROM ".SUBSCRIBERS." WHERE Field = 'bounce_soft'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.SUBSCRIBERS.' ADD COLUMN bounce_soft INT (11) DEFAULT \'0\' AFTER bounced, ADD COLUMN last_ares INT (11) AFTER last_campaign';
	    $q2 = 'alter table '.LOGIN.' ADD COLUMN cron_ares INT (11) DEFAULT \'0\' AFTER cron';
	    $q3 = 'alter table '.LINKS.' ADD COLUMN ares_emails_id INT (11) AFTER campaign_id';
	    $q4 = 'CREATE TABLE `'.ARES.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(100) DEFAULT NULL,
		  `type` int(11) DEFAULT NULL,
		  `list` int(11) DEFAULT NULL,
		  `custom_field` varchar(100) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;';
		$q5 = 'CREATE TABLE `'.ARES_EMAILS.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `ares_id` int(11) DEFAULT NULL,
		  `from_name` varchar(100) DEFAULT NULL,
		  `from_email` varchar(100) DEFAULT NULL,
		  `reply_to` varchar(100) DEFAULT NULL,
		  `title` varchar(500) DEFAULT NULL,
		  `plain_text` mediumtext,
		  `html_text` mediumtext,
		  `time_condition` varchar(100) DEFAULT NULL,
		  `timezone` varchar(100) DEFAULT NULL,
		  `created` int(11) DEFAULT NULL,
		  `recipients` int(100) DEFAULT 0,
		  `opens` longtext,
		  `wysiwyg` int(11) DEFAULT 0,
		  PRIMARY KEY (`id`)
		) AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;';
	    $r = mysqli_query($mysqli, $q);
	    $r2 = mysqli_query($mysqli, $q2);
	    $r3 = mysqli_query($mysqli, $q3);
	    $r4 = mysqli_query($mysqli, $q4);
	    $r5 = mysqli_query($mysqli, $q5);
	    if ($r && $r2 && $r3 && $r4 && $r5){}
	}
	
	//================= Version 1.1.0 =================//
	//New columns in table: login and new table, queue etc
	//=================================================//
	$q = "SHOW COLUMNS FROM ".LOGIN." WHERE Field = 'send_rate'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LOGIN.' ADD COLUMN send_rate INT (100) DEFAULT 0';
	    $q2 = 'alter table '.LOGIN.' ADD COLUMN timezone VARCHAR (100)';
	    $q3 = 'alter table '.APPS.' ADD (smtp_host VARCHAR (100), smtp_port VARCHAR (100), smtp_ssl VARCHAR (100), smtp_username VARCHAR (100), smtp_password VARCHAR (100))';
	    $q4 = 'alter table '.CAMPAIGNS.' ADD COLUMN timeout_check VARCHAR (100) AFTER recipients';
	    $r = mysqli_query($mysqli, $q);
	    $r2 = mysqli_query($mysqli, $q2);
	    $r3 = mysqli_query($mysqli, $q3);
	    $r4 = mysqli_query($mysqli, $q4);
	    $r5 = mysqli_query($mysqli, $q4);
	    if ($r && $r2 && $r3 && $r4){}
	    
	    $q = 'SELECT timezone FROM '.LOGIN.' LIMIT 1';
	    $r = mysqli_query($mysqli, $q);
	    if ($r && mysqli_num_rows($r) > 0)
	    {
	        while($row = mysqli_fetch_array($r))
	        {
	    		if($row['timezone']=='')
	    		{
		    		$q2 = 'UPDATE '.LOGIN.' SET timezone = "America/New_York" LIMIT 1';
				    mysqli_query($mysqli, $q2);
	    		}
	        }  
	    }
	}
	
	$q = 'SHOW TABLES LIKE "'.QUEUE.'"';
    $r = mysqli_query($mysqli, $q);
    if (mysqli_num_rows($r) == 0)
    {
    	$q2 = 'CREATE TABLE `'.QUEUE.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `query_str` longtext,
		  `campaign_id` int(11) DEFAULT NULL,
		  `subscriber_id` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) DEFAULT CHARSET=utf8;';
		mysqli_query($mysqli, $q2);
    }
    
    //================= Version 1.1.2 =================//
	//New column in table: subscribers
	//=================================================//
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'errors'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.CAMPAIGNS.' ADD COLUMN errors LONGTEXT';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	
	//================= Version 1.1.3 =================//
	//New column in table: subscribers
	//=================================================//
	$q = "SHOW COLUMNS FROM ".QUEUE." WHERE Field = 'sent'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.QUEUE.' ADD COLUMN sent INT (11) DEFAULT 0';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	
	//================= Version 1.1.4 =================//
	//New column in table: subscribers
	//=================================================//
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'confirmation_email'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LISTS.' ADD COLUMN confirmation_email MEDIUMTEXT after goodbye_message';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'confirmation_subject'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LISTS.' ADD COLUMN confirmation_subject MEDIUMTEXT after goodbye_message';
	    $r = mysqli_query($mysqli, $q);
	    if ($r){}
	}
	
	//================= Version 1.1.5 =================//
	//New column in table: subscribers
	//=================================================//
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'bounce_setup'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q = 'alter table '.LOGIN.' ADD language VARCHAR (100) DEFAULT "en_US", ADD cron_csv INT (11) DEFAULT 0';
	    $q2 = 'alter table '.LISTS.' ADD prev_count INT (100) DEFAULT 0 after custom_fields, ADD currently_processing INT (100) DEFAULT 0, ADD total_records INT (100) DEFAULT 0';
	    $q3 = 'alter table '.APPS.' ADD bounce_setup INT (11) DEFAULT 0, ADD complaint_setup INT (11) DEFAULT 0';
	    $q4 = 'alter table '.CAMPAIGNS.' ADD bounce_setup INT (11) DEFAULT 0, ADD complaint_setup INT (11) DEFAULT 0';
	    mysqli_query($mysqli, $q);
	    mysqli_query($mysqli, $q2);
	    mysqli_query($mysqli, $q3);
	    mysqli_query($mysqli, $q4);
	}
	//add index to list column in subscribers table
	$q = 'SHOW INDEX FROM '.SUBSCRIBERS.' WHERE KEY_NAME = "s_list"';
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
		mysqli_query($mysqli, 'CREATE INDEX s_list ON '.SUBSCRIBERS.' (list)');
		mysqli_query($mysqli, 'CREATE INDEX s_unsubscribed ON '.SUBSCRIBERS.' (unsubscribed)');
		mysqli_query($mysqli, 'CREATE INDEX s_bounced ON '.SUBSCRIBERS.' (bounced)');
		mysqli_query($mysqli, 'CREATE INDEX s_bounce_soft ON '.SUBSCRIBERS.' (bounce_soft)');
		mysqli_query($mysqli, 'CREATE INDEX s_complaint ON '.SUBSCRIBERS.' (complaint)');
		mysqli_query($mysqli, 'CREATE INDEX s_confirmed ON '.SUBSCRIBERS.' (confirmed)');
		mysqli_query($mysqli, 'CREATE INDEX s_timestamp ON '.SUBSCRIBERS.' (timestamp)');
		mysqli_query($mysqli, 'CREATE INDEX s_id ON '.QUEUE.' (subscriber_id)');
		mysqli_query($mysqli, 'CREATE INDEX st_id ON '.QUEUE.' (sent)');
	}
	
	//================= Version 1.1.7 =================//
	//New column in table: apps
	//=================================================//
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'app_key'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $q3 = 'alter table '.APPS.' ADD COLUMN app_key VARCHAR (100)';
	    $r3 = mysqli_query($mysqli, $q3);
	    if ($r3)
	    {
		    $q4 = 'SELECT id FROM '.APPS;
		    $r4 = mysqli_query($mysqli, $q4);
		    if (mysqli_num_rows($r4) > 0)
		    {
		        while($row = mysqli_fetch_array($r4))
		        {
		        	$cid = $row['id'];
		        	
		    		$q5 = 'UPDATE '.APPS.' SET app_key = "'.ran_string(30, 30, true, false, true).'" WHERE id = '.$cid;
		    		mysqli_query($mysqli, $q5);
		        }  
		    }
	    }
	}
	
	//================= Version 1.1.7.2 ===============//
	//New index in table: subscribers (email column)
	//=================================================//
	//add index to email column in subscribers table
	$q = 'SHOW INDEX FROM '.SUBSCRIBERS.' WHERE KEY_NAME = "s_email"';
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
		mysqli_query($mysqli, 'CREATE INDEX s_email ON '.SUBSCRIBERS.' (email)');
	}
	
	//================= Version 1.1.8 ===============//
	//New column in table: login
	//=================================================//
	//Create new 'ses_endpoint' in 'login' table
	$q = "SHOW COLUMNS FROM ".LOGIN." WHERE Field = 'ses_endpoint'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    $r2 = mysqli_query($mysqli, 'alter table '.LOGIN.' ADD COLUMN ses_endpoint VARCHAR (100)');
	    if($r2)
	    {
		    $q3 = 'UPDATE '.LOGIN.' SET ses_endpoint = "email.us-east-1.amazonaws.com" LIMIT 1';
		    mysqli_query($mysqli, $q3);
	    }
	}
	
	//================= Version 1.1.7.3 ===============//
	//Convert to_send_lists and lists columns to TEXT type
	//=================================================//
	//add index to email column in subscribers table
	$q = 'SHOW COLUMNS FROM '.CAMPAIGNS.' WHERE Field = "to_send_lists" AND Type = "VARCHAR(100)"';
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 1)
	{
		mysqli_query($mysqli, 'ALTER TABLE '.CAMPAIGNS.' MODIFY COLUMN to_send_lists TEXT');
		mysqli_query($mysqli, 'ALTER TABLE '.CAMPAIGNS.' MODIFY COLUMN lists TEXT');
	}
	
	//================= Version 1.1.9 ===============//
	//New column in table: login
	//=================================================//
	//Create new 'ses_endpoint' in 'login' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'allocated_quota'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN allocated_quota INT (11) DEFAULT -1');
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN current_quota INT (11) DEFAULT 0');
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN day_of_reset INT (11) DEFAULT 1');
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN month_of_next_reset VARCHAR (3)');
	}
	
	//================= Version 1.1.9.1 ===============//
	//New column in table: apps
	//=================================================//
	//Create new 'test_email' in 'login' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'test_email'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN test_email VARCHAR (100)');
	}
	
	//================= Version 1.1.9.4 ===============//
	//New column in table: subscribers
	//=================================================//
	//Create new 'test_email' in 'login' table
	$q = "SHOW COLUMNS FROM ".SUBSCRIBERS." WHERE Field = 'messageID'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'alter table '.SUBSCRIBERS.' ADD COLUMN messageID VARCHAR (100)');
	}
	
	//================= Version 2.0 ===================//
	//New table in database: template
	//=================================================//
	//Create new 'template' table in database
	$q = "CREATE TABLE IF NOT EXISTS `".TEMPLATE."` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `userID` int(11) DEFAULT NULL,
	  `app` int(11) DEFAULT NULL,
	  `template_name` varchar(100) DEFAULT NULL,
	  `html_text` mediumtext,
	  PRIMARY KEY (`id`)
	) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;";
	mysqli_query($mysqli, $q);
	
	//Create new 'query_string' in 'campaigns' table
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'query_string'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'alter table '.CAMPAIGNS.' ADD COLUMN query_string VARCHAR (500) AFTER html_text, ADD COLUMN label VARCHAR (500) AFTER title');
	    mysqli_query($mysqli, 'alter table '.ARES_EMAILS.' ADD COLUMN query_string VARCHAR (500) AFTER html_text');
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN brand_logo_filename VARCHAR (100)');
	}
	
	//================= Version 2.0.6 ===============//
	//New column in table: apps
	//=================================================//
	//Create new 'allowed_attachments' in 'apps' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'allowed_attachments'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'alter table '.APPS.' ADD COLUMN allowed_attachments VARCHAR (100) DEFAULT "jpeg,jpg,gif,png,pdf,zip"');
	}
	
	//================= Version 2.0.8 ===============//
	//New INDEX in table: subscribers and increase VARCHAR to 1500 in `link` column of `links` table
	//=================================================//
	//Create new 'allowed_attachments' in 'apps' table
	$q = "SHOW INDEX FROM ".SUBSCRIBERS." WHERE Key_name = 's_last_campaign'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS.' ADD INDEX s_last_campaign (last_campaign DESC)');
	    mysqli_query($mysqli, 'ALTER TABLE '.LINKS.' modify link VARCHAR(1500)');
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
		mysqli_query($mysqli, 'ALTER TABLE '.ARES_EMAILS.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
		mysqli_query($mysqli, 'ALTER TABLE '.CAMPAIGNS.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
		mysqli_query($mysqli, 'ALTER TABLE '.LISTS.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
		mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
		mysqli_query($mysqli, 'ALTER TABLE '.TEMPLATE.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
	}
	
	//================= Version 2.1.0 ===============//
	//New column in table: auth_enabled, auth_key
	//=================================================//
	//Create new 'allowed_attachments' in 'apps' table
	$q = "SHOW COLUMNS FROM ".LOGIN." WHERE Field = 'auth_enabled'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.LOGIN.' ADD COLUMN auth_enabled INT (11) DEFAULT 0');
	    mysqli_query($mysqli, 'ALTER TABLE '.LOGIN.' ADD COLUMN auth_key VARCHAR (100)');
	}
	
	//================= Version 2.1.1 ===============//
	//New table: zapier
	//=================================================//
	
	//Create new 'zapier' table in database
	$q = "CREATE TABLE IF NOT EXISTS `".ZAPIER."` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `subscribe_endpoint` varchar(100) DEFAULT NULL,
	  `event` varchar(100) DEFAULT NULL,
	  `list` int(11) DEFAULT NULL,
	  `app` int(11) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;";
	mysqli_query($mysqli, $q);
	
	//================= Version 2.1.1.5 ===============//
	//New column in 'apps' table: reports_only 
	//=================================================//
	
	//Create new 'reports_only' in 'apps' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'reports_only'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN reports_only INT (1) DEFAULT 0');
	    mysqli_query($mysqli, 'ALTER TABLE '.CAMPAIGNS.' ADD COLUMN opens_tracking INT (1) DEFAULT \'1\', ADD COLUMN links_tracking INT (1) DEFAULT \'1\'');
	    mysqli_query($mysqli, 'ALTER TABLE '.ARES_EMAILS.' ADD COLUMN opens_tracking INT (1) DEFAULT \'1\', ADD COLUMN links_tracking INT (1) DEFAULT \'1\'');
	    mysqli_query($mysqli, 'ALTER TABLE '.LOGIN.' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
	}
	
	//================= Version 2.1.2.7 ===============//
	//New column in 'apps' table: year_of_next_reset 
	//=================================================//
	
	//Create new 'reports_only' in 'apps' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'year_of_next_reset'";
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN year_of_next_reset VARCHAR (4) AFTER month_of_next_reset');
	    mysqli_query($mysqli, 'ALTER TABLE '.CAMPAIGNS.' ADD COLUMN quota_deducted INT (11) AFTER wysiwyg');
	    
	    //Init
	    $time_today_unix = time();
		$month_today = strftime("%m", $time_today_unix);
		$year_today = strftime("%G", $time_today_unix);
		$year_last = $year_today-1;
		$month_array = array(1=>'Jan', 2=>'Feb', 3=>'Mar', 4=>'Apr', 5=>'May', 6=>'Jun', 7=>'Jul', 8=>'Aug', 9=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dec');
		
		//Populate empty 'year_of_next_reset' columns if a monthly sending limit was set
	    $q2 = 'SELECT id, allocated_quota, month_of_next_reset FROM '.APPS;
	    $r2 = mysqli_query($mysqli, $q2);
	    if ($r2 && mysqli_num_rows($r2) > 0)
	    {
	        while($row = mysqli_fetch_array($r2))
	        {
		        $app_id = $row['id'];
		        $allocated_quota = $row['allocated_quota'];
	    		
	    		//If a monthly sending limit was set, set 'year_of_next_reset' appropriately
	    		if($allocated_quota!='-1')
	    		{
		    		$month_of_next_reset = array_search($row['month_of_next_reset'], $month_array);
		    		$month_diff = $month_of_next_reset - $month_today;
		    		if($month_diff > 1) mysqli_query($mysqli, "UPDATE ".APPS." SET year_of_next_reset = $year_last WHERE id = $app_id");
		    		else mysqli_query($mysqli, "UPDATE ".APPS." SET year_of_next_reset = $year_today WHERE id = $app_id");
	    		}
	        }  
	    }
	}
	
	//================= Version 3.0 ===============//
	//New column in table: lists_excl
	//=================================================//
	//Create new 'allowed_attachments' in 'apps' table
	$q = "SHOW COLUMNS FROM ".CAMPAIGNS." WHERE Field = 'lists_excl'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.CAMPAIGNS.' ADD COLUMN lists_excl MEDIUMTEXT AFTER lists, ADD COLUMN segs MEDIUMTEXT AFTER lists_excl, ADD COLUMN segs_excl MEDIUMTEXT AFTER segs');
	    mysqli_query($mysqli, 'CREATE TABLE IF NOT EXISTS `'.SEG.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `name` varchar(100) DEFAULT NULL,
		  `app` int(11) DEFAULT NULL,
		  `list` int(11) DEFAULT NULL,
		  `last_updated` varchar(100) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;');
		mysqli_query($mysqli, 'CREATE TABLE IF NOT EXISTS `'.SEG_CONS.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `seg_id` int(11) DEFAULT NULL,
		  `grouping` int(11) DEFAULT NULL,
		  `operator` char(3) DEFAULT NULL,
		  `field` varchar(100) DEFAULT NULL,
		  `comparison` varchar(11) DEFAULT NULL,
		  `val` varchar(500) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;');
		mysqli_query($mysqli, 'CREATE TABLE `'.SUBSCRIBERS_SEG.'` (
		  `seg_id` int(11) DEFAULT NULL,
		  `subscriber_id` int(11) DEFAULT NULL
		) DEFAULT CHARSET=utf8;');
		mysqli_query($mysqli, 'CREATE INDEX s_sid ON '.SUBSCRIBERS_SEG.' (seg_id)');
		mysqli_query($mysqli, 'CREATE INDEX s_subscriber_id ON '.SUBSCRIBERS_SEG.' (subscriber_id)');
		mysqli_query($mysqli, 'CREATE INDEX s_list ON '.SEG.' (list)');
		mysqli_query($mysqli, 'CREATE INDEX s_seg_id ON '.SEG_CONS.' (seg_id)');
		mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS.' ADD INDEX s_messageid (messageID)');
	    mysqli_query($mysqli, 'ALTER TABLE '.QUEUE.' ADD INDEX s_campaign_id (campaign_id)');
	    mysqli_query($mysqli, 'ALTER TABLE '.LOGIN.' ADD COLUMN cron_seg INT (11) DEFAULT \'0\' AFTER cron_csv');
	    
	    if(mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN campaigns_only INT (1) DEFAULT 0, ADD COLUMN templates_only INT (1) DEFAULT 0, ADD COLUMN lists_only INT (1) DEFAULT 0'))
	    {
		    $q2 = 'SELECT id, reports_only FROM '.APPS;
		    $r2 = mysqli_query($mysqli, $q2);
		    if ($r2 && mysqli_num_rows($r2) > 0)
		    {
		        while($row = mysqli_fetch_array($r2))
		        {
			        $aid = $row['id'];
		    		$ro = $row['reports_only'];
		    		if($ro==1)
		    		{
			    		mysqli_query($mysqli, 'UPDATE '.APPS.' SET reports_only = 0, campaigns_only = 1, templates_only = 1, lists_only = 1 WHERE id = '.$aid);
		    		}
		        }  
		    }
	    }
	}
	
	//================= Version 3.0.4 ===============//
	//New column in table: ares_emails
	//=================================================//
	//Create new 'allowed_attachments' in 'apps' table
	$q = "SHOW COLUMNS FROM ".ARES_EMAILS." WHERE Field = 'enabled'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.ARES_EMAILS.' ADD COLUMN enabled INT (11) DEFAULT \'0\' AFTER links_tracking');
	    mysqli_query($mysqli, 'UPDATE '.ARES_EMAILS.' SET enabled = 1');
	    mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS_SEG.' ADD PRIMARY KEY(seg_id, subscriber_id)');
	}
	
	//================= Version 3.0.5 ===============//
	//New columns in table: subscribers
	//=================================================//
	//Create new columns in 'apps' table
	$q = "SHOW COLUMNS FROM ".SUBSCRIBERS." WHERE Field = 'ip'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS.' 
	      ADD COLUMN ip VARCHAR (100)
	    , ADD COLUMN country VARCHAR (2)
	    , ADD COLUMN referrer VARCHAR (500)
	    , ADD COLUMN method INT (1)
	    , ADD COLUMN added_via INT (1)
	    ');
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN notify_campaign_sent INT (1) DEFAULT \'1\'');
	    mysqli_query($mysqli, 'CREATE INDEX s_country ON '.SUBSCRIBERS.' (country)');
	    mysqli_query($mysqli, 'CREATE INDEX s_referrer ON '.SUBSCRIBERS.' (referrer)');
	    mysqli_query($mysqli, 'CREATE INDEX s_method ON '.SUBSCRIBERS.' (method)');
	    mysqli_query($mysqli, 'CREATE INDEX s_added_via ON '.SUBSCRIBERS.' (added_via)');
	}
	
	//================= Version 3.0.6 ===============//
	//New columns in table: apps
	//=================================================//
	//Create new columns in 'apps' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'campaign_report_rows'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN campaign_report_rows INT (11) DEFAULT \'10\'');
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN query_string VARCHAR (500)');
	    mysqli_query($mysqli, 'ALTER TABLE '.LOGIN.' ADD COLUMN reset_password_key VARCHAR (20)');
	}
	
	//================= Version 3.0.7 ===============//
	//New columns in table: lists
	//=================================================//
	//Create new columns in 'apps' table
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'gdpr_enabled'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.LISTS.' 
	    ADD COLUMN gdpr_enabled INT (1) DEFAULT \'0\', 
	    ADD COLUMN marketing_permission MEDIUMTEXT, 
	    ADD COLUMN what_to_expect MEDIUMTEXT, 
	    ADD COLUMN gdpr INT (1) DEFAULT \'0\' AFTER total_records');
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN gdpr_only INT (1) DEFAULT \'0\', 
	    ADD COLUMN gdpr_options INT (1) DEFAULT \'1\'');
	    mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS.' ADD COLUMN gdpr INT (1) DEFAULT \'0\'');
	}
	
	//================= Version 3.0.8 ===============//
	//New columns in table: apps
	//=================================================//
	//Create new columns in 'apps' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'gdpr_only_ar'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN gdpr_only_ar INT (1) DEFAULT \'0\'');
	    
	    $q = 'SELECT id, gdpr_only FROM '.APPS;
	    $r = mysqli_query($mysqli, $q);
	    if ($r && mysqli_num_rows($r) > 0)
	    {
	        while($row = mysqli_fetch_array($r))
	        {
	    		$app_id = $row['id'];
	    		$gdpr_only = $row['gdpr_only'];
	    		$q2 = 'UPDATE '.APPS.' SET gdpr_only_ar = '.$gdpr_only.' WHERE id = '.$app_id;
	    		$r2 = mysqli_query($mysqli, $q2);
	    		if ($r2){}
	        }  
	    }
	}
	
	//================= Version 3.1.2 ===============//
	//New columns in table: apps
	//=================================================//
	//Create new columns in 'apps' table
	$q = "SHOW COLUMNS FROM ".APPS." WHERE Field = 'recaptcha_sitekey'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN recaptcha_sitekey VARCHAR (50)');
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN recaptcha_secretkey VARCHAR (50)');
	}
	
	//================= Version 3.1.2.1 ===============//
	//New index in table: apps
	//=================================================//
	//add index to gdpr column in subscribers table
	$q = 'SHOW INDEX FROM '.SUBSCRIBERS.' WHERE KEY_NAME = "s_gdpr"';
	$r = mysqli_query($mysqli, $q);
	if (!$r || mysqli_num_rows($r) == 0)
	{
		mysqli_query($mysqli, 'CREATE INDEX s_gdpr ON '.SUBSCRIBERS.' (gdpr)');
	}
	
	//================= Version 3.1.2.2 ===============//
	//New index in table: apps
	//=================================================//
	//Create new columns in 'lists' table
	$q = "SHOW COLUMNS FROM ".LISTS." WHERE Field = 'unsubscribe_confirm'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.LISTS.' ADD COLUMN unsubscribe_confirm INT (1) DEFAULT \'0\'');
	}
	
	//================= Version 4.0 ===============//
	//New tables: suppression_list and blocked_domains
	//=================================================//
	//Create new columns in 'lists' table
	$q = "SELECT id FROM ". SUPPRESSION_LIST;
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, '
	    CREATE TABLE `'.SUPPRESSION_LIST.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `app` int(11) DEFAULT NULL,
		  `email` varchar(100) DEFAULT NULL,
		  `timestamp` varchar(100) DEFAULT NULL,
		  `block_attempts` int(100) DEFAULT \'0\',
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8');
		
		mysqli_query($mysqli, '
	    CREATE TABLE `'.BLOCKED_DOMAINS.'` (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `app` int(11) DEFAULT NULL,
		  `domain` varchar(100) DEFAULT NULL,
		  `timestamp` varchar(100) DEFAULT NULL,
		  `block_attempts` int(100) DEFAULT \'0\',
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8');
		
		mysqli_query($mysqli, '
		CREATE TABLE `'.SKIPPED_EMAILS.'` (
		  `app` int(11) DEFAULT NULL,
		  `list` int(11) DEFAULT NULL,
		  `email` varchar(100) DEFAULT NULL,
		  `reason` int(1) DEFAULT NULL,
		  KEY `s_list` (`list`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
		
	    mysqli_query($mysqli, 'ALTER TABLE '.APPS.' 
	    					   ADD COLUMN custom_domain VARCHAR (100),
	    					   ADD COLUMN custom_domain_protocol VARCHAR (5),
	    					   ADD COLUMN custom_domain_enabled INT (1) DEFAULT \'0\',
	    					   ADD COLUMN test_email_prefix VARCHAR (100),
	    					   ADD COLUMN no_expiry INT (1) DEFAULT \'0\' AFTER year_of_next_reset');
	    mysqli_query($mysqli, 'ALTER TABLE '.LISTS.'
							   ADD COLUMN notify_new_signups INT (1) DEFAULT \'0\',
							   ADD COLUMN notification_email VARCHAR (100),
							   ADD COLUMN no_consent_url VARCHAR (100),
							   ADD COLUMN already_subscribed_url VARCHAR (100),
							   ADD COLUMN reconsent_success_url VARCHAR (100)');
		mysqli_query($mysqli, 'ALTER TABLE '.TEMPLATE.' MODIFY template_name VARCHAR(500)');
		mysqli_query($mysqli, 'ALTER TABLE '.SUBSCRIBERS.' ADD COLUMN notes TEXT');
	}
	
	//================= Version 4.0.2 ===============//
	//
	//=================================================//
	//Create new columns in 'lists' table
	$q = "SELECT templates_lists_sorting FROM ". APPS;
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
		mysqli_query($mysqli, 'ALTER TABLE '.APPS.' ADD COLUMN templates_lists_sorting VARCHAR(4) DEFAULT "date"');
	}
	
	//================= Version 4.0.3 ===============//
	//New columns in table: apps
	//=================================================//
	//Create new columns in 'apps' table
	$q = "SHOW COLUMNS FROM ".LOGIN." WHERE Field = 'brands_rows'";
	$r = mysqli_query($mysqli, $q);
	if (mysqli_num_rows($r) == 0)
	{
	    mysqli_query($mysqli, 'ALTER TABLE '.LOGIN.' ADD COLUMN brands_rows INT (11) DEFAULT \'10\'');
	}
?>