<?php

$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('RedTweet', $con);


$result1 = mysql_query("select token_num from token");
$result2 = mysql_query("select email,b_group,location from users");
$token = array();
$email = array();
$blood = array();
$loc = array();
//$count = mysql_query("select count(email) from users");

//$row = mysql_fetch_array($count);
//echo $row; 


$count = 0;
while($row1 = mysql_fetch_array($result1)) {

	$token[] = $row1['token_num'];
	$count++;
	
	//print($email);
	//print($token);
}

while($row2 = mysql_fetch_array($result2)){

	
	$email[] = $row2['email'];
	$blood[] = $row2['b_group'];
	$loc[] = $row2['location'];

}
//print($count);
//print($token[0]);
//print("\n");
//print($token[1]);

for($i = 0;$i<$count;$i++)
mysql_query("INSERT INTO token_filter(token,email,location,bgroup) VALUES ('{$token[$i]}','{$email[$i]}','{$loc[$i]}','{$blood[$i]}')");
	


//mysql_query("INSERT INTO token (token_num) VALUES ('{$token}')");

mysql_close();

?>
