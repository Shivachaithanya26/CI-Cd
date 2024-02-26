<?php
    include "config.php";
   
    if($_POST['submit'] == 'Submit') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO profiles(username, email, address)
            VALUES('{$username}', '{$email}', '{$address}')";

    // if(mysqli_query($link, $sql)){
    //     echo "Profile created successfully";
    // } else{
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    // }
    
    try{
        mysqli_query($conn, $sql);
        echo "User is Now Registered";
        header("location: index.php");
        exit();
    }
    catch(mysqli_sql_exception){
        echo "Could not Register user". mysqli_error($conn);
    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add profiles to the database.</p>
                    <form action="profile.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

