<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include_once 'import-styles.php'; ?>
    <title>Log In or Sign Up</title>
</head>
<body>
    <header class="main-header no-auth pdx-5 pdy-1">
        <div class="left">
            <a href="index.php" class="logo">Jimo</a>
        </div>
        <div class="right">
            <ul class="header-items">
                <li>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li>
                    <a href="index.php" class="form-btn">Log In</a>
                </li>
                <li>
                    <a href="signup.php" class="form-btn signup">Sign Up</a>
                </li>
            </ul>
        </div>
        <div class="mobile-menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </header>