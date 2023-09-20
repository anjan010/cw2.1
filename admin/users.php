

<?php

    require('inc/essentials.php');
    adminLogin();
?>
<?php
$mysqli = require __DIR__ . "/database.php";

// Query to retrieve all users' data
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

// Check if any rows were returned
// Close the database connection
// $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Settings</title>
    <?php require('inc/link.php'); ?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php')?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
               <h3 class="mb-4">Users</h3>  

               <!-- General settings section -->
               <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0"> <?php echo $row["name"]; ?> </h5>

                                <form id="myForm" action="deleteuser.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>">
</form>
                                <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                    <i class="bi bi-pencil-square"></i> <a href="javascript:void(0);" onclick="document.getElementById('myForm').submit();" class="btn btn-primary">
    Delete
</a>


                            </div>
                        <h6 class="card-subtitle mb-1 fw-bold">ID</h6>
                        <p class="card-text"> <?php echo $row["id"]; ?> </p>
                        <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                        <p class="card-text"> <?php echo $row["email"]; ?> </p>
                    </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php require('inc/script.php'); ?>

    <?php $mysqli->close(); ?>

</body>
</html>