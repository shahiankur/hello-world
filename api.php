<?php
error_reporting(0);
$cSession = curl_init(); 

/*by default if we did not mention it will be the GET Request*/
curl_setopt($cSession,CURLOPT_URL,"http://localhost:1234/serverSide.php?connId=19&timeout=2");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

$statusCode=curl_exec($cSession);

curl_close($cSession);
//echo "It is going to display the method which it gets from the server side";
echo $statusCode;

?>
