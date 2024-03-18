<?php
include(".././Student/header.php");

$host = "localhost";
$username = "root";
$password = "kam@1119";
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

// Update Password Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    $conn = openConnection();
    
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];

    // Perform update query for Member
    $sqlUpdatePassword = "UPDATE member SET password = '$newPassword' WHERE Username = '$username'";

    if ($conn->query($sqlUpdatePassword) === TRUE) {
        echo '<script>alert("Password updated successfully");</script>';
    } else {
        echo '<script>alert("Error: ' . $sqlUpdatePassword . '\n' . $conn->error . '");</script>';
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
    <link rel="stylesheet" href="../Student/styles.css">
</head>

<body>
    <div>

        <nav>
            <ul>
                <li> <a href="Admin.php"><button>Dashboard</button></a> </li>
                <li> <button onclick="toggleForm('updatePasswordForm')">updatePasswordForm</button></li>
            </ul>
        </nav>

        <section id="Addbook">
            <div class="container">

                <div class="add-book-box" id="updatePasswordForm" style="display:none;"> <!-- Use the same class and ID as the add book form -->
                    <h2>Update Password</h2>
                    <form action="#" method="POST">
                        <label for="username" style="display: block; margin-bottom: 5px;">Username:</label> <!-- Keep consistent style -->
                        <input type="text" name="username" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="new_password" style="display: block; margin-bottom: 5px;">New Password:</label> <!-- Keep consistent style -->
                        <input type="password" name="new_password" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <label for="confirm_new_password" style="display: block; margin-bottom: 5px;">Confirm New Password:</label> <!-- Keep consistent style -->
                        <input type="password" name="confirm_new_password" required style="width: 100%; padding: 5px; margin-bottom: 10px;"><br>
                        <input type="submit" name="update_password" value="update_password" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"> <!-- Keep consistent style -->
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
    <pre>





</pre>

    <?php
    include("../footer.php");
    ?>

</body>

</html>