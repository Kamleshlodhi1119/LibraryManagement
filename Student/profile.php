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
    <title>Student InterFace</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="mypendingbookrequest.php"><button>My pending book request</button></a></li>
            <li><a href="myissuebook.php"><button>Issue books</button></a></li>
            <li><a href="student.php"><button>Dashboard</button></a></li>
        </ul>
    </nav>
    <div>
        <?php
        $userDetails = getUserDetails($_SESSION['Username']);
        if ($userDetails) {
            echo "<div>";
            echo "<h3>Student</h3>";
            echo "<h5>Name: <b>" . $userDetails['name'] . "</b></h5>";
            echo "<h5>Email: " . $userDetails['email'] . "</h5>";
            echo "<h5>Balance: " . $userDetails['balance'] . "</h5>";
            echo "<button><a href='../logout.php'>Logout</a></button>";
            echo "</div>";
        }
        ?>

    </div>


    <pre>






    </pre>

    <section>
        <div>
            <footer>
                <div class="footer-content">
                    <div class="contact-info">
                        <h4>Contact Us</h4>
                        <p>Email: kamleshlodhi9302@gmail.com</p>
                        <p>Phone: +1 123-456-7890</p>
                    </div>
                    <div class="social-media">
                        <h4>Follow Us</h4>
                        <!-- Add social media links here -->
                        <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
                        <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
                        <a href="#"><img src="instagram-icon.png" alt="Instagram"></a>
                    </div>
                    <div class="useful-resources">
                        <h4>Useful Resources</h4>
                        <!-- Add useful resource links here -->
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                    </div>
                </div>
            </footer>
        </div>
        <script src="script.js"></script>
    </section>
</body>

</html>