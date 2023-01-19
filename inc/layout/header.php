<?php 
    // require './helpers/Auth.php';
    // Auth::checkAccess();
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
    <title>JIMO - Your Task App</title>
</head>
<body>
    <header class="main-header pdx-5 pdy-1">
        <div class="left">
            <div class="logo">Jimo</div>
        </div>
        <div class="center">
            <div class="search-todo">
                <input class="search-todo-input" name="searchTask" type="text" placeholder="Search a task...">
                <button class="search-todo-button">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
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
                    <div class="profile">
                        <i class="fa-solid fa-user"></i>
                        <span class="arrow">
                            <i class="fa-sharp fa-solid fa-chevron-down"></i>
                        </span>
                        <div class="dropdown-profile">
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mobile-menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </header>