<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Ideal Front Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #333;
        }
        .profile h2 {
            font-size: 24px;
            margin: 0;
        }
        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }
        .search-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }
        .search-btn {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Front Page</h1>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">Page 2</a>
        <a href="#">Page 3</a>
    </nav>
    <div class="container">
        <div class="profile">
            <img src="profile.jpg" alt="Profile Picture">
            <h2>Your Name</h2>
        </div>
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Search for a book...">
            <button class="search-btn">Search</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                    <th>Column 4</th>
                    <th>Column 5</th>
                    <th>Column 6</th>
                    <th>Column 7</th>
                    <th>Column 8</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                    <td>Data 3</td>
                    <td>Data 4</td>
                    <td>Data 5</td>
                    <td>Data 6</td>
                    <td>Data 7</td>
                    <td>Data 8</td>
                </tr>
                <!-- Add more rows here -->
            </tbody>
        </table>
    </div>
</body>
</html>
