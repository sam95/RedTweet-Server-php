<?php

$con = mysqli_connect('localhost', 'root', '1234');
mysqli_select_db('RedTweet', $con);

$token = $_POST['token'];

mysqli_query("INSERT INTO token (token_num) VALUES ('{$token}')");

mysqli_close();

?>
