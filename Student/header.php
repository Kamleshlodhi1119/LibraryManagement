<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Interface</title>
     
    <style>
         

        .profile-block {
            display: flex;
            align-items: center;
        }

        .profile-picture {
            width: 40px; /* Adjust the size of the profile picture */
            height: 40px; /* Adjust the size of the profile picture */
            border-radius: 50%; /* Make the picture round */
            margin-right: 10px;
            background-color: goldenrod; /* Profile picture background color */
        }

        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-info h3 {
            margin: 0;
        }

        .header-buttons {
            display: flex;
        }

        .header-buttons a {
            text-decoration: none;
            color: #fff;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="profile-block">
            <div class="profile-picture"></div>
            <div class="profile-info">
                <h3>Welcome, [Username]</h3> <!-- Replace [Username] with the actual username -->
                <p>Email: [Email]</p> <!-- Replace [Email] with the actual email address -->
            </div>
        </div>
        <div class="header-buttons">
            <a href="home.php">Home</a>
            <a href="books.php">Books</a>
            <a href="profile.php">Profile</a>
        </div>
    </header>

    <!-- Rest of your HTML content -->
    <section>
        <!-- Your content here -->
    </section>

    <!-- Footer -->
    <footer>
        <!-- Your footer content here -->
    </footer>
</body>
</html>
