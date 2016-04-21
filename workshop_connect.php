<?php
require_once('TwitterAPIExchange.php');
$con = mysql_connect('localhost', 'root', '');
mysql_select_db('android_api', $con);

$settings = array(
    'oauth_access_token' => "2710727430-W1yuXnwerqFDEdCvyHcePZIMMLtdFcOtRhNfUBo",
    'oauth_access_token_secret' => "PWijr9VQ4tLG45316Xcq93rfbAlKFAF9yud0GCcC4y7pa",
    'consumer_key' => "Bc1X2cRhkT1dUvWueqX3FUFd4",
    'consumer_secret' => "qEUjNUm171es7kLe4c9QhB55cbmbMDyXeejvYWcqPPBCVmhd24"
);



$city=$_POST['city'];
$units=$_POST['units'];
$b_group=$_POST['b_group'];
$hospital=$_POST['hospital'];
$contact=$_POST['contact'];

$tweet = "#".$city." needs ".$units." units of ".$b_group." blood at ".$hospital." ,please contact ".$contact." #bloodaid.";

$url = 'https://api.twitter.com/1.1/statuses/update.json';
$requestMethod = 'POST';

 $postfields = array(
            'status' => $tweet,
          //  'screen_name' => 'BloodAid', 
    	  //  'skip_status' => '1'
        );

$twitter = new TwitterAPIExchange($settings);
		$twitter->buildOauth($url, $requestMethod)
                    ->setPostfields($postfields)
                    ->performRequest();


mysql_query("INSERT INTO request (city, units, b_group, hospital, contact) VALUES ('{$city}', '{$units}', '{$b_group}','{$hospital}','{$contact}')");

mysql_close();

?>
