<?php
require_once('TwitterAPIExchange.php');
<<<<<<< HEAD
$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('RedTweet', $con);

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
=======
$con = mysql_connect('localhost', 'root', '');
mysql_select_db('android_api', $con);

$settings = array(
    'oauth_access_token' => "****",
    'oauth_access_token_secret' => "****",
    'consumer_key' => "****",
    'consumer_secret' => "****"
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9
);



$city=$_POST['city'];
$units=$_POST['units'];
$b_group=$_POST['b_group'];
$hospital=$_POST['hospital'];
$contact=$_POST['contact'];
<<<<<<< HEAD
mysql_query("INSERT INTO request (city, units, b_group, hospital, contact) VALUES ('{$city}', '{$units}', '{$b_group}','{$hospital}','{$contact}')");
=======
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9

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


<<<<<<< HEAD
//mysql_query("INSERT INTO request (city, units, b_group, hospital, contact) VALUES ('{$city}', '{$units}', '{$b_group}','{$hospital}','{$contact}')");
=======
mysql_query("INSERT INTO request (city, units, b_group, hospital, contact) VALUES ('{$city}', '{$units}', '{$b_group}','{$hospital}','{$contact}')");
>>>>>>> edecbd4cc035e9bf9ab9a5441e8b5764ca2127d9

mysql_close();

?>
