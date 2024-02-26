<?php
    
    require "config.php";

    if($_POST['submit'] == 'Yes'){
        $id = $_POST['id'];

    $sql = "DELETE FROM profiles WHERE id ='{$id}'";

    
    try{
        mysqli_query($conn, $sql);
        echo "Records were Deleted successfully.";
        header("location: index.php");
        exit();
    }
    catch(mysqli_sql_exception){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
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
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this profile?</p>
                            <p>
                                <input type="submit" value="Yes" name="submit" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>