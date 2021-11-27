<?php
$server_username = "3973168_minhbinhnam";
$server_password = "minhbinhnam123";
$server_host = "fdb33.awardspace.net";
$database = '3973168_minhbinhnam';

$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");