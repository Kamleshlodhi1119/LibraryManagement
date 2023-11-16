<?php
include(".././Student/header.php");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginA.php");
    exit();
}

require_once './verify-login.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";
function openConnection()
{
    global $host, $username, $password, $database, $conn;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}




//update
if (isset($_POST['isbn'])) {

    echo "<script> alert('Are you sure to update the data');</script>";
    $conn = openConnection();
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $copies = $_POST['copies'];

    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, category=?, price=?, copies=? WHERE isbn=?");
    $stmt->bind_param("sssdii", $title, $author, $category, $price, $copies, $isbn);

    if ($stmt->execute()) {
        header("Location: Admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET["isbn"])) {
    $conn = openConnection();
    $isbn = $_GET['isbn'];
    $sql = "SELECT * FROM books WHERE isbn='$isbn'";
    $data = mysqli_query($conn, $sql);
    $userinfo = mysqli_fetch_assoc($data);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Student/styles.css">

    <style>
        body {

            background-color: lightblue;
            opacity: 100%;
            margin: 12px;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 12px;
            padding: 2rem;
        }
    </style>
</head>

<body>

    <section>
        <div class="nav-container">
            <nav class="nav">
                <?php
                // Displaying the welcome message and user details

                echo "<div>";
                echo "<h3>Welcome</h3>";
                echo "<h5>Name: <b>" . $_SESSION['username'] . "</b></h5>";

                ?>
                <div>
                    <button><a href="Admin.php">Dashboard</a></button>
                </div>
            </nav>
        </div>


    </section>

    <p>
    <form action="update-book.php" method="POST" onsubmit="alert('confirm to up date');">
        <h1>Update Data</h1>
        ISBN: <input type="text" name="isbn" value="<?php echo $userinfo['isbn']; ?>" required><br />
        Title: <input type="text" name="title" value="<?php echo $userinfo['title']; ?>" required><br />
        Author: <input type="text" name="author" value="<?php echo $userinfo['author']; ?>" required><br />
        Category: <input type="text" name="category" value="<?php echo $userinfo['category']; ?>" required><br />
        Price: <input type="text" name="price" value="<?php echo $userinfo['price']; ?>" required><br />
        Copies: <input type="text" name="copies" value="<?php echo $userinfo['copies']; ?>" required><br />
        <input type="submit" name="submit" value="Update Data">
    </form>
    </p>
</body>

</html>