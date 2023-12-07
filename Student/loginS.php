<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("DB error: " . mysqli_connect_error());
}

session_start();

if (isset($_POST["submit"])) {
    $Username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `member` WHERE `Username`='$Username' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {

        $_SESSION['loggedin'] = true;
        $_SESSION['Username'] = $Username;


        header("location: student.php");
        exit();
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid login , try Again");';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {

            background-image: url('../img/library.gif' );
            background-size: cover;

            margin: 12px;
            padding: 2rem;
            display: flex;
            justify-content: center;
            height: 85vh;

        }

        .box {
            width: 212px;
            padding: 40px;
            position: absolute;
            margin: 65px;
            background: #011217;
            box-shadow: 0px 4px 20px brown;
            text-align: center;
            border-radius: 40px;
        }

        .box input[type="text"],
        .box input[type="password"] {
            width: 150px;
            text-align: center;
            display: block;
            margin: 20px auto;
            padding: 10px;
            outline: none;
            color: white;
            border: 2px solid #1595eb;
            background: none;
            border-radius: 30px;
            transition: 0.6s;
        }

        h1 {
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 500;
        }

        .box input[type="text"]:focus,
        .box input[type="password"]:focus {
            width: 200px;
            border-color: #2ecc71;
        }

        .box input[type="submit"] {
            width: 95px;
            text-align: center;
            display: block;
            margin: 20px auto;
            padding: 10px;
            outline: none;
            color: white;
            border: 2px solid #2ecc71;
            background: none;
            border-radius: 30px;
            transition: 0.4s;
        }

        .box input[type="submit"]:hover {
            background: #2ecc71;
        }
    </style>
</head>

<body>
    <form class="box" action="#" method="post">
        <h1>login Student</h1>
        <hr>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="submit">
        <hr>
    </form>
</body>

</html>
