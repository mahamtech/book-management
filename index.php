<?php 

include('header.php'); ?>

<div class="container">
    <h2 class="my-5">Login to Book Network</h2>
    <form action="login_process.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label"><strong>Username or Email</strong></label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Name or Email"required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><strong>Password</strong></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</body>
</html>

<?php include('footer.php'); ?>