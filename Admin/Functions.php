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


// Add Book Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_book'])) {
    $conn = openConnection();

    // Escape user inputs for security
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $copies = mysqli_real_escape_string($conn, $_POST['copies']);

    // Perform insert query for Book
    $sqlInsertBook = "INSERT INTO books (isbn, title, author, category, price, copies) VALUES ('$isbn', '$title', '$author', '$category', '$price', '$copies')";

    if ($conn->query($sqlInsertBook) === TRUE) {
        echo "Book added successfully";
    } else {
        echo "Error: " . $sqlInsertBook . "<br>" . $conn->error;
    }

    $conn->close();
}


// Register Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $conn = openConnection();
    $username = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['emailid'];
    $balance = $_POST['balance'];
    $address = $_POST['address'];
    // Perform insert query for Member
    $sqlInsertMember = "INSERT INTO member (Username, password, name, email, balance,address) VALUES ('$username', '$password', '$name', '$email', '$balance','$address')";

    if ($conn->query($sqlInsertMember) === TRUE) {
        echo "Member registered successfully";
    } else {
        echo "Error: " . $sqlInsertMember . "<br>" . $conn->error;
    }

    $conn->close();
}

// Delete Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['email'])) {
    $conn = openConnection();

    // Escape user input for security
    $usernameToDelete = mysqli_real_escape_string($conn, $_POST['email']);

    // Perform delete query for Member
    $sqlDeleteMember = "DELETE FROM member WHERE Username = '$usernameToDelete'";

    if ($conn->query($sqlDeleteMember) === TRUE) {
        echo "Member deleted successfully";
    } else {
        echo "Error: " . $sqlDeleteMember . "<br>" . $conn->error;
    }

    $conn->close();
}


function searchBooks($keyword)
{
    $conn = openConnection();
    $sql = "SELECT * FROM  pending_books_requests";
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
    $book_isbn = $_GET['reject'];


    $stmt = $conn->prepare("DELETE FROM `pending_books_requests` WHERE book_isbn=?");

    if (!$stmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $stmt->bind_param("s", $book_isbn);

    if ($stmt->execute()) {
        header("Location: pendingbookrequest.php");
        exit();
    } else {
        echo "Error executing query: " . $stmt->error;
    }
}
if (isset($_GET['approve'])) {
    $conn = openConnection();
    $book_isbn = $_GET['approve'];
    $username = $_GET['Username'];

    $selectMemberIdStmt = $conn->prepare("SELECT id FROM `member` WHERE Username = ?");

    if (!$selectMemberIdStmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $selectMemberIdStmt->bind_param("s", $username);

    if (!$selectMemberIdStmt->execute()) {
        echo "Error executing query: " . $selectMemberIdStmt->error;
        exit();
    }

    $selectMemberIdStmt->bind_result($memberId);

    if ($selectMemberIdStmt->fetch()) {
        $selectMemberIdStmt->close();

        $insertStmt = $conn->prepare("INSERT INTO `books_issue_log` (member_id, book_isbn, due_date, return_date)
                                     VALUES (?, ?, NOW(), NULL)");

        if (!$insertStmt) {
            echo "Error in SQL query: " . $conn->error;
            exit();
        }

        $insertStmt->bind_param("is", $memberId, $book_isbn);

        if (!$insertStmt->execute()) {
            echo "Error executing query: " . $insertStmt->error;
            exit();
        }

        $insertStmt->close();

        $deleteStmt = $conn->prepare("DELETE FROM `pending_books_requests` WHERE book_isbn = ?");

        if (!$deleteStmt) {
            echo "Error in SQL query: " . $conn->error;
            exit();
        }

        $deleteStmt->bind_param("s", $book_isbn);

        if (!$deleteStmt->execute()) {
            echo "Error executing query: " . $deleteStmt->error;
            exit();
        }

        $deleteStmt->close();
        // $conn->close();

        //     header("Location: pendingbookrequest.php");
        //     exit();
        // } else {
        //     echo "Member not found with the provided username.";
        // }

        //update copies

        $updateStmt = $conn->prepare("UPDATE `books` SET `copies`=`copies`-1 WHERE isbn=?");

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


        $conn->close();

        header("Location: pendingbookrequest.php");
        exit();
    } else {
        echo "Member not found with the provided username.";
    }
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