<?php
$insert = false;
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    
    $con = mysqli_connect($server, $username, $password);

   
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
   
    if($con->query($sql) == true){
       
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    
    $con->close();
}
?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
</head>
<body>
    <div class="main">
        <a class="home-btn" href="home.html" >
            <img src="images/space.jpg" id="logo">
        </a>
        <h3 id="form-head">Enter your details here</h3>
        <?php
        if($insert == true){
        echo "<h3 class='submitMsg'>Thanks for submitting your form.</h3>";
        }
    ?>
        <form action="index.php" method="post" class="form-apply">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button id="btn-submit">Submit</button> 
        </form>
       
    </div>
    <div class="apply-foot">
        <h3>Application</h3>
    </div>
    <script src="index.js"></script>
</body>
</html>

