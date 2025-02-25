<?php
$hostname="localhost";
$db="lac";
$uname="test";
$pword="devuser";
$dbh=mysqli_connect($hostname,$uname,$pword,$db)or die("mysql error".mysqli_connect_error());
if(!$dbh){
    echo "Plx contact Admin";
}














?>