<?php
include 'connection.php'; 
session_start();

$provided_nid = $_POST['nid'];

$query = "SELECT COUNT(*) FROM applicant WHERE nid = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $provided_nid);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    $verification_result = "NID is verified.";
} else {
    $verification_result = "NID is not verified.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>NID Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <style>
    .navbar{
    overflow: hidden;
    background: #fff;
    margin-top: -10px;
}


header .container label img {
    width: 220px; 
    height: 80px; 
    margin-bottom: 2px; 
    padding: 15px 10% 5px;
}
nav{
    
    width: 100%;
    background: #ffffff;
    position: top;
    left:0;
    right:0;
    top:0;
}
nav .logo{
    width: 20px;
    cursor: pointer;
}

nav ul{
    float: right;
    margin-right: 40px;
    align-items: center;
}
nav ul li{
    display: inline-block;
    margin: 5px 0px;
    line-height: 70px;
}
nav ul li a{
    color: #000000;
    font-size: 18px;
    border: 1px solid transparent;
    padding: 8px 22px;
    border-radius: 3px;
    transition: ease .40s;
    
}
nav ul li a.active ,a:hover{
border: 1px solid rgb(12, 19, 114);
background-color: rgb(199, 230, 219);
transition: .4s;
}
  </style>
</head>
 <header>
    <div class="container">
      <!-- Navigation bar -->
      <nav class="navbar">
        <label>
        <img src="image/logo.png" class="logo">
      </label>
        <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="#">Registration</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="verify.php">Verify Certificate</a></li>
        </ul>
      </nav>
    </div>
  </header>
<body>
    <h1>NID Verification Result</h1>
    <p class="text-success"><?php echo $verification_result; ?></p>
</body>
</html>
