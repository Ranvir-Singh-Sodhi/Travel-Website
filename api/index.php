<?php
$insert = false;

if(isset($_POST['Name'])){
    // Connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Establish connection
    $con = mysqli_connect($server, $username, $password);

    // Check connection
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Read post variables
    $Name = $_POST['Name'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Desc = $_POST['Desc'];
    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$Name', '$Age', '$Gender', '$Email', '$Phone', '$Desc', current_timestamp());";
    
    // Query execution
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <img class="bg" src="../assets/bg.avif" alt="tourist places">
    <div class="container">
        <h1>Welcome to Our Travel Website</h1>
        <p>Enter the details to confirm your booking here</p>
        <?php
        if($insert == true){
            echo "<p style=\"color: rgb(1, 82, 1);font-size: 1.3rem;\">Thanks for submitting the form</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" placeholder="Enter your name" required>
            <input type="number" name="Age" placeholder="Enter your age">
            <input type="text" name="Gender" placeholder="Enter your gender">
            <input type="email" name="Email" placeholder="Enter your email">
            <input type="phone" name="Phone" placeholder="Enter your phone number">
            <textarea name="Desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>