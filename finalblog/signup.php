<?php
require 'config/database.php';

// get back form data if there was a registration error

$firstname = $_SESSION['signup-data'] ['firstname'] ?? null;
$lastname = $_SESSION['signup-data'] ['lastname'] ?? null;
$username = $_SESSION['signup-data'] ['username'] ?? null;
$email = $_SESSION['signup-data'] ['email'] ?? null;
$createpassword = $_SESSION['signup-data'] ['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data'] ['confirmpassword'] ?? null;

//delete signup data session

unset($_SESSION['signup-data']);


?>

<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and MySQL Blog Application with admin Panel</title>
    <!--CUSTOM STYLESHEETS-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/css/style.css">
    <!--iconscout CDN-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--google font(inter)-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
</head>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])): ?>
            <div class="alert__message error">
                <p> 
                    <?= $_SESSION['signup'];
                    unset($_SESSION['signup']);
                    ?>
                    </p>
            </div>
        <?php endif ?>
        <form action="<?=ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname?>" placeholder="First Name">
            <input type="text" name="lastname"  value="<?= $lastname?>" placeholder="Last Name">
            <input type="text" name="username"  value="<?= $username?>" placeholder="UserName">
            <input type="text" name="email"  value="<?= $email?>" placeholder="Email">
            <input type="text" name="createpassword"  value="<?= $createpassword?>" placeholder="Create password">
            <input type="text" name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm password">
            <p>User Avatar</p>
        <div class="form__control">
            <label for="avatar"></label>
            <input type="file" name="avatar" id="avatar">
        </div>
        <button type="submit" name="submit" class="btn"> Sign Up</button>
        <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>
</body>
</html>