<?php
session_start();

$name=$_POST[name];
$email=$_POST[email];
$travel=$_POST[travel];
$text=$_POST[text];
$rating=$_POST[rating];

$con=mysqli_connect('localhost','root','','blog');
if(!$con){
  echo "Database is not connected,try again later";
  exit();
}
$sql="INSERT INTO `contact`(`name`, `email`, `travel`, `text`, `rating`) VALUES ('$name','$email','$travel','$text','$rating')";

if(mysqli_query($con,$sql))
{
  //echo "$password"."$conpassword  header("Location:home.html");
  header("Location:home.html");

}
else{
  echo "Currently unable to register,please try again later";
  //header("Location:contact.html");
}