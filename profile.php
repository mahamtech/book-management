<?php
include('header.php');
session_start();
require 'connect.php';  // Database connection

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: logout.php");
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];
//echo $user_id;
// Query to get the list of books for the logged-in user
$sql = "SELECT a.*,b.book_id,b.user_id from books a 
        inner join user_books b on a.id=b.book_id where user_id='$user_id' order by id desc";

// Prepare and execute the query
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>
    <!-- Book List -->
    <?php if ($result->num_rows > 0): ?>
        <table id="booksTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have not added any books to your list.</p>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#booksTable').DataTable({
         
         "paging": true,  // Enable pagination
         "searching": true,  // Enable search
         "ordering": true,  // Enable sorting
         "info": true,  // Show info about table (e.g., "Showing 1 to 10 of 50 entries")
         "lengthChange": true  // Allow user to change the number of items per page
     });
 });
</script>