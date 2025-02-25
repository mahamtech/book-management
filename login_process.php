<?php
session_start();
include 'connect.php';  // Database connection

// Get user input from form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check if the user exists
$sql = "SELECT id, name, email, password FROM book_users WHERE name = ? OR email = ?";
$stmt = $dbh->prepare($sql);
$stmt->bind_param("ss", $username, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Decrypt the stored password (assuming AES_ENCRYPT was used for encryption)
    $decrypted_password = openssl_decrypt($user['password'], 'AES-128-ECB', 'passw', OPENSSL_RAW_DATA);
    
    // Verify the decrypted password against the input password
    if ($decrypted_password === $password) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];  


        // Redirect to the user's book list
        header("Location: my_books.php");
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "User not found.";
}

$stmt->close();
$dbh->close();
?>
