<?php
include(".././Student/header.php");
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginA.php");
    exit();
}

// Include file for login verification
require_once './verify-login.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";

// Function to open database connection
function openConnection()
{
    global $host, $username, $password, $database;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Update book data
if (isset($_POST['submit'])) {
    $conn = openConnection();
    $isbn = $_POST['isbn'];

    // Check if valid ISBN was received
    if (!$isbn) {
        die("Invalid access. Please visit the book list page for update options.");
    }

    // Check if book with received ISBN exists
    $stmt = $conn->prepare("SELECT ISBN FROM books WHERE ISBN=?");
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if (!$result->num_rows) {
        die("Invalid book. Please visit the book list page for update options.");
    }

    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $copies = $_POST['copies'];

    // Define required columns and updated columns based on posted data
    $requiredColumns = array('title', 'author', 'category', 'price', 'copies');
    $updatedColumns = array();
    foreach ($requiredColumns as $column) {
        if (isset($_POST[$column])) {
            $updatedColumns[] = $column;
        }
    }

    // Build UPDATE statement with modified columns
    $updateStatement = "UPDATE books SET ";
    $boundParams = array();
    for ($i = 0; $i < count($updatedColumns); $i++) {
        $updateStatement .= $updatedColumns[$i] . "=?";
        if ($i < count($updatedColumns) - 1) {
            $updateStatement .= ",";
        }
        $boundParams[] = $_POST[$updatedColumns[$i]];
    }

    // Append WHERE clause with original ISBN
    $updateStatement .= " WHERE isbn=?";
    $boundParams[] = $isbn;

    // Prepare and execute statement
    $stmt = $conn->prepare($updateStatement);
    $stmt->bind_param(str_repeat("s", count($boundParams)), ...$boundParams);
    if ($stmt->execute()) {
        header("Location: Admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch book data for pre-filling the form
if (isset($_GET["isbn"])) {
    $conn = openConnection();
    $isbn = $_GET['isbn'];

    // Check if valid ISBN was received
    if (!$isbn) {
        die("Invalid access. Please visit the book list page for update options.");
    }

    // Check if book with received ISBN exists
    $stmt = $conn->prepare("SELECT ISBN FROM books WHERE ISBN=?");
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if (!$result->num_rows) {
        die("Invalid book. Please visit the book list page for update options.");
    }

    // Fetch book data for pre-filling form
    $stmt = $conn->prepare("SELECT * FROM books WHERE isbn=?");
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    $userinfo = $result->fetch_assoc();
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="../Student/styles.css">
    <style>
        form {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 14px red;
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }



        input {
            width: calc(100% - 20px);
            padding: 2px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }
    </style>
    <title>Update Data</title>
</head>

<body>
    <nav>

        <div>
            <a href="Admin.php"><button>Dashboard</button></a>
        </div>
    </nav>
    <div class="container">
        <form action="update-book.php" method="POST" onsubmit="return confirm('Are you sure to update the data?')">
            <h3>Update Data</h3>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" value="<?php echo $userinfo['isbn']; ?>" required readonly>
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $userinfo['title']; ?>" required>
            <label for="author">Author:</label>
            <input type="text" name="author" value="<?php echo $userinfo['author']; ?>" required>
            <label for="category">Category:</label>
            <input type="text" name="category" value="<?php echo $userinfo['category']; ?>" required>
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $userinfo['price']; ?>" required>
            <label for="copies">Copies:</label>
            <input type="text" name="copies" value="<?php echo $userinfo['copies']; ?>" required>
            <input type="submit" name="submit" value="Update Data">
        </form>
    </div>
    <pre>

    </pre>
    <?php include("../footer.php"); ?>
</body>

</html>