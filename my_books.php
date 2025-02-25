<?php
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
$sql = "SELECT * from books order by id desc";

// Prepare and execute the query
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
include('header.php');
?>


<!-- Main Content Section -->
<div class="container mt-4">
    <h1>My Books</h1>
    <button class="btn btn-primary" id="addBookBtn">Add a New Book</button>

<!-- Book Form (Initially hidden) -->
<div id="addBookForm" style="display:none; margin-top: 20px;">
    <form  id="bookForm" >
      <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Book Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn">
        </div>
      
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        
       <button type="submit" class="btn btn-success" name="add_book">Add Book</button>
       <p class="form-messages mb-0 mt-3"></p>
      </form>
</div>



</div>
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

<!-- Footer Section -->
<?php include('footer.php'); ?>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {

      $('#addBookBtn').click(function() {
            $('#addBookForm').toggle();
            $('.form-messages').empty();
        });
        $("#bookForm").submit(function(event){
          event.preventDefault();
          var formData=$(this).serialize();
          $.ajax({
            type:'POST',
            url:'add_book.php',
            data:formData,
           dataType:'json',
            success:function(response){
                if(response.status === 'success'){
                        // Display success message
                     

                        // Hide the form and reset the fields
                        $('#addBookForm').hide();
                        $('#bookForm')[0].reset(); 
                        $('.form-messages').removeClass('error').addClass('success').text(response.message); 
                        // Reset the form fields
 // Hide success message after 2 seconds
            setTimeout(function() {
                            $('.form-messages').fadeOut('slow', function() {
                                $(this).empty();  // Clear the message after fading out
                            });
                        }, 2000);
                    } else {
                        // Handle error case
                        $('.form-messages').removeClass('success').addClass('error').text(response.message);
                    }
                }
                
          });
        });

        $('#booksTable').DataTable({
         
            "paging": true,  // Enable pagination
            "searching": true,  // Enable search
            "ordering": true,  // Enable sorting
            "info": true,  // Show info about table (e.g., "Showing 1 to 10 of 50 entries")
            "lengthChange": true  // Allow user to change the number of items per page
        });
    });
</script>

</body>
</html>
