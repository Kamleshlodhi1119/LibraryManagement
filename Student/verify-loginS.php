<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db";

function verifyLogin($username, $password)
{
    $conn = openConnection();
    $sql = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        return true;
    }

    return false;
}

function getUserDetails($username)
{
    $conn = openConnection();
    $sql = "SELECT balance, email, name, address FROM member WHERE username = '$username'";
    $result = $conn->query($sql);
    $userDetails = array();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userDetails['email'] = $row['email'];
        $userDetails['name'] = $row['name'];
        $userDetails['balance'] = $row['balance'];
        $userDetails['address'] = $row['address']; // Include the 'address' field
    }
    
    $conn->close();
    return $userDetails;
}
?>
