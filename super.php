<?php

session_start();
if (!isset($_SESSION['nid'])) {
    header("Location: login.php");
    exit;
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20vh;
            
        }
      

        .column {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            color: white;
            font-weight: 200;
            font-size: 20px;
    
        }

        .left-column {
            background-color: brown;
        }

        .right-column {
            background-color: brown;
        }
    </style>
</head>
<body>
<div class="container ">

<div class="col-md-4">
    <div class="column left-column">
        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Applicant</p>
        <h5 class="font-weight-bolder mb-0">
                            <?php
                            include 'connection.php';
                            $sql = "SELECT COUNT(*) as total_rows FROM applicant";
                            $result= mysqli_query($conn,$sql);
                            
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $totalRows = $row['total_rows'];
                                echo "" . $totalRows;
                            } else {
                                echo "No rows found";
                            }
                            
                           
                            ?>
                         </h5>
    </div>
</div>
<div class="col-md-4">
    <div class="column right-column">
        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Admin</p>
        <h5 class="font-weight-bolder mb-0">
        <?php
                            $sql = "SELECT COUNT(*) as total_rows FROM admins";
                            $result= mysqli_query($conn,$sql);
                            
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $totalRows = $row['total_rows'];
                                echo "" . $totalRows;
                            } else {
                                echo "No rows found";
                            }
                            ?>
                        </h5>
                        </div>
                    </div>
                    </div></div>
                    <br>
                    <div class="container">
    <div class="btn-container">
        <a href="userpage.php" class="btn btn-info btn-lg" tabindex="-1" role="button" aria-disabled="true">Applicant</a>
        <a href="adminpage.php" class="btn btn-info btn-lg" tabindex="-1" role="button" aria-disabled="true">Admin</a>
        <a href="admin_create.php" class="btn btn-info btn-lg" tabindex="-1" role="button" aria-disabled="true">Admin Create</a>
        <a href="newadd.php" class="btn btn-info btn-lg" tabindex="-1" role="button" aria-disabled="true">Add</a>
    </div>
</div>
<a href="logout.php" class="btn btn-info btn-lg ">Logout</a>

</body>
</html>

