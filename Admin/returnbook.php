<?php
include(".././Student/header.php");
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
require 'verify-login.php';

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
    $conn = openConnection();
    $sql = "SELECT * FROM books_issue_log WHERE book_isbn LIKE '%$keyword%' OR member_id LIKE '%$keyword%'";
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

if (isset($_GET['book_isbn'])) {
    $conn = openConnection();
    $book_isbn = $_GET['book_isbn'];

    $updateStmt = $conn->prepare("UPDATE `books` SET `copies`=`copies`+1 WHERE isbn=?");

    if (!$updateStmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $updateStmt->bind_param("s", $book_isbn);

    if (!$updateStmt->execute()) {
        echo "Error executing query: " . $updateStmt->error;
        exit();
    }

    $updateStmt->close(); // Close the prepared statement after execution



    $stmt = $conn->prepare("DELETE FROM `books_issue_log` WHERE book_isbn=?");

    if (!$stmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $book_isbn);

    if ($stmt->execute()) {
        header("Location: returnbook.php");
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
    <link rel="stylesheet" href="../Student/styles.css">
    
</head>

<body>

    <section>
       
            <nav>
                <?php
                // Displaying the welcome message and user details

                // echo "<div>";
                // echo "<h3>Welcome</h3>";
                // echo "<h5>Name: <b>" . $_SESSION['username'] . "</b></h5>";

                ?>
                <div>
                    <a href="Admin.php"><button>Dashboard</button></a>
                </div>
            </nav>
       


    </section>

    <div class="container">
        <h2>Search Books</h2>
        <form action="#" method="post">
            <input type="text" name="keyword" placeholder="Enter book_isbn/member  ">
            <input type="submit" name="search_books" value="Search">

        </form>

    </div>

    <div>
        <div>
            <h2>Book Listing</h2>
            <table border="1px" class="book-table">
                <tr>
                    <th>issue_id</th>
                    <th>member</th>
                    <th>book_isbn</th>
                    <th>due_date</th>
                    <th>return</th>
                </tr>
                <?php
                if (isset($_POST['search_books'])) {
                    $keyword = $_POST['keyword'];
                    $searchedBooks = searchBooks($keyword);
                    if (count($searchedBooks) > 0) {
                        foreach ($searchedBooks as $book) {
                            $book_isbn = $book['book_isbn'];
                            echo "<tr class='tr'>";
                            echo "<td class='tr'>" . $book['issue_id'] . "</td>";
                            echo "<td class='tr'>" . $book['member_id'] . "</td>";
                            echo "<td class='tr'>" . $book['book_isbn'] . "</td>";
                            echo "<td class='tr'>" . $book['due_date'] . "</td>";
                            echo "<td><a href='returnbook.php?book_isbn=$book_isbn'>return </a></td>";
                            echo "</tr class='tr'>";
                        }
                    } else {
                        echo "<tr class='tr'><td colspan='6' class='tr'>No results found for the given keyword.</td></tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <?php include("../footer.php"); ?>
</body>

</html>