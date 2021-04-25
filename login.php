<?php
session_start();

$submit=$_POST;
if($submit)
{
  // echo "<script> alert('Hi')</script>";
  //$role=$_POST['role'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  // echo "<script> alert('$role')</script>";
  $conn=mysqli_connect('localhost','root','','blog');
  if(!$conn){
   die("error while connecting!!");
   
  }

 $password=md5($password);
 
 if($role=='customer')
 {
  $sql="SELECT * FROM login WHERE email='$email' AND password='$password'";
 }

 else{
  $sql="SELECT * FROM login WHERE email='$email' AND password='$password'";
 }
 
 $res=mysqli_query($conn,$sql);
 if($res)
 {
  $rows=mysqli_num_rows($res);
  if($rows==0){

  echo "<script>alert('Incorrect Email Id or Password!!');
  window.location.href='index.html';</script>";
  //header("Location:login.html");
}
else
{ 
  // $ip=getHostByName(getHostName());
  // setcookie("remember",md5('sggs'.$email.$ip.'salt'),time()+(86400*30),"/");
 // echo "<script> alert('true')</script>";
  $_SESSION['email']=$email;
  header("Location:home.html");
 }

}

 
}
?>
