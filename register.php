<?php
    include 'inc/users.php';

    if (isset($_SESSION['user'])){
        header('Location: http://localhost/Tasks/register&&login/home_page.php');
    }

    if (isset($_POST['fullName'], $_POST['emailAddress'], $_POST['password'], $_POST['confirmPassword'])){
        
        $isDataRepeat = isDataRepeat($_POST['fullName'], $_POST['emailAddress']);
        $fullNameValidation = fullNameValidation($_POST['fullName']);
        $passValidation = passValidation($_POST['password']);
        if ($_POST['password'] == $_POST['confirmPassword'] && $fullNameValidation && $passValidation && $isDataRepeat)
        {
            echo "ss";
            $formData = [
                'fullName' => $_POST['fullName'],
                'emailAddress' => $_POST['emailAddress'],
                'password' => $_POST['password'],
            ];
            register($formData);
        }
    }
?>

<?php include 'html/header.php';?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Registration Form</h2>

            
            <form method="post" action='register.php'>
                <?php if (isset($isDataRepeat) && !$isDataRepeat):?>
                    <div class='alert alert-danger' role='alert'>
                        this data exist previously (fullName or email ).
                    </div>
                <?php endif; ?>

                <?php if (isset($fullNameValidation) && (!$fullNameValidation)):?>
                    <div class='alert alert-danger' role='alert'>
                        fullName must be its length between 4 and 30 and must not contain {! @ # $ % ^ & * ( ) - _ = + \ | [ ] { } ; : / ? . >}
                    </div>
                <?php endif; ?>

                <div class="form-group" >
                    <label for="fullName">Full Name</label>'
                    <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name='fullName' required>                    
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" id="emailAddress" placeholder="Enter email" required name='emailAddress'>
                </div>
                <?php if (isset($passValidation) && !($passValidation)):?>
                    <div class='alert alert-danger' role='alert'>
                        length of password must be from 12 to 50 and contain characters, numbers and special characters.
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" required name='password'>
                </div>
                <?php if (isset($passValidation) && $_POST['password'] != $_POST['confirmPassword'] && ($passValidation)):?>
                    <div class='alert alert-danger' role='alert'>
                        confirmPassword is incorrect
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required name='confirmPassword'>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <p class="mt-4">Already have an account? <a href="http://localhost/Tasks/register&&login/login.php">log in</a></p>
            </form>
        </div>
    </div>
</div>

<?php include 'html/footer.php'; ?>

