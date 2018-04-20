<?php
require "base.php";
global $con;
 $query = "SELECT cell_token from usuario where id=2";
     $result = mysqli_query($con, $query);
    $number_of_rows = mysqli_num_rows($result);
    
    $tokens = array();
    if($number_of_rows >= 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tokens[] = $row['cell_token'];
        }
    }

$message = array("message" => "Kokorooo ");
$message_status = send_notification($tokens, $message);

function send_notification ($tokens, $message)
      {
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                   'registration_ids' => $tokens,
                   'data' => $message
                  );
            $headers = array(
                  'Authorization:key = AIzaSyBEyFo4jaGGIdyyoJOadxzU1Lzl15dOtmE',
                  'Content-Type: application/json'
                  );
         $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       echo $result;
       return $result;
      }

?>