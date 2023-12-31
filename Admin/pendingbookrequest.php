<?php
include(".././Student/header.php");

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginA.php");
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


    $stmt = $conn->prepare("DELETE FROM `pending_books_requests` WHERE isbn=?");

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

// Approve
if (isset($_GET['approve'])) {
    $conn = openConnection();
    $book_isbn = $_GET['approve'];
    $username = $_GET['Username'];

    $insertStmt = $conn->prepare("INSERT INTO `books_issue_log` (Username, isbn, due_date, return_date)
                                VALUES (?, ?, NOW(), NULL)");

    if (!$insertStmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $insertStmt->bind_param("ss", $username, $book_isbn);

    if (!$insertStmt->execute()) {
        echo "Error executing query: " . $insertStmt->error;
        exit();
    }

    $insertStmt->close();

    $deleteStmt = $conn->prepare("DELETE FROM `pending_books_requests` WHERE isbn = ? AND Username=? ");

    if (!$deleteStmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $deleteStmt->bind_param("ss", $book_isbn,$username);

    if (!$deleteStmt->execute()) {
        echo "Error executing query: " . $deleteStmt->error;
        exit();
    }

    $deleteStmt->close();

    // Update copies in books
    $updateStmt = $conn->prepare("UPDATE `books` SET `copies` = `copies` - 1 WHERE isbn = ?");

    if (!$updateStmt) {
        echo "Error in SQL query: " . $conn->error;
        exit();
    }

    $updateStmt->bind_param("s", $book_isbn);

    if (!$updateStmt->execute()) {
        echo "Error executing query: " . $updateStmt->error;
        exit();
    }

    $updateStmt->close();

    $conn->close();

    header("Location: pendingbookrequest.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Admin.css">
    <link rel="Stylesheet" href="../Student/styles.css">

</head>

<body>
    <nav>

        <div>
            <a href="Admin.php"><button>Dashboard</button></a>
        </div>
    </nav>


    <div class="container">
    <h2 style="display: flex; justify-content: center; text-shadow:2px 2px rgb(124, 189, 164);">Pending Books Requests</h2>
        <form action="#" method="post">
            <input type="text" name="keyword" placeholder="Enter isbn/member  ">
            <input type="submit" name="search_books" value="Search">

        </form>
        <?php
        // Code for searching and displaying search results goes here...
        ?>
    </div>
    <div>
    <h2 style="display: flex; justify-content: center; text-shadow:2px 2px rgb(124, 189, 164); background-color: aqua;"> Books</h2>
        <table border="1px" class="book-table">
            <tr>
                <th>S.No</th>
            
                <th>Username</th>
                <th>book_isbn</th>
                <th>time</th>
                <th>approve</th>
                <th>reject</th>
            </tr>
            <?php
            if (isset($_POST['search_books'])) {
                $keyword = $_POST['keyword'];
                $searchedBooks = searchBooks($keyword);
                $i = 1;
                if (count($searchedBooks) > 0) {
                    foreach ($searchedBooks as $book) {
                        $book_isbn = $book['isbn'];
                        $Username = $book['Username'];
                        echo "<tr class='tr'>";
                        echo "<td class='tr'>" . $i . "</td>";
                        echo "<td class='tr'>" . $book['Username'] . "</td>";
                        echo "<td class='tr'>" . $book['isbn'] . "</td>";
                        echo "<td class='tr'>" . $book['time'] . "</td>";
                        echo "<td><a href='pendingbookrequest.php?approve=$book_isbn&&Username=$Username'>Approve </a></td>";
                        echo "<td><a href='pendingbookrequest.php?reject=$book_isbn'>Reject </a></td>";

                        echo "</tr class='tr'>";
                        $i++;
                    }
                } else {
                    echo "<tr class='tr'><td colspan='6' class='tr'>No results found for the given keyword.</td></tr>";
                }
            }
            ?>
        </table>
    </div>
    <pre>





</pre>
    
<?php
include("../footer.php");
?>

</body>

</html>