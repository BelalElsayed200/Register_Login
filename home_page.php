<?php
include 'inc/users.php';


if (!(isset($_SESSION['user']))){
  header('Location: http://localhost/Tasks/register&&login/login.php');
}

if (isset($_POST['logout'])){
    session_destroy();
    header('Location: http://localhost/Tasks/register&&login/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Optional: Include Font Awesome for icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <style>
    #crudOperations {
      display: none; /* Initially hide CRUD operations */
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <!-- Other navbar content -->
      <div class="ml-auto">
        <form action="home_page.php" method="post">
          <input type="submit" value='logout' class="btn btn-outline-danger" name='logout'>
        </form>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <button class="btn btn-primary btn-block" onclick="toggleCRUD()">CRUD</button>
        <div id="crudOperations" class="list-group">
          <a href="add_user.php" class="list-group-item list-group-item-action">Create</a>
          <a href="display_users.php" class="list-group-item list-group-item-action">Read</a>
          <a href="" class="list-group-item list-group-item-action">Update<span style = "padding: 20px;">!</span></a>
          <a href="" class="list-group-item list-group-item-action">Delete<span style = "padding: 20px;">!</span></a>
        </div>
      </div>
      <!-- Page Content -->
      <div class="col-md-9">
        <div class="jumbotron text-center">
          <h1 class="display-4">Welcome <?php echo $_SESSION['user']; ?></h1>
          <p class="lead">This is a simple home page to welcome users to our site.</p>
          <hr class="my-4">
          <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    function toggleCRUD() {
      let x = document.getElementById("crudOperations");
      x.style.display === "none" ? x.style.display = "block" : x.style.display = "none";
    }
  </script>
</body>
</html>
