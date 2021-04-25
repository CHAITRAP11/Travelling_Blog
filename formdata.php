<?php

$con=mysqli_connect('localhost','root','','blog');
if(!$con){
  echo "Database is not connected,try again later";
  exit();
}

echo "error";
$sql = "SELECT id,name,email,travel,text,rating FROM `contact`";
error "error";
  // mysql_select_db('test_db');
  // $retval = ;
   
   if(!mysql_query( $sql, $con)) {
   	  echo "error";
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_NUM)) {
      echo "ID :{$row[0]}  <br> ".
         "NAME : {$row[1]} <br> ".
         "EMAIL : {$row[2]} <br> ".
         "TRALLER : {$row[3]} <br> ".
         "TELL ME : {$row[4]} <br> ".
         "RATING : {$row[5]} <br> ".
         "--------------------------------<br>";
   }
   
   mysql_free_result(mysql_query( $sql, $con));
   echo "Fetched data successfully\n";
   
   mysql_close($con);
?>