<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Add personal configurations here
//$config['modules_locations'] = APPPATH.'views/';
$config['modules_locations'] = APPPATH . 'modules\\';
$config['var'] = base_url().'var/';
$config['assets_dir'] = base_url().'assets/';
$config['swiftmailer_dir'] = base_url().'assets/lib/swiftmailer/';
$config['current_main_theme'] = 'main';
$config['current_admin_theme'] = 'admin';
$config['current_auth_theme'] = 'auth';
$config['log_path'] = 'var/log/log.txt';
$config['modules_ctrl_base_dir'] = realpath(dirname(dirname(dirname((__FILE__)))));
$config['font_path_dir'] = 'assets/lib/fonts/';
