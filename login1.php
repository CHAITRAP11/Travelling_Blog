    <?php
    $name = $email = $password = $cpassword = "";
    $con=mysqli_connect('localhost','root','','blog');
    if(!$con){
    echo '<script type="text/javascript">"Database is connected.</script>';
    header("Location:signup.php");}
    else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
       echo '<script type="text/javascript">"Name is required."</script>';
       header("Location:signup.php");
     }
     else{
       $name = test_input($_POST["name"]);
     } 
      if (empty($_POST["email"])) {
       echo '<script type="text/javascript">"Email is required."</script>';
       header("Location:signup.php");
     } 
     else{
       $email = test_input($_POST["email"]);
     } 
      if (empty($_POST["password"])) {
       echo '<script type="text/javascript">"Password is required."</script>';
       header("Location:signup.php");
     } 
     else{
      $password = test_input($_POST["password"]);
     }
      if (empty($_POST["conpassword"])) {
       echo '<script type="text/javascript">"Cofirm Password is required."</script>';
       header("Location:signup.php");
     }else{
       $conpassword = test_input($_POST["conpassword"]);
     } 
      $password=md5($password);
      $sql="select email from login where email='$email'";
      $result=mysqli_query($con,$sql);
      if(mysqli_num_rows($result)>0){
       echo '<script type="text/javascript">alert("Given Email is already Registered, use new ID")</script>';
      header("Location: index.html");
     }
     $sql="INSERT INTO `login` (`name`,`email`,`password`) VALUES
     ('$name', '$email','$password')";
     if(!mysqli_query($con,$sql))
     {
      echo "Currently unable to register,please try again later";
      exit();
     }
    }
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   }
    ?>