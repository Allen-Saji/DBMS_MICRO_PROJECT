<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/css/styles.css">
    <script src="https://kit.fontawesome.com/6b3725c26f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/solid.css">
    <link rel="icon" href="favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Inventory Management System</title>

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }
    </style>
</head>
<?php
session_start();
if (strpos($_SESSION['user_id'], 'admin')) {
?>


    <body>
        <div class="container">
            <div class="page-left">

                <div class="logo">
                    INVENTORY SYSTEM
                </div>

                <div class="sidebar">
                    <ul>
                        <a href="home.php">
                            <li><i class="fas fa-home"></i>Dashboard</li>
                        </a>
                        <a href="manageUsers.php">
                            <li><i class="ui uis-user-md"></i>Manage Users</li>
                        </a>
                        <a href="customers.php">
                            <li><i class="fas fa-user-alt"></i>Customers</li>
                        </a>
                        <a href="sales.php">
                            <li>
                                <ion-icon name="pricetag-outline" id="sales-icon"></ion-icon>Sales
                            </li>
                        </a>
                        <a href="products.php">
                            <li>
                                <ion-icon name="logo-dropbox" id="product-icon"></ion-icon>Products
                            </li>
                        </a>
                    </ul>
                </div>
            </div>

            <div class="page-right">
                <div class="banner-right">
                    <div class="date">
                        <h3><?php echo date("l") . ", " . date("jS") . " " . date("F") . " " . date("Y");
                            ?></h3>
                    </div>
                    <div class="user-profile">
                        <i class="ui uis-user-md"></i> <?php echo $_SESSION['name']; ?>
                        <a href="logout.php"><button type="submit" id="logout-btn">Logout</button></a>
                    </div>
                </div>
                <div class="content">

                <?php
            } else { ?>

                    <body>
                        <div class="container">
                            <div class="page-left">

                                <div class="logo">
                                    INVENTORY SYSTEM
                                </div>

                                <div class="sidebar">
                                    <ul>
                                        <a href="home.php">
                                            <li><i class="fas fa-home"></i>Dashboard</li>
                                        </a>
                                        <a href="customers.php">
                                            <li><i class="fas fa-user-alt"></i>Customers</li>
                                        </a>
                                        <a href="sales.php">
                                            <li>
                                                <ion-icon name="pricetag-outline" id="sales-icon"></ion-icon>Sales
                                            </li>
                                        </a>
                                        <a href="products.php">
                                            <li>
                                                <ion-icon name="logo-dropbox" id="product-icon"></ion-icon>Products
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>

                            <div class="page-right">
                                <div class="banner-right">
                                    <div class="date">
                                        <h3><?php echo date("l") . ", " . date("jS") . " " . date("F") . " " . date("Y");
                                            ?></h3>
                                    </div>
                                    <div class="user-profile">
                                        <i class="ui uis-user-md"></i> <?php echo $_SESSION['name']; ?>
                                        <a href="logout.php"><button type="submit" id="logout-btn">Logout</button></a>
                                    </div>
                                </div>
                                <div class="content">

                                <?php } ?>