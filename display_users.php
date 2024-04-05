<?php
$dataOfUser = file_get_contents('users.json');
$dataOfUser = json_decode($dataOfUser, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Data Display</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .list-group-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem 1.25rem;
      margin-bottom: 0.5rem;
      border: none;
      background-color: #f8f9fa;
      border-radius: 0.25rem;
    }
    .list-group-item:nth-of-type(odd) {
      background-color: #e9ecef;
    }
    .list-group-item .label {
      font-weight: bold;
    }

  </style>
</head>
<body>
  <div>
      <a href="home_page.php" class="btn btn-primary" style = "margin-left: 650px;">Home</a>
  </div>
  <div class="container mt-5">
    <h1 class="mb-4">User Data</h1>
    <ul class="list-group">
      <?php foreach($dataOfUser as $user): ?>
        <div calss = "parent">
          <li class="list-group-item">
            <span class="label">Full Name:</span>
            <span><?php echo $user['fullName']; ?></span>
          </li>
          <li class="list-group-item sec" style = "border-bottom: 2px solid black; margin-bottom: 12px;">
            <span class="label">Email Address:</span>
            <span class = "emailAddress"><?php echo $user['emailAddress']; ?></span>
          </li>
        </div>
      <?php endforeach; ?>  
    </ul>
  </div>
<?php include 'html/footer.php'; ?>