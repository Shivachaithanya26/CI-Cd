<?php
    require_once "config.php";
    
    if($_POST['submit'] == 'Submit'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $id = $_POST['id'];

        $sql = "UPDATE profiles SET username='{$username}', email='{$email}', address='{$address}' WHERE id='{$id}'";

        try{
            mysqli_query($conn, $sql);
            echo "Records were updated successfully.";
            header("location: index.php");
            exit();
        }
        catch(mysqli_sql_exception){
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);        
        }
    }
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM profiles WHERE id='{$id}'");
    $singleRow = mysqli_fetch_array($result);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please fill this form and submit to update profiles to the database.</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="username" class="form-control" value ="<?php echo $singleRow['username'] ;?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value ="<?php echo $singleRow['email'] ;?>">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value ="<?php echo $singleRow['address'] ;?>">
                        </div>
                        <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
