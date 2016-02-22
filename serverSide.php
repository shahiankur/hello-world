<?php
error_reporting(0);
$method = $_SERVER['REQUEST_METHOD'];
$connIdWithTime = '{"2":"15","8":"10"}';

$connIdWithTimeJson = json_decode($connIdWithTime);//creates the json Object with string
//$connIdWithTimeJson = json_decode($connIdWithTime,true);//creates the json Array with string
switch ($method) {
  case 'PUT':
    /*do_something_with_put($request);*/  
    break;
        
  case 'GET':
    if(isset($_GET['connId'])&& isset($_GET['timeout']))
    {
       $conId= $_GET['connId'];
       $timeOut = $_GET['timeout'];
       sleep($timeOut);
       $statusCode =  '{"status":"ok"}';
       echo $statusCode;
    }
    if(isset($_GET['connId']))
    {
        $connId= $_GET['connId'];
        
        //echo $connId;
        $connIdStr = (string)$connId;
        //echo $connIdStr;
        //echo $connIdWithTimeJson[$connIdStr];
        echo $connIdWithTimeJson->$connIdStr;
    }
    break;
  
  default:
    break;
}
?>