<?php 
error_reporting(0);
include_once "config\allFunction.php";

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- <link rel="shortcut icon" href="images/favicon.png" type=""> -->
    <title>Era's - Fashion</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.php">
                        <span style="font-size:30px;color:#f7444e;">Era's Fashion</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                        <ul class="navbar-nav">
                            <li class="nav-item active" id="home">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#ourProducts" id="products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#testimonial" id="test">Testimonial</a>
                            </li>                            
                            <li class="nav-item" id="contact">
                                <a class="nav-link" href="contact.php"  >Contact</a>
                            </li>
                            <?php
                                if(isset($_SESSION['user_name']))
                                {                                    
                                    echo '<li  class="nav-item">
                                            <a class="nav-link" href="config/allFunction.php?choice=1"><i class="fa fa-power-off"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="wishlist.php"><i class="fa fa-heart"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="orderlist.php"><i class="fa fa-shopping-bag"></i></a>
                                        </li>';
                                }
                                else{
                                    echo '<li  class="nav-item" id="login">
                                            <a class="nav-link" href="login.php">LOGIN</a>
                                        </li>';
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>