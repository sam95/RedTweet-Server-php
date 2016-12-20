<?php

$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('RedTweet', $con);
 
mysql_query('SET CHARACTER SET utf8');
$val1 = $_GET['b_group'];
$val3 = strtolower($val1);
$val2 = $_GET['location'];
//echo "$val1 \n\n $val2";
//$r = mysql_query('SELECT tweet,location,b_group,contact FROM tweet_info where b_group = '$val1' and location = '$val2' limit 10');
//echo $val1 . ", " . $val2;
$r = mysql_query("SELECT tweet,location,b_group,contact FROM tweet_info WHERE (b_group='".$val3."' or b_group='Any') AND location='".$val2."' order by id desc");

//$r = mysql_query('SELECT * from table_android where 1');

//$out = array();
//$finalout = array();
 
while($row = mysql_fetch_array($r))
{

	
	$out[] = $row;

	
}
//var_dump($out);
//var_dump($finalout);
print(json_encode($out));
mysql_close($con);

?>
