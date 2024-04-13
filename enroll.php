<?php
include 'connection.php';

$categoryQuery = "SELECT * FROM category_table";
$divisionQuery = "SELECT * FROM division_table";
$centerQuery = "SELECT * FROM center_table";

$categoryResult = mysqli_query($conn, $categoryQuery);
$divisionResult = mysqli_query($conn, $divisionQuery);
$centerResult = mysqli_query($conn, $centerQuery);

if (isset($_POST['submit'])) {
  $name = $_POST["name"];
  $nid = $_POST["nid"];
  $number = $_POST["phone"];
  $pass = $_POST["pass"];
  $cpass = $_POST["cpass"];
  $category = $_POST["category"];
  $division = $_POST["division"];
  $center = $_POST["center"];
  $gender = $_POST["gender"];
  $birth_date = $_POST["birthdate"];

  if ($pass == $cpass) {
      $hashedPassword = md5($pass);
      $insertQuery = "INSERT INTO applicant (full_name, nid, phone, password, gender, date_of_birth, category, division, center)
                      VALUES ('$name', '$nid', '$number', '$hashedPassword', '$gender', '$birth_date', '$category', '$division', '$center')";

      if (mysqli_query($conn, $insertQuery)) {
          header('Location: login.php');
          exit();
      } else {
          echo 'Error: ' . mysqli_error($conn);
      }
  } else {
      echo 'Password Mismatch';
  }
}

?>

<!-- The rest of your HTML code -->

<!-- The rest of your HTML code -->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>সুরক্ষা : কোভিড-১৯ ভ্যাকসিনের জন্য নিবন্ধন করুন</title>
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
<body>
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

  <div class="container">
    <h1 class="mt-5">Registration Form</h1>
    <form action="" method="post">
      <div class="mb-3">
        <label for="fullName"  class="form-label">Full Name:</label>
        <input type="text" name="name" class="form-control" id="fullName" placeholder="Enter your full name" required>
      </div>
      <div class="mb-3">
        <label for="id"  class="form-label">National Identity Card Number:</label>
        <input type="id" name="nid" class="form-control" id="id" placeholder="Example- 19825624603112948" required>
      </div>
      <div class="mb-3">
        <label for="number"  class="form-label">Phone Number:</label>
        <input type="text" name="phone" class="form-control" id="number" placeholder="Enter your Number" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="pass" class="form-control" id="password" placeholder="Enter your password" required>
      </div>
      <div class="mb-3">
        <label for="cpass" class="form-label">Confirm Password:</label>
        <input type="password" name="cpass" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
      </div>

      

      <div class="mb-3">
    <label class="form-label" for="selectCategory">Category:</label>
    <select class="form-select" name="category" id="selectCategory" required>
        <option value="" disabled selected>Category:</option>
        <?php
        while ($row = mysqli_fetch_assoc($categoryResult)) {
            echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
        }
        ?>
    </select>
</div>

<div class="mb-3">
    <label class="form-label" for="selectDivision">Division :</label>
    <select class="form-select" name="division" id="selectDivision" required>
        <option value="" disabled selected>Select division:</option>
        <?php
        while ($row = mysqli_fetch_assoc($divisionResult)) {
            echo '<option value="' . $row['id'] . '">' . $row['division_name'] . '</option>';
        }
        ?>
    </select>
</div>

<div class="mb-3">
    <label class="form-label" for="selectCenter">Center :</label>
    <select class="form-select" name="center" id="selectCenter" required>
        <option value="" disabled selected>Select center:</option>
        <?php
        while ($row = mysqli_fetch_assoc($centerResult)) {
            echo '<option value="' . $row['id'] . '">' . $row['center_name'] . '</option>';
        }
        ?>
    </select>
</div>
      <div class="mb-3">
        <label class="form-label" name="gender">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>
      <div class="mb-3">
        <label for="dateOfBirth"  class="form-label">Date of birth (according to national identity card):</label>
        <input type="date" name="birthdate" class="form-control" id="dateOfBirth" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="agreeTerms" required>
        <label class="form-check-label" name="agree" for="agreeTerms">I agree to the terms and conditions</label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

  
</body>
</html>
