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
    $sql = "SELECT * FROM books_issue_log WHERE member_id='$member'";
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
<nav>
        <ul>
            <li><a href="mypendingbookrequest.php"><button>My pending book request</button></a></li>
            <!-- <li><a href="myissuebook.php"><button>Issue books</button></a></li> -->
            <li><a href="student.php"><button>Dashboard</button></a></li>
        </ul>
    </nav>
    <section>
        <div class="container">
            <h2>Search Books</h2>
            
            <form action="#" method="post">
                <input type="text" name="keyword" placeholder="Enter books_isbn  ">
                <input type="submit" name="search_books" value="Search">

            </form>

        </div>
        <div>
            <h2>Book Listing</h2>
            <table border="1px" class="book-table">
                <tr>
                    <th>member_id</th>
                    <th>issue_id</th>
                    <th>book_isbn</th>
                    <th>due_date</th>
                </tr>
                <?php
                if (isset($_POST['search_books'])) {
                    $keyword = $_POST['keyword'];
                    $searchedBooks = searchBooks($keyword);
                    if (count($searchedBooks) > 0) {
                        foreach ($searchedBooks as $book) {
                            echo "<tr class='tr'>";
                            echo "<td class='tr'>" . $book['member_id'] . "</td>";
                            echo "<td class='tr'>" . $book['issue_id'] . "</td>";
                            echo "<td class='tr'>" . $book['book_isbn'] . "</td>";
                            echo "<td class='tr'>" . $book['due_date'] . "</td>";
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