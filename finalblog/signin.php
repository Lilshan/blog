<?php
require 'config/contants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);

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
<body>
<body> 

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign In</h2>
        <?php if (isset($_SESSION['signup-success'])) : ?>
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>
            </div>
        <?php elseif(isset($_SESSION['signin'])): ?>
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['signin'];
                    unset($_SESSION['signin']);
                    ?>
                </p>
            </div>
         <?php endif?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
            <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="UserName or Email">
            <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
        <button type="submit"  name="submit" class="btn"> Sign In</button>
        <small>Don't have an account? <a href="signup.php">Sign up</a></small>
        </form>
    </div>
</section>
</body>
</html>