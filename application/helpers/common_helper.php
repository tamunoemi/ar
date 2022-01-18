<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function outputError2($msg)
{
echo $msg;
exit;
}

 function outputSuccess2($msg)
{
echo $msg;
exit;
} 

 function outputError3($msg)
{
$data = array();
$data['error'] = true;
$data['msg'] = $msg;
return json_encode($data);
exit;
}

 function outputSuccess3($msg)
{
$data = array();
$data['success'] = true;
$data['msg'] = $msg;
return json_encode($data);
exit;
}
  
 function outputError($msg)
{
$data = array();
$data['error'] = true;
$data['msg'] = $msg;
echo json_encode($data);
exit;
}

 function outputSuccess($msg)
{
$data = array();
$data['success'] = true;
$data['msg'] = $msg;
echo json_encode($data);
exit;
}

 function outputMsg($result,$json=true)
{
    $data = array();
    if(isset($result->error))
{
    if(isset($result->error->error_user_title))
    {
        $msg = $result->error->error_user_title.'<br>';
        $msg .= $result->error->error_user_msg;
        if($json == true)
        {
        $data['msg']= $msg;
        $data['error'] = true;
        echo json_encode($data); exit; 
        }else{
            echo $msg;
        }
        
    }else{
        $msg = $result->error->message;
        if($json == true)
        {
        $data['msg']= $msg;
        $data['error'] = true;
        echo json_encode($data); exit;
        }else{
            echo $msg;
        }
        
    }
   
    exit;
}
}


function truncate($string,$length)  {
	$string = trim(strip_tags($string));
	if (strlen($string) > $length) {
		$string = substr($string,0,$length).'...';
	}
	return $string;
}

function clearString($data) {
    $data = stripslashes(trim($data));
	$data = strip_tags($data);
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	return $data;
}

function xssClean($data) {
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	return $data;
}

function isAlphaSpaces($val) {
	return (bool) preg_match("/^([a-zA-Z ])+$/i", $val);
}

function isAlpha($val) {
	return (bool) preg_match("/^([a-zA-Z])+$/i", $val);
}

function isAlphaNumSpaces($val) {
	return (bool) preg_match("/^([a-zA-Z0-9 ])+$/i", $val);
}

function isAlphaNum($val) {
	return (bool) preg_match("/^([a-zA-Z0-9])+$/i", $val);
}

function validEmail($email) {
	return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? true : false;	
}

function pageUrl() {
	return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

function getDomain($url) {
	if(preg_match("#https?://#", $url) === 0) {
		$url = 'http://' . $url;
	}
	return strtolower(str_ireplace('www.', '', parse_url($url, PHP_URL_HOST)));
}

function getDomainName($url) {
	$url = (preg_match("#https?://#", $url) === 0 ? 'http://' . $url : $url);
	$host = strtolower(str_ireplace('www.', '', parse_url($url, PHP_URL_HOST)));
	$hostArr = explode(".",$host);
	$count = count($hostArr);
	if($count >= 3) {
		return $hostArr[1];
	}
	return $hostArr[0];
}

function formatSizeUnits($bytes) {
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	}
	elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	}
	elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	}
	elseif ($bytes > 1)	{
		$bytes = $bytes . ' bytes';
	}
	elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	}
	else {
		$bytes = '0 bytes';
	}
	return $bytes;
}

function getRemoteContents($url) {
	$result = false;
	if(extension_loaded('curl') === true) {
		$USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_USERAGENT, $USER_AGENT);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		unset($ch);	
		if($httpcode != 200) {
			$result = false;
		}
	}
	return $result;
}

function getStringBetween($string,$start,$end) {
	$string = " " . $string;
	$ini = strpos($string, $start);
	$eni = strpos($string, $end);
	if ($ini == 0 || $eni == 0) return "";
	$ini+= strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}

function getIpAddress() {
	switch(true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default : return $_SERVER['REMOTE_ADDR'];
    }
}

