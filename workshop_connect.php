<?php
require_once('TwitterAPIExchange.php');
$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('RedTweet', $con);

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);



$city=$_POST['city'];
$units=$_POST['units'];
$b_group=$_POST['b_group'];
$hospital=$_POST['hospital'];
$contact=$_POST['contact'];
mysql_query("INSERT INTO request (city, units, b_group, hospital, contact) VALUES ('{$city}', '{$units}', '{$b_group}','{$hospital}','{$contact}')");

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


//mysql_query("INSERT INTO request (city, units, b_group, hospital, contact) VALUES ('{$city}', '{$units}', '{$b_group}','{$hospital}','{$contact}')");

mysql_close();

?>
