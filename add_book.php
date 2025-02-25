<?php
include('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $description = $_POST['description'];
    $user_id=$_POST['user_id'];
//echo $title;
//echo $author;
//echo $isbn;
    // Insert the book into the books table
    $sql = "INSERT INTO books (title, author, isbn, description)
            VALUES (?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$title, $author, $isbn, $description]);

    // Get the last inserted book ID
    $book_id = $dbh->insert_id;

    // Insert into the user_books table to associate the user with the book
    $sql = "INSERT INTO user_books (user_id, book_id) VALUES (?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$user_id, $book_id]);

    // Send a success response back to AJAX
    echo json_encode(['status' => 'success', 'message' => 'Book added successfully']);
    exit();
}
?>