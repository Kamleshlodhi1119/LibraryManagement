<?php
// GOOD CODE EVERYTHING IS WORKING
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

function getAllBooks()
{
    $conn = openConnection();
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
    $books = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }
    $conn->close();
    return $books;
}


function searchBooks($keyword)
{
    $conn = openConnection();
    $sql = "SELECT * FROM books WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%'";
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

if (isset($_POST['add_book'])) {
    $conn = openConnection();
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $copies = $_POST['copies'];

    $stmt = $conn->prepare("INSERT INTO books (isbn, title, author, category, price, copies) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdi", $isbn, $title, $author, $category, $price, $copies);

    if ($stmt->execute()) {
        header("Location: Admin.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}



// Update book details in the database
if (isset($_POST['submit'])) {
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

// Delete a book from the database
if (isset($_GET['title'])) {

    $message = "Hello, this is a simple message!";
    echo $message;


    $conn = openConnection();
    $title = $_GET['title'];


    $stmt = $conn->prepare("DELETE FROM `books` WHERE title=?");

    if (!$stmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $title);

    if ($stmt->execute()) {
        header("Location: Admin.php");
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
    <title>Admin Dashboard</title>
    <link link rel="stylesheet" href="../Student/styles.css">
    <style> </style>

</head>

<body>
    <section>
        <nav>
            <ul>
                <li><a href="operations.php"> New Book</a></li>
                <li><a href="operations.php">Register member</a> </li>
                <li><a href="operations.php">delete Member </a></li>
                <li><a href="returnbook.php">returnbook</a></li>
                <li><a href="pendingbookrequest.php">pending book request</a></li>
                <li><a href="../logout.php"><button>Logout</button></a></li>
            </ul>
            </div>
    </section>

    <section>
        <div class="container">
            <h2>Search Books</h2>
            <form action="#" method="post">
                <input type="text" name="keyword" placeholder="Enter Title or Author">
                <input type="submit" name="search_books" value="Search">
            </form>

        </div>
    </section>
    <section>
        <h2>Book Listing</h2>
        <table border="2px solid" class="book-table">
            <tr>
                <th>S.No</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Price</th>
                <th>Copies</th>
                <th colspan='2'>operation</th>
            </tr>
            <?php
            if (isset($_POST['search_books'])) {
                $keyword = $_POST['keyword'];
                $searchedBooks = searchBooks($keyword);
                $i = 1;
                if (count($searchedBooks) > 0) {
                    foreach ($searchedBooks as $book) {
                        $isbn = $book['isbn'];
                        $title = $book['title'];

                        echo "<tr class='tr'>";
                        echo "<td class='tr'>" . $i . "</td>";
                        echo "<td class='tr'>" . $isbn . "</td>";
                        echo "<td class='tr'>" . $book['title'] . "</td>";
                        echo "<td class='tr'>" . $book['author'] . "</td>";
                        echo "<td class='tr'>" . $book['category'] . "</td>";
                        echo "<td class='tr'>" . $book['price'] . "</td>";
                        echo "<td class='tr'>" . $book['copies'] . "</td>";
                        echo "<td><a href='Admin.php?title=$title'>Delete</a></td>";
                        echo "<td><a href='update-book.php?isbn=$isbn'>update Data</a></td>";
                        echo "</tr class='tr'>";
                        $i++;
                    }
                } else {
                    echo "<tr class='tr'><td colspan='6' class='tr'>No results found for the given keyword.</td></tr>";
                }
            }
            ?>
        </table>
    </section>
    <?php
    // include(".././Student/header.php");
    ?>


</body>

</html>