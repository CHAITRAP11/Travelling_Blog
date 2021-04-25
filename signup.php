<?php
 session_start();

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$conpassword=$_POST['conpassword'];

 $con=mysqli_connect('localhost','root','','blog');
if(!$con){
  echo "Database is not connected,try again later";
  exit();
}
$password=md5($password);
$conpassword=md5($conpassword);
$sql="select email from login where email='$email'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
  //echo '<script type="text/javascript">alert("Given Email is already Registered")</script>';
  // header("Location: http://localhost/master-project-master/regisration.html");
  //header("Location:register.html");
  echo "<script>alert('Incorrect Email Id !!');
  window.location.href='register.html';</script>";
}
if($password!==$conpassword){
   //echo '<script type="text/javascript">alert("Password is not matching")</script>';
   //header("Location:register.html");
  echo "<script>alert('Password are not matching!!');
  window.location.href='register.html';</script>";
}
$sql="INSERT INTO `login` (`name`,`email`,`password`,`conpassword`) VALUES
('$name', '$email','$password','$conpassword')";
if(mysqli_query($con,$sql))
{
  //echo "$password"."$conpassword  header("Location:home.html");
  $_SESSION['email']=$email;
  header("Location:home.html");

}
else{
  echo "Currently unable to register,please try again later";
  header("Location:register.html");
}
?>