<?php
defined('BASEPATH') OR exit('No direct script access allowed');


 class Brand_model extends CI_Model {

     public function new_brand(){
         $from_name = $this->input->post('from_name');
         $app_name = $this->input->post('app_name');
         $from_email = $this->input->post('from_email');
         $login_email = $this->input->post('login_email');
         $reply_to = $this->input->post('reply_to');
         $allowed_attachments = $this->input->post('allowed_attachments');
         $currency = $this->input->post('currency');
         $delivery_fee = $this->input->post('delivery_fee');
         $cost_per_recipient = $this->input->post('cost_per_recipient');
         $smtp_host = $this->input->post('smtp_host');
         $smtp_port = $this->input->post('smtp_port');
         $smtp_ssl = $this->input->post('smtp_ssl');
         $smtp_username = $this->input->post('smtp_username');
         $smtp_password = $this->input->post('smtp_password');
         $language = $this->input->post('language');
         $campaigns = null != $this->input->post('campaigns') ? 0 : 1;
         $templates = null != $this->input->post('templates') ? 0 : 1;
         $lists = null != $this->input->post('lists-subscribers') ? 0 : 1;
         $reports = null != $this->input->post('reports') ? 0 : 1;
         $notify_campaign_sent = null != $this->input->post('notify_campaign_sent') ? 1 : 0;
         $campaign_report_rows = is_numeric($this->input->post('campaign_report_rows')) ? (int)$this->input->post('campaign_report_rows') : 10;
         $query_string = $this->input->post('query_string');
         $gdpr_only = null != $this->input->post('gdpr_only') ? 1 : 0;
         $gdpr_only_ar = null != $this->input->post('gdpr_only_ar') ? 1 : 0;
         $gdpr_options = null != $this->input->post('gdpr_options') ? 1 : 0;
         $recaptcha_sitekey = $this->input->post('recaptcha_sitekey');
         $recaptcha_secretkey = $this->input->post('recaptcha_secretkey');
         $test_email_prefix = $this->input->post('test_email_prefix');
         $custom_domain_protocol = $this->input->post('protocol');
         $custom_domain = $this->input->post('custom_domain');
         $custom_domain_enabled = is_numeric($this->input->post('custom_domain_status')) ? (int)$this->input->post('custom_domain_status') : 0;
         $templates_lists_sorting = $this->input->post('sort-by');

         
         $password = $this->input->post('pass');
         $pass_encrypted = hash('sha512', $password.'PectGtma');
         $choose_limit = $this->input->post('choose-limit');

         if($choose_limit=='custom' || $choose_limit=='no_expiry')
         {
             $monthly_limit = $this->input->post('monthly-limit');
             
             if($choose_limit=='custom')
             {
                 $reset_on_day = $this->input->post('reset-on-day');
                 
                 //Calculate month of next reset
                 $today_unix_timestamp = time();
                 $day_today = strftime("%e", $today_unix_timestamp);
                 $month_today = strftime("%b", $today_unix_timestamp);
                 $month_next = strtotime('1 '.$month_today.' +1 month');
                 $month_next = strftime("%b", $month_next);
                 if($day_today<$reset_on_day) $month_to_reset = $month_today;
                 else $month_to_reset = $month_next;
                 $no_expiry = 0;
             }
             else if($choose_limit=='no_expiry')
             {
                 $reset_on_day = 1;
                 $month_to_reset = '';
                 $no_expiry = 1;
             }
         }
         else if($choose_limit=='unlimited')
         {
             $monthly_limit = -1;
             $reset_on_day = 1;
             $month_to_reset = '';
             $no_expiry = 0;
         }

         $data = array(
             'userID' => get_app_info('userID'),
             'app_name' => $app_name,
             'from_name' => $this->input->post('from_name'),
             'from_email' => $this->input->post('from_email'),
             'reply_to' => $this->input->post('reply_to'),
             'allowed_attachments' => $this->input->post('allowed_attachments'),
             'currency' => $this->input->post('currency'),
             'delivery_fee' => $this->input->post('delivery_fee'),
             'cost_per_recipient' => $this->input->post('cost_per_recipient'),
             'smtp_host' => $this->input->post('smtp_host'),
             'smtp_port' => $this->input->post('smtp_port'),
             'smtp_ssl' => $this->input->post('smtp_ssl'),
             'smtp_username' => $this->input->post('smtp_username'),
             'smtp_password' => $this->input->post('smtp_password'),
             'app_key' => ran_string(30, 30, true, false, true),
             'allocated_quota' => $monthly_limit,
             'day_of_reset' => $reset_on_day,
             'month_of_next_reset' => $month_to_reset,
             'no_expiry' => $no_expiry,
             'reports_only' => null != $this->input->post('reports') ? 0 : 1,
             'campaigns_only' => null != $this->input->post('campaigns') ? 0 : 1,
             'templates_only' => null != $this->input->post('templates') ? 0 : 1,
             'lists_only' => null != $this->input->post('lists-subscribers') ? 0 : 1,
             'notify_campaign_sent' => null != $this->input->post('notify_campaign_sent') ? 1 : 0,
             'campaign_report_rows' => is_numeric($this->input->post('campaign_report_rows')) ? (int)$this->input->post('campaign_report_rows') : 10,
             'query_string' => $this->input->post('query_string'),
             'gdpr_only' => null != $this->input->post('gdpr_only') ? 1 : 0,
             'gdpr_only_ar' => null != $this->input->post('gdpr_only_ar') ? 1 : 0,
             'gdpr_options' => null != $this->input->post('gdpr_options') ? 1 : 0,
             'recaptcha_sitekey' => $this->input->post('recaptcha_sitekey'),
             'recaptcha_secretkey' => $this->input->post('recaptcha_secretkey'),
             'test_email_prefix' => $this->input->post('test_email_prefix'),
             'custom_domain_protocol' => $this->input->post('protocol'),
             'custom_domain' => $this->input->post('custom_domain'),
             'custom_domain_enabled' => is_numeric($this->input->post('custom_domain_status')) ? (int)$this->input->post('custom_domain_status') : 0,
             'templates_lists_sorting' => $this->input->post('sort-by')
         );

         $this->db->insert('apps', $data);

         if($this->db->affected_rows() == 1){
            $id = $this->db->insert_id();
            //insert new record
            
            $new_login = array(
                'name' => $from_name,
                'company' => $app_name,
                'username' => $login_email,
                'password' => $pass_encrypted,
                'tied_to' => get_app_info('userID'),
                'app' => $id,
                'timezone' => get_app_info('timezone'),
                'language' => $language
            );
            $this->db->insert('login', $new_login);
            if($this->db->affected_rows() == 1){
                return $id;
            } else {
                return null;
            }
         } else {
            return null;
         }
     }

     public function update_brand($update_array, $where_object, $table_name){
		$this->db->where($where_object->key, $where_object->value);
		$this->db->update($table_name, $update_array);
		//Reset any pending password requests
		// $reset_password_update = array('reset_password_key' => "");
		// $this->db->where('id', $userID);
		// $this->db->update('login', $reset_password_update);        
    }
 }