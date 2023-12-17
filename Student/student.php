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

function getAllBooks()
{
    $conn = openConnection();
    $sql = "SELECT * FROM `books` WHERE `copies` > 2";
    $result = $conn->query($sql);
    $books = [];
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
    $sql = "SELECT * FROM `books` WHERE  `copies` > 0 AND (`title` LIKE '%$keyword%' OR `author` LIKE '%$keyword%')";

    $result = $conn->query($sql);
    $books = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
    }
    $conn->close();
    return $books;
}
 // Books request
function saveBookRequest($books_isbn, $Username)
{
    $conn = openConnection();

    // Check if a request with the same ISBN and username already exists in pending_books_requests
    $checkPendingSql = "SELECT * FROM pending_books_requests WHERE isbn = ? AND Username = ?";
    $checkPendingStmt = $conn->prepare($checkPendingSql);

    if ($checkPendingStmt) {
        $checkPendingStmt->bind_param("ss", $books_isbn, $Username);
        $checkPendingStmt->execute();
        $checkPendingStmt->store_result();

        if ($checkPendingStmt->num_rows > 0) {
            echo "Request is already in progress for ISBN $books_isbn.";
            $checkPendingStmt->close();
            $conn->close();
            return;
        }

        $checkPendingStmt->close();
    } else {
        echo "Error in preparing SQL statement for pending_books_requests check: " . $conn->error;
        $conn->close();
        return;
    }

    // Check if the book is already issued in books_issue_log
    $checkIssueSql = "SELECT * FROM books_issue_log WHERE isbn = ? AND Username = ?";
    $checkIssueStmt = $conn->prepare($checkIssueSql);

    if ($checkIssueStmt) {
        $checkIssueStmt->bind_param("ss", $books_isbn, $Username);
        $checkIssueStmt->execute();
        $checkIssueStmt->store_result();

        if ($checkIssueStmt->num_rows > 0) {
            echo "The book with ISBN $books_isbn is already issued.";
            $checkIssueStmt->close();
            $conn->close();
            return;
        }

        $checkIssueStmt->close();
    } else {
        echo "Error in preparing SQL statement for books_issue_log check: " . $conn->error;
        $conn->close();
        return;
    }

    // If no existing request or issue, proceed to insert the new request
    $insertSql = "INSERT INTO pending_books_requests (isbn, Username) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertSql);

    if ($insertStmt) {
        $insertStmt->bind_param("ss", $books_isbn, $Username);
        $insertStmt->execute();
        $insertStmt->close();
        echo "Book request submitted successfully!";
    } else {
        echo "Error in preparing SQL statement for insert: " . $conn->error;
    }

    $conn->close();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Interface</title>
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>

    <div>
        <nav>
            <ul>
                <li><a href="mypendingbookrequest.php"> <button>My pending book request</button></a></li>
                <li><a href="myissuebook.php"><button>Issue books</button></a></li>
                <li><a href="profile.php"><button>profile</button></a></li>
                <li><a href="../logout.php"><button>Logout</button></a></li>
            </ul>

        </nav>
    </div>
    <div class="container">
        <h2 style="display: flex; justify-content: center;">Search Books</h2>
        <form action="#" method="post">
            <input type="text" name="search_keyword" placeholder="Enter Title or Author">
            <input type="submit" name="search_books" value="Search">
        </form>
    </div>
    </section>

    <section>
    <h2 style="display: flex; justify-content: center; text-shadow:2px 2px rgb(124, 189, 164); background-color:  #adb5bd;"> Books</h2>
        <table border="1px" class="book-table">
            <tr>
                <th>S.No</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Price</th>
                <th>Copies</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($_POST['search_books'])) {
                $keyword = $_POST['search_keyword'];
                $searchedBooks = searchBooks($keyword);
                $i = 1;
                if (count($searchedBooks) > 0) {
                    foreach ($searchedBooks as $book) {
                        echo "<tr>";
                        echo "<td class='tr'>" . $i . "</td>";
                        echo "<td>" . $book['isbn'] . "</td>";
                        echo "<td>" . $book['title'] . "</td>";
                        echo "<td>" . $book['author'] . "</td>";
                        echo "<td>" . $book['category'] . "</td>";
                        echo "<td>" . $book['price'] . "</td>";
                        echo "<td>" . $book['copies'] . "</td>";
                        echo "<td><a href='student.php?request_book=" . $book['isbn'] . "'>Request</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='7'>No results found for the given keyword.</td></tr>";
                }
            }
            ?>
        </table>
    </section>

    <?php
    if (isset($_GET['request_book'])) {
        $books_isbn = $_GET['request_book'];
        $Username = $_SESSION['Username'];

     saveBookRequest($books_isbn, $Username);

        
    }
    ?>
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