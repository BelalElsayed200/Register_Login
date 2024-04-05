<?php
    include 'inc/users.php';

    if (isset($_POST['fullName'], $_POST['emailAddress'])){
        
        $isDataRepeat = isDataRepeat($_POST['fullName'], $_POST['emailAddress']);
        $fullNameValidation = fullNameValidation($_POST['fullName']);

        if ($fullNameValidation && $isDataRepeat)
        {
            $formData = [
                'fullName' => $_POST['fullName'],
                'emailAddress' => $_POST['emailAddress'],
            ];
            $registerAddUser = registerAddUser($formData);
        }
    }
?>

<?php include 'html/header.php';?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Add User Form</h2>

            <form method="post" action='add_user.php'>
                <?php if (isset($isDataRepeat) && !$isDataRepeat):?>
                    <div class='alert alert-danger' role='alert'>
                        this data exist previously (fullName or email ).
                    </div>
                <?php endif; ?>

                <?php if (isset($fullNameValidation) && (!$fullNameValidation)):?>
                    <div class='alert alert-danger' role='alert'>
                        fullName must be its length between 4 and 30 and
                        must not contain {! @ # $ % ^ & * ( ) - _ = + \ | [ ] { } ; : / ? . >}.
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="fullName">Full Name</label>'
                    <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name='fullName' required>                    
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" id="emailAddress" placeholder="Enter email" required name='emailAddress'>
                </div>
                <button type="submit" class="btn btn-primary" style = "margin-right: 60%;">Add</button>
                <a href="display_users.php" class="btn btn-primary">Display Users</a>
            </form>
        </div>
    </div>
</div>
<div>
    <a href="home_page.php" class="btn btn-primary" style = "margin-left: 650px;">Home</a>
</div>
<br>
<div>
    <p class= "para" style = "color: red; margin: 0 39%;"><?php if (isset($registerAddUser) && $registerAddUser){echo "User is Added Succefully";}?></p>
</div>

<?php include 'html/footer.php';?>

