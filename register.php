<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "airline");
if (!$conn) {  
    echo "<script type='text/javascript'>alert('Database connection failed');</script>";
    die('Could not connect: ' . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $sql = "INSERT INTO passenger (Fname, Lname, age, mno, email, password) VALUES ('$fname', '$lname', '$age', '$mob', '$email', '$pw')";
    if (mysqli_query($conn, $sql)) {
        $message = "You have been successfully registered";
    } else {
        $message = "Could not insert record: " . mysqli_error($conn);
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register on Airline World</title>
    <style type="text/css">
        html {
            background: url(airline4.jpg) no-repeat center center;
            background-size: cover;
        }
        #register_form {
            width: 40%;
            margin: auto;
            border-radius: 25px;
            border: 2px solid blue;
            margin-top: 30px;
            padding-bottom: 20px;
            background-color: rgba(0,0,0,0.2);
            box-shadow: inset -2px -2px rgba(0,0,0,0.5);
        }
        .button {
            border-radius: 5px;
            background-color: rgba(0,0,0,0);
            padding: 7px 7px 7px 7px;
            box-shadow: inset -1px -1px rgba(0,0,0,0.5);
            font-family: "Comic Sans MS", cursive, sans-serif;
            font-size: 15px;
        }
    </style>
    <script src="validation.js"></script>
</head>
<body>
<?php include("nav.php") ?>
<div id="register_form" align="center" height="200" width="200">
    <form name="register" method="post" action="register.php" onsubmit="return validate()">
        <table border="0">
            <caption><font size="6"><br/>Enter your details:</font></caption>
            <tr><td><font size="5">First name:</font></td><td><input name="fname" type="text" placeholder="Enter your first name" size="30" maxlength="30" id="fname"></td></tr>
            <tr><td><font size="5">Last name:</font></td><td><input type="text" name="lname" size="30" maxlength="30" placeholder="Enter your last name" id="lname"></td></tr>
            <tr><td><font size="5">Age:</font></td><td><input type="text" name="age" size="30" maxlength="3" placeholder="Enter age" id="age"></td></tr>
            <tr><td><font size="5">Mobile Number:</font></td><td><input type="text" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></td></tr>
            <tr><td><font size="5">E-Mail ID:</font></td><td><input name="email" type="text" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30"></td></tr>
            <tr><td><font size="5">Password:</font></td><td><input name="pw" type="password" id="pw" size="30" maxlength="30" placeholder="Enter your password"></td></tr>
        </table><br/><br/>
        <input class="button" type="submit" value="Submit" name="submit"/>
        <input class="button" type="reset" value="Reset"/>
    </form>
</div>
</body>
</html>
