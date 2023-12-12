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
    $username = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['emailid'];
    $balance = $_POST['balance'];
    $address = $_POST['address'];
    // Perform insert query for Member
    $sqlInsertMember = "INSERT INTO member (Username, password, name, email, balance, address) VALUES ('$username', '$password', '$name', '$email', '$balance', '$address')";

    if ($conn->query($sqlInsertMember) === TRUE) {
        echo "Member registered successfully";
    } else {
        echo "Error: " . $sqlInsertMember . "<br>" . $conn->error;
    }

    $conn->close();
}

//user details and delete button
// Check if the form is submitted for deleting a user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $conn = openConnection();

    // Sanitize and validate the username
    $username = $conn->real_escape_string($_POST['email']);

    // Delete user based on username
    $deleteQuery = "DELETE FROM member WHERE Username = '$username'";
    if ($conn->query($deleteQuery)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Check if the form is submitted to display user profile
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $conn = openConnection();

    // Sanitize and validate the username
    $username = $conn->real_escape_string($_POST['username']);

    // Check if the user exists
    $query = "SELECT * FROM member WHERE Username = '$username'";
    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            // User exists, display profile
            $user = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>User Profile</title>
            </head>
            <body>
                <h1>User Profile</h1>
                <p>ID: <?php echo $user['id']; ?></p>
                <p>Username: <?php echo $user['Username']; ?></p>
                <p>Name: <?php echo $user['name']; ?></p>
                <p>Email: <?php echo $user['email']; ?></p>
                <p>Balance: <?php echo $user['balance']; ?></p>
                <p>Address: <?php echo $user['address']; ?></p>
                <!-- Display other user information as needed -->

                <!-- Delete button -->
                <form method="post" action="#">
                    <input type="hidden" name="email" value="<?php echo $user['Username']; ?>">
                    <input type="submit" name="delete_user" value="Delete" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                </form>

                <!-- Cancel button -->
                <form method="post" action="#">
                    <input type="submit" name="cancel_delete" value="Cancel" style="background-color: #ccc; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error checking user existence: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Check if the form is submitted for confirming user deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user']) && isset($_POST['email'])) {
    $usernameToDelete = $_POST['email'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirm Deletion</title>
    </head>
    <body>
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete the user with the username: <?php echo $usernameToDelete; ?>?</p>

        <!-- Confirm Deletion button -->
        <form method="post" action="#">
            <input type="hidden" name="email" value="<?php echo $usernameToDelete; ?>">
            <input type="submit" name="confirmed_delete" value="Yes, Delete" style="background-color: #d9534f; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        </form>

        <!-- Cancel button -->
        <form method="post" action="#">
            <input type="submit" name="cancel_delete" value="Cancel" style="background-color: #ccc; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        </form>
    </body>
    </html>
    <?php
}

// Check if the form is submitted for confirming user deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmed_delete']) && isset($_POST['email'])) {
    $conn = openConnection();

    $usernameToDelete = $conn->real_escape_string($_POST['email']);

    // Delete user based on username
    $deleteQuery = "DELETE FROM member WHERE Username = '$usernameToDelete'";
    if ($conn->query($deleteQuery)) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
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
    <div>

        <nav>
            <ul>
                <li> <a href="Admin.php"><button>Dashboard</button></a> </li>
                <li><button onclick="toggleForm('addBookForm')">Add Book</button></li>
                <li><button onclick="toggleForm('register')">Register</button></li>
                <li> <button onclick="toggleForm('delete')">Delete</button></li>
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
                        <label for="address" style="display: block; margin-bottom: 5px;">Address:</label>
                        <input type="number" name="address" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <input type="submit" name="submit" value="Register" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    </form>
                </div>

                <div class="add-book-box" id="delete" style="display:none;">
                    <h2>Delete</h2>
                    <form action="#" method="POST">
                        <label for="email" style="display: block; margin-bottom: 5px;">Username:</label>
                        <input type="text" name="email" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <input type="submit" name="delete_user" value="Delete" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    </form>
                </div>
            </div>
        </section>

        <script>
            function toggleForm(formId) {
                // Hide all forms
                document.querySelectorAll('.add-book-box').forEach(form => {
                    form.style.display = 'none';
                });

                // Show the clicked form
                const clickedForm = document.getElementById(formId);
                if (clickedForm) {
                    clickedForm.style.display = 'block';
                }
            }
        </script>

        <?php
        // Additional code or HTML if needed
        ?>

    </div>
</body>

</html>
