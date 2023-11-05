<?php
include("header.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

require 'verify-loginS.php';

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

function searchBooks($keyword)
{



    $member = $_SESSION['Username'];
    $conn = openConnection();
    $sql = "SELECT * FROM  pending_books_requests WHERE Username= '$member'  "; // WHERE books_isbn LIKE '%$keyword%' OR member LIKE '%$keyword%'
    $result = $conn->query($sql);
    $books = array();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }
    $conn->close();
    return $books;
}

if (isset($_GET['reject'])) {
    $conn = openConnection();
    $books_isbn = $_GET['reject'];
    $member = $_SESSION['Username'];

    $stmt = $conn->prepare("DELETE FROM `pending_books_requests` WHERE books_isbn=? AND  member= '$member' ");

    if (!$stmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $books_isbn);

    if ($stmt->execute()) {
        header("Location: mypendingbookrequest.php");
        exit();
    } else {
        echo "Error executing query: " . $stmt->error;
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {

            background-color:lightblue;
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
                $userDetails = getUserDetails($_SESSION['Username']);
                if ($userDetails) {
                    echo "<div>";
                    echo "<h3>Welcome</h3>";
                    echo "<h5>Name: <b>" . $userDetails['name'] . "</b></h5>";
                    echo "<h5>Email: " . $userDetails['email'] . "</h5>";
                    echo "<h5>Balance: " . $userDetails['balance'] . "</h5>";
                    echo " <button><a href='../logout.php'>Logout</a></button>";
                    echo "</div>";
                }
                ?>
                <div>
                    <button><a href="student.php">Dashboard</a></button>
                </div>
            </nav>
        </div>


    </section>
    <section>
        <div class="container">
            <h2>Search Books</h2>
            <form action="#" method="post">
                <input type="text" name="keyword" placeholder="Enter books_isbn">
                <input type="submit" name="search_books" value="Search">

            </form>

        </div>
        <div>
            <h2>Book Listing</h2>
            <table border="1px" class="book-table">
                <tr>
                    <th>request_id</th>
                    <th>member</th>
                    <th>books_isbn</th>
                    <th>time</th>

                    <th>Request</th>
                </tr>
                <?php
                if (isset($_POST['search_books'])) {
                    $keyword = $_POST['keyword'];
                    $searchedBooks = searchBooks($keyword);
                    if (count($searchedBooks) > 0) {
                        foreach ($searchedBooks as $book) {
                            $books_isbn = $book['book_isbn'];
                            echo "<tr class='tr'>";
                            echo "<td class='tr'>" . $book['request_id'] . "</td>";
                            echo "<td class='tr'>" . $book['Username'] . "</td>";
                            echo "<td class='tr'>" . $book['book_isbn'] . "</td>";
                            echo "<td class='tr'>" . $book['time'] . "</td>";
                            echo "<td><a href='mypendingbookrequest.php?reject=$books_isbn'>Delete Request </a></td>";
                            echo "</tr class='tr'>";
                        }
                    } else {
                        echo "<tr class='tr'><td colspan='6' class='tr'>No results found for the given keyword.</td></tr>";
                    }
                }
                ?>
            </table>
        </div>

    </section>
   
</body>

</html>