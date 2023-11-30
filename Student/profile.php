<?php
include("header.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginS.php");
    exit();
}

require 'verify-loginS.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";

function openConnection()
{
    global $host, $username, $password, $database;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->

    <style>
        /* NavbarTop */
        .title {
            font-family: 'Dancing Script', cursive;
            padding-top: 15px;
            position: absolute;
            left: 45%;
        }

        .navbar-top ul {
            float: right;
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 18px 50px 0 40px;
        }

        .navbar-top ul li {
            float: left;
        }

        .navbar-top ul li a {
            color: #333;
            padding: 14px 16px;
            text-align: center;
            text-decoration: none;
        }

        .icon-count {
            background-color: #ff0000;
            color: #fff;
            float: right;
            font-size: 11px;
            left: -25px;
            padding: 2px;
            position: relative;
        }

        /* End */

        /* Main */
        .main {
            margin-top: 2%;
            margin-left: 29%;
            font-size: 28px;
            padding: 0 10px;
            width: 58%;
        }

        .main h2 {
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .main .card {
            background-color: #fff;
            border-radius: 18px;
            box-shadow: 1px 1px 8px 0 grey;
            height: auto;
            margin-bottom: 20px;
            padding: 20px 0 20px 50px;
        }

        .main .card table {
            border: none;
            font-size: 16px;
            height: 270px;
            width: 80%;
        }

        .edit {
            position: absolute;
            color: #e7e7e8;
            right: 14%;
        }
    </style>

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="mypendingbookrequest.php"><button>My pending book request</button></a></li>
            <li><a href="myissuebook.php"><button>Issue books</button></a></li>
            <li><a href="student.php"><button>Dashboard</button></a></li>
        </ul>
    </nav>
    <!-- Navbar top -->
    <div class="navbar-top">
        <!-- Navbar -->
        <!-- End -->

        <!-- Main -->
        <div class="main">
            <h2>IDENTITY</h2>
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-pen fa-xs edit"></i>
                    <?php
                    $userDetails = getUserDetails($_SESSION['Username']);
                    if ($userDetails) {
                        echo "<table>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>Name</td>";
                        echo "<td>:</td>";
                        echo "<td>" . $userDetails['name'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Email</td>";
                        echo "<td>:</td>";
                        echo "<td>" . $userDetails['email'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Username</td>";
                        echo "<td>:</td>";
                        echo "<td>" . $userDetails['address'] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Balance</td>";
                        echo "<td>:</td>";
                        echo "<td>" . $userDetails['balance'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";
                        echo "<button><a href='../logout.php'>Logout</a></button>";
                    }
                    ?>
                </div>
            </div>
        </div>

       
    </div>
    <!-- End -->
</body>
</html>
