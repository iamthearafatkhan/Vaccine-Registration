<?php

session_start();
if (!isset($_SESSION['nid'])) {
    header("Location: login.php");
    exit;
}

    ?>

<?php 
include 'connection.php';
  $nid = $_SESSION['nid']; 

  $query = "SELECT a.full_name, a.nid, a.phone, d.division_name AS division, c.center_name AS center, a.vaccine_name, a.vaccine_date, a.card, a.certificate
  FROM applicant a
  JOIN center_table c ON a.center = c.id
  JOIN division_table d ON a.division = d.id
  WHERE a.nid = '$nid'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="image/faviconuser.ico">
  
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .user-info {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .user-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="user-info">

<div class="mb-3">
        <label  class="form-label">Name:<p><?php echo  $userData['full_name']; ?></p></label>
        
      </div>
      <div class="mb-3">
        <label  class="form-label">NID:<p><?php echo  $userData['nid']; ?></p></label>
        
      </div>
      <div class="mb-3">
        <label  class="form-label">Phone:<p><?php echo  $userData['phone']; ?></p></label>
        
      </div>
      <div class="mb-3">
    <label class="form-label">Center:<p><?php echo $userData['center']; ?></p></label>
</div>
      <div class="mb-3">
    <label class="form-label">Division:<p><?php echo $userData['division']; ?></p></label>
</div>
      <div class="mb-3">
        <label class="form-label">Vaccine Name:<p><?php echo  $userData['vaccine_name']; ?></p></label>
        
      </div>
      <div class="mb-3">
        <label  class="form-label">Vaccine Date:<p><?php echo  $userData['vaccine_date']; ?></p></label>
        
        <div class="mb-3">
        <label class="form-label">Card:
            <p>
                <a href="<?php echo $userData['card']; ?>" download>
                <i class="fa fa-download" aria-hidden="true"></i>
                </a>
            </p>
        </label>
    </div>
    <div class="mb-3">
        <label class="form-label">Certificate:
            <p>
                <a href="<?php echo $userData['certificate']; ?>"  download>
                <i class="fa fa-download" aria-hidden="true"></i>
                </a>
            </p>
        </label>
    </div>

</div>
<a href="logout.php" class="btn btn-info btn-lg ">Logout</a>

</body>
</html>