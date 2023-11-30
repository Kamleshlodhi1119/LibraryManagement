<?php
include(".././Student/header.php");

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

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $balance = mysqli_real_escape_string($conn, $_POST['balance']);

    // Perform insert query for Member
    $sqlInsertMember = "INSERT INTO member (Username, password, name, email, balance) VALUES ('$username', '$password', '$name', '$email', '$balance')";

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
?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="Stylesheet" href="../Student/styles.css">
   
</head>

<body>
    <div>

        <nav>
            <ul>
                <li> <a href="Admin.php"><button>Dashboard</button></a> </li>
                <li><button onclick="toggleAddBookForm('addBookForm')"> New Book </button></li>
                <li><button onclick="toggleAddBookForm('register')"> Register member </button></li>
                <li> <button onclick="toggleAddBookForm('delete')"> delete Member </button></li>
            </ul>
        </nav>





        <section id="Addbook">
            <div class="container">
                <div class="add-book-box" id="addBookForm" style="display:none;">
                    <h2>Add New Book</h2>
                    <form action="#" method="post">
                        <label for="isbn" style="display: block; margin-bottom: 5px;">ISBN:</label>
                        <input type="text" name="isbn" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="title" style="display: block; margin-bottom: 5px;">Title:</label>
                        <input type="text" name="title" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="author" style="display: block; margin-bottom: 5px;">Author:</label>
                        <input type="text" name="author" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="category" style="display: block; margin-bottom: 5px;">Category:</label>
                        <input type="text" name="category" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="price" style="display: block; margin-bottom: 5px;">Price:</label>
                        <input type="number" name="price" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="copies" style="display: block; margin-bottom: 5px;">Copies:</label>
                        <input type="number" name="copies" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <input type="submit" name="add_book" value="Add Book" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">

                    </form>
                </div>


                <div class="add-book-box" id="register" style="display:none;">
                    <h2>Register</h2>
                    <form action="#" method="POST">
                        <label for="email" style="display: block; margin-bottom: 5px;">Username:</label>
                        <input type="text" name="email" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
                        <input type="password" name="password" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
                        <input type="text" name="name" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="emailid" style="display: block; margin-bottom: 5px;">Email ID:</label>
                        <input type="email" name="emailid" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="balance" style="display: block; margin-bottom: 5px;">Balance:</label>
                        <input type="number" name="balance" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <input type="submit" name="submit" value="Register" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    </form>
                </div>

                <div class="add-book-box" id="delete" style="display:none;">
                    <h2>Delete</h2>
                    <form action="#" method="POST">

                        <label for="email" style="display: block; margin-bottom: 5px;">Username:</label>
                        <input type="text" name="email" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>

                        <input type="submit" name="submit" value="Delete" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    </form>
                </div>

            </div>
        </section>

        <script>
            function toggleAddBookForm(targetid) {
                const addBookForm = document.getElementById(targetid);
                addBookForm.style.display = addBookForm.style.display === 'none' ? 'block' : 'none';
            }
        </script>
        <?php


        ?>

</body>

</html>