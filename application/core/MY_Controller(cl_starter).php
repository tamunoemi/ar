<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    private $base_dir;
    public $user_capability;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->helper('functions');
        $this->load->library(array('ion_auth'));
        $this->config->load('my_config');
        $this->load->model('core_model', 'core');

        $this->base_dir = $this->config->item('modules_ctrl_base_dir') . '/';
    }

    public function view($arr, $arg = "") {
        $page = $arr['page'];
        $module = $arr['module'];
        // echo $this->config->item('modules_locations')."$module/pages/".$page.'.php'; exit;
        // var_dump($arr);
        var_dump($this->config->item('modules_locations'). "$module/pages/");

        if (!file_exists($this->config->item('modules_locations') . "$module/pages/" . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $res = array_merge($data, $arr);
        $resp = "";
        if (!empty($arg)) {
            $resp = array_merge($res, $arg);
        } else {
            $resp = $res;
        }

        $this->load->view("$module/common/header", $resp);
        $this->load->view("$module/pages/" . $page, $resp);
        $this->load->view("$module/common/footer", $resp);
    }

    public function do_image_upload($file) {
        $config['upload_path'] = IMAGE_DIR;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|JPG|GIF';
        $config['max_size'] = 1000;
        //$config['file_ext_tolower'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file)) {

            outputError($this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            return IMAGE_DIR . $data['file_name'];
        }
    }

    public function do_video_upload($file) {
        $config['upload_path'] = VIDEO_DIR;
        $config['allowed_types'] = 'mp4|3gp';
        $config['max_size'] = 200000;
        $config['min_width'] = 600;
        $config['min_height'] = 320;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file)) {

            outputError($this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            return VIDEO_DIR . $data['file_name'];
        }
    }

 

    function shopify_call($token, $shop, $api_endpoint, $query = array(), $method = 'GET', $request_headers = array()) {

        // Build URL
        $url = "https://" . $shop . ".myshopify.com" . $api_endpoint;
        if (!is_null($query) && in_array($method, array('GET', 'DELETE')))
            $url = $url . "?" . http_build_query($query);

        // Configure cURL
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 3);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 3);
        // curl_setopt($curl, CURLOPT_SSLVERSION, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, 'My New Shopify App v.1');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        // Setup headers
        $request_headers[] = "";
        if (!is_null($token))
            $request_headers[] = "X-Shopify-Access-Token: " . $token;
        curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);

        if ($method != 'GET' && in_array($method, array('POST', 'PUT'))) {
            if (is_array($query))
                $query = http_build_query($query);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        }

        // Send request to Shopify and capture any errors
        $response = curl_exec($curl);
        $error_number = curl_errno($curl);
        $error_message = curl_error($curl);

        // Close cURL to be nice
        curl_close($curl);

        // Return an error is cURL has a problem
        if ($error_number) {
            return $error_message;
        } else {

            // No error, return Shopify's response by parsing out the body and the headers
            $response = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);

            // Convert headers into an array
            $headers = array();
            $header_data = explode("\n", $response[0]);
            $headers['status'] = $header_data[0]; // Does not contain a key, have to explicitly set
            array_shift($header_data); // Remove status, we've already set it above
            foreach ($header_data as $part) {
                $h = explode(":", $part);
                $headers[trim($h[0])] = trim($h[1]);
            }

            // Return headers and Shopify's response
            return array('headers' => $headers, 'response' => $response[1]);
        }
    }

    public function mailBySwiftmailer($email, $password) {
        include_once $this->base_dir . "/swiftmailer/lib/swift_required.php";
        $host = "smtp.mailgun.org";
        $user = 'app@mailgun.dotcombuzz.com';
        $pass = 'adsmartly123456';
        $port = 587;
        $site_title = "1kproduct";
        $supportEmail = 'info@potterzhouse.com';
        $website_url = 'http://localhost/ecw';


        $from = array($supportEmail => $site_title);

        $subject = "Your $site_title Login Details";

        $html = "
        <strong> Hello </strong>,

        Thanks for your patronage of $site_title.<br>
        You made the right decision. Now we can rightly say welcome to the club.<br>



        Visit $website_url to login now and access your purchase.

        <br><br>
        <strong>  $site_title LOGIN DETAILS </strong><br><br>
        Login Url: $website_url
        username: $email
        Password is: $password
        ";
        
        $transport = Swift_SmtpTransport::newInstance($host, $port);
        $transport->setUsername($user);
        $transport->setPassword($pass);
        $swift = Swift_Mailer::newInstance($transport);

        $message = new Swift_Message($subject);
        $message->setFrom($from);
        $message->setBody($html, 'text/html');
        $message->setTo($email);

        $recipients = $swift->send($message);
        format_output($recipients);
        
    }

    public function mailUpgrade($last_name, $first_name, $email, $capName,$ajax = false)
    {
        $data['name'] = $last_name . ' ' . $first_name;
        $data['fname'] =  $first_name;
        $data['email'] = $email;
        $data['plan'] = $capName;
        $this->load->library('email');
        $this->email->from(SUPPORT_URL, SITENAME);
        $this->email->to($email);

        $this->email->subject(' Ecom Cache Upgrade Notice');
        $this->email->set_mailtype('html');
        $body = $this->load->view('email_template/upgrade', $data, TRUE);
        $this->email->message($body);
        if ($this->email->send()) {
            if ($ajax == true) {
                outputSuccess("done");
            } else {
                echo "Mail sent successfully to Customer";
            }
        } else {
            log_message('error', $this->email->print_debugger());
            if ($ajax == true) {
                outputError("Login details send failed");
            } else {
                echo "Login details send failed";
            }
        }
    }

    public function mailRegDetails($last_name, $first_name, $email, $password, $ajax = false) { //mail registeration details to customer after registering
        $data['name'] = $last_name . ' ' . $first_name;
        $data['fname'] =  $first_name;
        $data['email'] = $email;
        $data['password'] = $password;
        $this->load->library('email');
        $this->email->from(SUPPORT_URL, SITENAME);
        $this->email->to($email);

        $this->email->subject('Welcome to '.SITENAME);
        $this->email->set_mailtype('html');
        $body = $this->load->view('email_template/login_details', $data, TRUE);
        $this->email->message($body);
        if ($this->email->send()) {
            if ($ajax == true) {
                outputSuccess3("done");
            } else {
                return "You have successfully registered your account. Your login details has been sent to $email.";
            }
        } else {
            log_message('error', $this->email->print_debugger());
            if ($ajax == true) {
                outputError3("Unable to mail you login details. Try password reset.");
            } else {
                return "Login details send failed";
            }
        }
    }

    public function jvzooUserSubscription($uid, $capability, $amount = NULL, $end_date = NULL, $payment_id = NULL) {
        $arg['capability_id'] = $capability;
        $arg['user_id'] = $uid;
        $arg['amount'] = $amount;
        $arg['ctransreceipt'] = $payment_id;
        $arg['start_date'] = time();
        $arg['end_date'] = $end_date;
        $arg['active'] = 1;
        $upgrade = false;
        //check if this user already has an ongoing subscription
        if ($this->core->isExist(USER_SUBSCRIPTION, array('user_id' => $uid,'active'=>1)) == true) {
            //Update
            echo "Upgrading user.....";
            $this->core->update_data(USER_SUBSCRIPTION,array('user_id' => $uid),$arg);
            $upgrade = true;
        }else{
            $this->core->insert_data(USER_SUBSCRIPTION, $arg);
            $upgrade = false;
        }
        return $upgrade;
        
    }

    public function createUser($first_name, $last_name, $email, $password, $userType = 2) {

        $group = array();
        if ($this->core->isExist(USERS, array('email' => $email)) == true) {
            //A user upgrading
            //The user id and return
            $res = $this->core->query_fields(USERS,'id',array('email'=>$email));
            return $res[0]->id;
        }else{
            
        $group[] = $userType;
        $additional_data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'company' => " ",
            'phone' => " ",
            'ip_address' => getIpAddress(),
        );


        $exp = explode('@', $email);
        $username = $exp[0];

        if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
            //return the just registered user id 
            $uid = $this->core->query_fields(USERS, 'id', array('email' => $email));
            return $uid[0]->id;
        }
        }
        
    }
    
    public function getUserPermission($returnId = false,$user_id = "")
    {
        $uid = !empty($user_id)? $user_id : $this->session->user_id;
        $res = $this->core->fetch_data(USER_SUBSCRIPTION,array('user_id'=>$uid,'active'=>1));
        foreach ($res as $key => $value) {
            $this->user_capability =  $value->capability_id;
        }
        if($returnId == true)
        {
            return $this->user_capability;
        }else{
            return $res;
        }
        
    }

    public function user_permission($name,$redr = true)
    {
        //check if its an admin
        
        if (!$this->ion_auth->is_admin()) 
        {
        $shopify = 3;
        $premium = 2;
        $regular = 1;
        //get user capability
        $this->getUserPermission();
        $user_cap = $this->user_capability;
        switch($name)
        {
            case 'shopify':
                   if($user_cap == $regular)
                   {
                       if($redr == true)
                       {
                           redirect('shopifyUpgrade');
                       }else{
                           outputError(" Upgrade to Ecom Cache Store Connector. Click <a href='http://getecomcache.com/store-connector'>here</a>");
                       }
                       
                   }
                break;
                
             case 'editorpick':
                   if(!$user_cap == $premium)
                   {
                       redirect('premiumUpgrade');
                   }
                break;
                
                
             case 'wts':
                   if(!$user_cap == $premium)
                   {
                       redirect('premiumUpgrade');
                   }
                break;
                
                
        }
        }
        
    }
    
    public function getCapabilityName($level)
            {
        
        $res = $this->core->query_fields(CAPABILITIES,'level',array('id'=>$level));
        $name = $res[0]->level;
        return $name;
        
    }

    
    public function getAllSubscriptions()
    {
        $history = array();

            $res = $this->core->fetch_data(USER_SUBSCRIPTION);
            foreach ($res as  $value) {
                $service_id = $value->service_id;
                //get service name
                $serviceRes = $this->core->query_fields(SERVICES,'name',array('id'=>$service_id));
                $service_name = $serviceRes[0]->name;
                $value->service_name = $service_name;
                
                $package_id = $value->package_id;
                //get package name
                $packageRes = $this->core->query_fields(PACKAGES,'name',array('id'=>$package_id));
                $package_name = $packageRes[0]->name;
                $value->package_name = $package_name;

                //end and start time of subscription in readable format
                $start_time = $value->start_time;
                $value->start_time = date('Y-m-d',$start_time);
                $end_time = $value->end_time;
                $value->end_time = date('Y-m-d',$end_time);
                
                //get users fullname
                $user_id = $value->user_id;
                $user = $this->core->fetch_data(USERS,array('id'=>$user_id));
                $first_name = $user[0]->first_name;
                $last_name = $user[0]->last_name;
                $value->fullname = $last_name.' '.$first_name;
                $history[] = $value;
            }

        
        return $history;
    }
    
    
    public function getUserSubscriptions()
    {
        $history = array();
        //check if this user has a current subscription
        $user_id = $this->session->user_id;
        if($this->core->isExist(USER_SUBSCRIPTION,array('user_id'=>$user_id)) == TRUE)
        {
            $res = $this->core->fetch_data(USER_SUBSCRIPTION,array('user_id'=>$user_id));
            foreach ($res as  $value) {
                $service_id = $value->service_id;
                //get service name
                $serviceRes = $this->core->query_fields(SERVICES,'name',array('id'=>$service_id));
                $service_name = $serviceRes[0]->name;
                $value->service_name = $service_name;
                
                $package_id = $value->package_id;
                //get package name
                $packageRes = $this->core->query_fields(PACKAGES,'name',array('id'=>$package_id));
                $package_name = $packageRes[0]->name;
                $value->package_name = $package_name;

                //end and start time of subscription in readable format
                $start_time = $value->start_time;
                $value->start_time = date('Y-m-d',$start_time);
                $end_time = $value->end_time;
                $value->end_time = date('Y-m-d',$end_time);
                $history[] = $value;
            }
        }
        
        return $history;
    }
    
    
     public function fetchLessons($return=false)
    {
        $res = $this->core->fetch_data(INVESTMENT_LESSONS);
        if($return == TRUE){
            return $res;
        }else{
            echo json_encode($res);
        }
        
    }
    
    
}
