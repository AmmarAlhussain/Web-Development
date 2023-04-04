<!DOCTYPE html>
<html>

<head>
    <title><?php $title;
            echo $title; ?></title>
    <!-- Normalization -->
    <link rel="stylesheet" href="CSS/normalize.css">
    <!-- Main File  -->
    <link rel="stylesheet" href="CSS/Master.css">
    <!-- Index File -->
    <?php if ($title == "Bonus Store") echo '<link rel="stylesheet" href="CSS/index.css">'; ?>
    <!-- Login File -->
    <?php if ($title == "Login" || $title == "Sign") echo '<link rel="stylesheet" href="CSS/login.css">'; ?>
    <!-- Games File -->
    <?php if ($title == "Games") echo '<link rel="stylesheet" href="CSS/games.css">'; ?>
    <!-- Cart File -->
    <?php if ($title == "Cart") echo '<link rel="stylesheet" href="CSS/cart.css">'; ?>
    <!-- Favorite Awesome -->
    <?php if ($title == "Favorite") echo '<link rel="stylesheet" href="CSS/favorite.css">'; ?>
    <!-- Add File -->
    <?php if ($title == "Add Game") echo '<link rel="stylesheet" href="CSS/add.css">'; ?>
    <!-- Add/Edit File -->
    <?php if ($title == "Add Page" || $title == "Edit Page" || $title == "Add Trading" || $title == "Accept") echo '<link rel="stylesheet" href="CSS/addAdmin.css">'; ?>
    <!--Delete File  -->
    <?php if ($title == "Delete Page") echo "<link rel='stylesheet' href='CSS/deleteAdmin.css'>"; ?>
    <!--Delete File  -->
    <?php if ($title == "Excel") echo "<link rel='stylesheet' href='CSS/excel.css'>"; ?>
    <!--Admin Page  -->
    <?php if ($title == "Admin Page") echo '<link rel="stylesheet" href="CSS/adminPage.css">'; ?>
    <!--Trading Page  -->
    <?php if ($title == "Accept2" || $title == "Accept Admin") echo '<link rel="stylesheet" href="CSS/accept2.css">'; ?>
    <!--Trading Page  -->
    <?php if ($title == "Trading") echo '<link rel="stylesheet" href="CSS/trading.css">'; ?>
    <!--Rate Page  -->
    <?php if ($title == "Rate") echo '<link rel="stylesheet" href="CSS/rate.css">'; ?>
    <!--Add Offer Page  -->
    <?php if ($title == "Add Offer") echo '<link rel="stylesheet" href="CSS/addOffer.css">'; ?>
    <!--Delete Offer Page  -->
    <?php if ($title == "Delete Offer") echo '<link rel="stylesheet" href="CSS/deleteOffer.css">'; ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
</head>
<?php
$login = false;
$admin = false;
$on = "";
if ($title == "Admin Page") $on = 'red';
include("database.php");
session_start();
if (isset($_SESSION["id"])) {
    $login = true;
    $user100 = $_SESSION["id"];
    $result100 = mysqli_query($database, "SELECT * FROM users  where id = $user100");
    if ($row100 = mysqli_fetch_assoc($result100)) {
        if ($row100["admin"] == "admin") {
            $admin = true;
        }
    }
}
?>

<body>
    <header class="menu">
        <div class="logo">
            <h1 class="scale"><a href="index.php"><img src="Img/logo.png" alt="Logo"></a></h1>
        </div>
        <ul>
            <li class="scale <?php if($title == "Games" ) echo 'red'; ?> "><a href="games.php">Games</a></li>
            <li class="scale <?php if($title == "Trading" ) echo 'red'; ?>"><a href="trading.php">Games Trading
                    Center</a>
            </li>
            <li><a href="favorite.php "><i
                        class="fas fa-heart scale <?php if($title == "Favorite" ) echo 'red'; ?>"></i></a></li>
            <li><a href="cart.php"><i
                        class="fas fa-shopping-cart scale  <?php if($title == "Cart") echo 'red'; ?>"></i></a></li>
            <?php if ($admin) echo "<li class='$on'><a href='adminPage.php'>Admin</a></li>"; ?>
        </ul>
        <div class=" search">
            <a href="login.php">
                <?php if (!$login) { ?>
                <p class="scale <?php if($title == "Login" ) echo 'red'; ?> ">Login</p>
                <?php } else { ?>
                <p class="scale">Logout</p>
                <?php } ?>
            </a>
            <input type="text" placeholder="Search" names="search">
            <i class="fa fa-search"></i>
        </div>
    </header>