<?php require ('connection.php'); 
    session_start();
if(isset($_POST['button']))
{
	$nid=$_POST['nid'];
	$password =$_POST['password'];


	$query = "SELECT role FROM superadmin WHERE  nid='".$nid."' AND password='".md5($password)."' ";

 $result= mysqli_query($conn,$query);
 
if ($result->num_rows > 0) {
    //superadmin
    $row = $result->fetch_assoc();
    $role = $row['role'];
    $_SESSION['nid'] = $nid;
    header('Location: super.php');

 
} else {
    //admin
    $query = "SELECT role FROM admins WHERE  nid='".$nid."' AND password='".md5($password)."' ";
    $result= mysqli_query($conn,$query);
 
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $role = $row['role'];
   
        $_SESSION['nid'] = $nid;

    header('Location: admin_dash.php');
  
 
    } else {
        //user
        $query = "SELECT role FROM applicant WHERE  nid='".$nid."' AND password='".md5($password)."' ";
        $result= mysqli_query($conn,$query);
 
        if ($result->num_rows > 0) {
   
            $row = $result->fetch_assoc();
            $role = $row['role'];
            $_SESSION['nid'] = $nid;
            header('Location: user.php');
   
 
        } else {

            echo "Invalid email or password.";
        }
    }
}
}
 

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>সুরক্ষা : Login</title>
<link rel="icon" type="image/x-icon" href="image/favicon.ico">
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    border: none;
    outline: none;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
  }
body {
  height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)), url(image/logc.jpg);
  background-size: cover;
  background-position: center;
}

.container {
  position: relative;
  width: 100%;
  max-width: 450px;
  height: 530px;
  background: transparent;
  border-radius: 20px;
  border: 2px solid rgba(257,257,257, .7);
  backdrop-filter: blur(20px);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.main-box {
  padding: 50px;
  width: 100%;
}

..main-box h1 {
  text-align: center;
  font-size: 42px;
  font-weight: 700;
  color: #ffffff;
}

.input-box {
  position: relative;
  height: 52px;
  width: 100%;
  border-bottom: 2px solid #ffffff;
  margin: 32px 0;
}

.input-box label{
  position: absolute;
  top: 50%;
  left: 6px;
  transform: translateY(-50%);
  pointer-events: none;
  color: #ffffff;
  font-weight: 500;
  font-size: 18px;
  transition: all ease .40s;
}

.input-box input{
  height: 100%;
  width: 100%;
  background: transparent;
  font-size: 17px;
  font-weight: 600;
  color: #ffffff;
  padding: 0 30px 0 6px;
}
.input-box input:focus~label,
.input-box input:valid~label{
  top: -3px;
}

.check{
  color: #ffffff;
  font-size: 15px;
  font-weight: 500;
  margin: -10px 0 15px;
  display: flex;
  justify-content: space-between;
}
.check label input{
  vertical-align: middle;
  margin-right: 6px;
  accent-color: #ffffff;
}
.check a{
  color: #ffffff;
}
.check a:hover{
  text-decoration: underline;
}
.btn{
  width: 100%;
  height: 45px;
  background: #ffffff;
  border-radius: 30px;
  font-size: 17px;
  font-weight: 600;
  color: #000000;
  margin-top: 10px;
  cursor: pointer;
}
.register{
  text-align: center;
  color: #ffffff;
  font-size: 15px;
  font-weight: 500;
  margin: 35px 0 10px;
}
.register p a{
  font-size: 15px;
  font-weight: 600;
  color: #ffffff;
  margin-left: 5px;
}
.register p a:hover{
  text-decoration: underline;
}


.navf ul{
    margin-right: 40px;
    align-items: top;
}
.navf ul li{
    display: inline-block;
    margin: 5px 0px;
    line-height: 70px;
}
.navf ul li a{
    color: #ffffff;
    font-size: 18px;
    border: 1px solid transparent;
    padding: 8px 22px;
    border-radius: 3px;
    transition: ease .40s;
    
}
.navf ul li a.active ,a:hover{
border: 1px solid rgb(1, 4, 51);
background-color: rgb(29, 137, 238);
transition: .4s;
}
</style>
</head>
<body>
  <div class="navf">
    <ul>
      <li><a class="active" href="index.php">Home</a></li>
      </ul>
  </div>
<div class="container">
  
 
<div class="main-box">
  <h1>Login</h1>
  <form action="#" method="POST">
    <div class="input-box">
      <input type="text" name="nid"required>
      <label>NID</label>
    </div>

    <div class="input-box">
      <input type="password" name="password" required>
      <label>Password</label>
    </div>
    <div class="check">
      <label><input type="checkbox">Remember Me</label>
      <a href="#">Forget Passowrd?</a>
</div>
<button type="submit" name="button" class="btn">Login</button>
<div class="register">
  <p>Don't have an Account?<a href="#" class="register-link">Sign Up!</a></p>
</div>


  </form>
  </div>
</div>

</body>
</html>
