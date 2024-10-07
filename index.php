<?php
$insert = false;

if (isset($_POST['name'])) {
    $server = "localhost";   //server name
    $username = "root";       //username
    $password = "";         //password
    $dbname = "travel"; // Specify your database name here

    // Create connection
    $con = mysqli_connect($server, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //data come from POST...
    $name = $_POST['name'];
    $class = $_POST['class'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $details = $_POST['details'];

    $sql = "INSERT INTO `travel1` (`name`, `class`, `age`, `gender`, `email`, `details`) VALUES ('$name', '$class', '$age', '$gender', '$email', '$details')";

   
    // echo $sql;
    // check query is true or not

    if ($con->query($sql) === true) {
        // SQL query was successful
        $insert = true;
    } else {
        // SQL query failed, display error
        echo "ERROR: " . $sql . "<br>" . $con->error;
    }
    
    $con->close(); // close the connection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <h1>Welcome to M.G.C Trip Form</h1>
        <p>Enter your details and submit this form to confirm your seat in the trip</p>
        <?php
        if($insert== true)
        {
            echo "<p class='thanku'>Thaks for submiting</p>";
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="class" id="class" placeholder="Enter your class">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your mail id">
            <textarea name="details" id="details" rows="8" cols="10" placeholder="enter about yourself"></textarea>
            <button class="button">submit</button>
        </form>
    </div>
    <script src="./index.js"></script>
</body>
</html>