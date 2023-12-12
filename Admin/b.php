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

// Check if the form is submitted for deleting a user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $conn = openConnection();

    // Sanitize and validate the user ID
    $userId = $_POST['user_id'];

    // Delete user based on user ID
    $deleteQuery = "DELETE FROM member WHERE id = $userId";
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
                    <input type="hidden" name="Username" value="<?php echo $user['Username']; ?>">
                    <input type="submit" name="delete_user" value="Delete" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
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
?>
