<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.

function get_app_by_id($connId, $timeout)
{
  // $app_info = array();

  // normally this info would be pulled from a database.
  // build JSON array.
  
  $start_time = time();
 $status = "ok";
  while(true) {
    if ((time() - $start_time) > $timeout) {
      return $status; // timeout, function took longer than 300 seconds
    }
    // Other processing
  }
  // return $status;
  
  // switch ($id){
    // case 1:
      // $app_info = array("app_name" => "Web Demo", "app_price" => "Free", "app_version" => "2.0"); 
      // break;
    // case 2:
      // $app_info = array("app_name" => "Audio Countdown", "app_price" => "Free", "app_version" => "1.1");
      // break;
    // case 3:
      // $app_info = array("app_name" => "The Tab Key", "app_price" => "Free", "app_version" => "1.2");
      // break;
    // case 4:
      // $app_info = array("app_name" => "Music Sleep Timer", "app_price" => "Free", "app_version" => "1.9");
      // break;
  // }

  // return $app_info;
}

function get_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer")); 

  return $app_list;
}

$possible_url = array("get_app_list", "get_app");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_app_list":
        $value = get_app_list();
        break;
      case "get_app":
        if (isset($_GET["connId"]) && isset($_GET["timeout"]))
          $value = get_app_by_id($_GET["connId"], $_GET["timeout"]);
        else
          $value = "Missing argument";
        break;
    }
}

//return JSON array
exit(json_encode($value));
?>
