<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "library_db"; 
function verifyLogin($username, $password)
{
    $conn = openConnection();
    $sql = "SELECT * FROM librarian WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        return true;
    }

    return false;
}
 
 
?>