function httpsStatus() {
	if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on') {
		return true;
	}
	else if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
		return true;
	}
	else if(isset($_SERVER['HTTP_FRONT_END_HTTPS']) && $_SERVER['HTTP_FRONT_END_HTTPS'] === 'on') {
		return true;
	}
	else if(isset($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] === 'https') {
		return true;
	}
	return false;
}

function generatePermalink($entry)  {
	$permalink = strtolower(strip_tags($entry));
	if (!mb_check_encoding($permalink, "UTF-8")) {
		$permalink = preg_replace('/[^a-z0-9]/i', ' ', $permalink);
		$permalink = trim(preg_replace("/[[:blank:]]+/", " ", $permalink));
		$permalink = strtolower(str_replace(" ", "-", $permalink));	
	}
	else {
		$permalink = trim($entry);
		$permalink = str_replace(" ", "-", $permalink);
	}
	$permalink = cleanPermalink($permalink);
	return strtolower($permalink);
}

function cleanPermalink($permalink)  {
	$to_clean  = array("#","%","&","$","*","{","}","(",")","@","^","|","/",";",".",",","`","!","\\",":","<",">","?","/","+",'"',"'");
	$permalink = str_replace(" ", "-", $permalink);
	foreach ($to_clean as $symbol) {
		$permalink = str_replace($symbol, "", $permalink);
	}
	while (strpos($permalink, '--') != false) {
		$permalink = str_replace("--", "-", $permalink);
	}
	$permalink = rtrim($permalink, "-");
	$permalink = ltrim($permalink, "-");
	if ($permalink != "-") {
		return $permalink;
	}
	else {
		return "";
	}
}

function showLanguageVar($languageValues,$index,$strongTag = false) {
	if(isset($languageValues[$index])) {
		$value = $languageValues[$index];
		if($strongTag == true) {
			$value = str_replace("*{*","<strong>",$value);
			$value = str_replace("*}*","</strong>",$value);
		}
		return $value;
	}
	return null;
}

 function unsetSessions(){
     //handling timmed videos
     if(isset($_SESSION['trimedInputs']))
     {
         foreach ($_SESSION['trimedInputs'] as $key => $value) {
             //delete the file
             if(file_exists($value['url']))
             {
                 unlink($value['url']); 
             }
              
         }
         unset($_SESSION['trimedInputs']);
     }
     
   if(isset($_SESSION['searched_products'])){ unset($_SESSION['searched_products']); }
     
     
 }
 
 function get_rand_numbers($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(27,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
} 


function get_rand_letters($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,26);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
} 


function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
} 

function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}



function postData($url, $data,$type = 'post')
{
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_URL, $url);
if($type == 'get')
{
    curl_setopt($handle, CURLOPT_HTTPGET, true);
}elseif($type == 'post'){
    curl_setopt($handle, CURLOPT_POST, true);
}

curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true); // Return the output in string format
curl_getinfo($handle, CURLINFO_HTTP_CODE);
$output = curl_exec($handle);
curl_close($handle);
return json_decode($output); // Show output

}


function format_output($data)
{
    echo '<pre>';
          var_dump($data);
    echo '</pre>';
}

function page_referer()
{
    return $_SERVER['HTTP_REFERER'];
}


function convertToTimezone($time,$tz)
{
try{
    
    $timestamp = time();
$dt = new DateTime($time, new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$date = $dt->format('d.m.Y, h:i:s');
return strtotime($date);
} catch (Exception $ex) {
    log_message('error', $ex->getMessage());
}

}




   function objectToArray($o)
        {
            $a = array();
            foreach ($o as $k => $v)
                $a[$k] = (is_array($v) || is_object($v)) ? objectToArray($v): $v;

            return $a;
        }
        
     function cleanData(&$str)
     {
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "'$str";
    }
    str_replace(" ' ", " ", $str);
   // if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
   }
   
   
   
   
   
