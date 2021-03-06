<?php
    session_start();
    include_once 'includes/dbhandler.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        function myFunction(x) {
            x.classList.toggle("fa-thumbs-down");
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(http://www.shukatsu-note.com/wp-content/uploads/2014/12/computer-564136_1280.jpg) no-repeat;
            background-size: cover;
            height: 100vh;
        }

        h1 {
            text-align: center;
            font-family: Tahoma, Arial, sans-serif;
            color: black;
            margin: 80px 0;
        }

        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(0, 0, 0, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        .button {
            font-size: 1em;
            padding: 10px;
            color: #fff;
            border: 2px solid gray;
            border-radius: 20px/50px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .button:hover {
            background: black;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 1s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: rgb(0, 0, 0);
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: rgb(22, 21, 21);
        }

        .popup .close:hover {
            color: black;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }

        .dropbtn {
            background-color: #f7f7f7;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #f7f7f7;
        }
    </style>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="index_seller.php"><img class="image" src="./edit.jpeg"></a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu" style="font-family: 'Poppins';">
                            <li><a href="./index_seller.php">Home</a></li>
                            <li><a href="./AddProperty.php">Add a Property</a></li>
                            <li>
                                <div class="dropdown" style="font-family: 'Poppins';">
                                    <button class="dropbtn"><?php echo $_SESSION['fname']." ".$_SESSION['lname']?></button>
                                    <div class="dropdown-content">
                                        <a href="#popup2">Details</a>
                                        <a href="includes/AllPropertyS.php">Your Properties</a>
                                        <a href="./includes/logout.php">Log Out</a>
                                    </div>
                                  </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="container bootdey" style="font-family: 'Poppins';">
        <div class="col-12">
            <section class="panel container">
                <div class="panel-body row">
                    <div class="col-md-6">
                        <div class="pro-img-details">
                            <img class="product_image"
                                src="./images/image_houses/ralph-ravi-kayden-2d4lAQAlbDA-unsplash.jpg" alt=""
                                width="530px">
                        </div>
                    </div>
                    <?php
                        $var = $_GET['id'];
                        if($var[0] == "F")
                        {
                            $sql = "SELECT * FROM flat 
                            join property ON flat.Property_Property_id = property.Property_id
                            join location ON location.Location_id = property.Location_Location_id
                            WHERE Flat_no = '".$var."'";
                            $sql1 = mysqli_query($conn,$sql);
                            $rows1 = mysqli_fetch_array($sql1);
                    ?>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            <a href="#" class="">Flat
                                <?php echo $rows1['Flat_no'] ?>
                            </a>
                        </h4>
                        <div class="m-bot15"> <strong>Price : </strong>
                            <span class="amount-old"><?php echo $rows1['Price'] ?>. Rs</span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Size: </strong>
                                <span><?php echo $rows1['Size'] ?> (SQFT)</span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Apartment Name: </strong>
                                <span><?php echo $rows1['Appartment_Name'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Area: </strong>
                                <span><?php echo $rows1['Area'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Floor: </strong>
                                <span><?php echo $rows1['Level'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Rooms: </strong>
                                <span><?php echo $rows1['Rooms'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Description: </strong>
                                <span>
                                    <?php echo $rows1['Description'] ?>
                                </span>
                            </span>
                            <br />
                        </div>
                    </div>
                    <?php 
                        }
                        if($var[0] == "H")
                        {
                            $sql = "SELECT * FROM house 
                            join property ON house.Property_Property_id = property.Property_id
                            join location ON location.Location_id = property.Location_Location_id
                            WHERE House_no = '".$var."'";
                            $sql1 = mysqli_query($conn,$sql);
                            $rows2 = mysqli_fetch_array($sql1);   
                    ?>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            <a href="#" class="">House
                                <?php echo $rows2['House_no'] ?>
                            </a>
                        </h4>
                        <div class="m-bot15"> <strong>Price : </strong>
                            <span class="amount-old"><?php echo $rows2['Price'] ?>. Rs</span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Size: </strong>
                                <span><?php echo $rows2['Size'] ?> (SQFT)</span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Society Name: </strong>
                                <span><?php echo $rows2['Society_Name'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Area: </strong>
                                <span><?php echo $rows2['Area'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Levels: </strong>
                                <span><?php echo $rows2['Floors'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Rooms: </strong>
                                <span><?php echo $rows2['Rooms'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Description: </strong>
                                <span>
                                    <?php echo $rows2['Description'] ?>
                                </span>
                            </span>
                            <br />
                        </div>
                    </div>
                    <?php
                        }
                        if($var[0] == "P")
                        {
                            $sql = "SELECT * FROM plot 
                            join property ON plot.Property_Property_id = property.Property_id
                            join location ON location.Location_id = property.Location_Location_id
                            WHERE Plot_no = '".$var."'";
                            $sql1 = mysqli_query($conn,$sql);
                            $rows3 = mysqli_fetch_array($sql1);
                     ?>
                    <div class="col-md-6">
                        <h4 class="pro-d-title">
                            <a href="#" class="">Plot
                                <?php echo $rows3['Plot_no'] ?>
                            </a>
                        </h4>
                        <div class="m-bot15"> <strong>Price : </strong>
                            <span class="amount-old"><?php echo $rows3['Price'] ?>. Rs</span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Size: </strong>
                                <span><?php echo $rows3['Size'] ?> (SQFT)</span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Society Name: </strong>
                                <span><?php echo $rows3['Society_Name'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Area: </strong>
                                <span><?php echo $rows3['Area'] ?></span>
                            </span>
                        </div>
                        <div class="product_meta">
                            <span class="posted_in">
                                <strong>Description: </strong>
                                <span>
                                    <?php echo $rows3['Description'] ?>
                                </span>
                            </span>
                            <br />
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
    </div>
    <br />
    <br/>
    <br/>
    <footer class="py-5" style="background-color: #f7f7f7; color: black;font-family: 'Poppins';">
        <div class="container py-xl-4 py-lg-3">
            <div class="row footer-grids">
                <div class="col-3 footer-grid">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3" style="color: black;">Home</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index_seller.php" style="color: black;">Index</a>
                        </li>
                        <li>
                            <a href="#about" style="color: black;">About Us</a>
                        </li>
                        <li>
                            <a href="#services" style="color: black;">Services</a>
                        </li>
                        <li>
                            <a href="#gallery" style="color: black;">Gallery</a>
                        </li>
                        <li>
                            <a href="#contact" style="color: black;">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3 footer-grid">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3" style="color: black;"> Company</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#find" style="color: black;">Find a Property</a>
                        </li>
                        <li>
                            <a href="#blog" style="color: black;">Our Blog</a>
                        </li>
                        <li>
                            <a href="#places" style="color: black;"> Popular Places</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3 footer-grid footer-contact">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3" style="color: black;"> Contact Us</h3>
                    <ul class="list-unstyled">
                        <li style="color: black;">
                            +01(24) 8543 8088
                        </li>
                        <li>
                            <a href="mailto:info@example.com" style="color: black;">info@example.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-3 footer-grid">
                    <div class="footer-logo">
                        <h2 class="text-lg-center text-center">
                            <a class="logo text-wh font-weight-bold" href="index_seller.php" style="margin-left: 30px;"><img
                                    src="./WhatsApp Image 2020-11-12 at 1.39.25 PM.jpeg"></a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="copyright-w3ls py-4" style="font-family: Poppins;">
        <div class="container">
            <div class="row">
                <!-- copyright -->
                <p class="col-lg-8 copy-right-grids text-wh text-lg-left text-center mt-lg-2">?? 2019 Ghar Khareedo.pk.
                    All
                    Rights Reserved | Design by
                    <a href="#" target="_blank">SHAHEER AHMED SAROOSH</a>
                </p>
                <!-- //copyright -->
                <!-- social icons -->
                <div class="col-lg-4 w3social-icons text-lg-right text-center mt-lg-0 mt-3">
                    <ul>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="px-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li class="pl-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //social icons -->
            </div>
        </div>
    </div>
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Seller Details</h2>
            <hr />
            <a class="close" href="#">&times;</a>
            <div class="content product_meta">
                <span class="posted_in">
                    <strong>Seller Name : </strong>
                    <span>Ahmed Saqib</span>
                    <br />
                    <strong>Email Address : </strong>
                    <span>Ahmed.Saqib@123.com</span>
                    <br />
                    <strong>Phone Number : </strong>
                    <span>+92123456789</span>
                </span>
            </div>
        </div>
    </div>
    <div id="popup2" class="overlay">
        <div class="popup">
            <h2>Your Details</h2>
            <hr />
            <a class="close" href="#">&times;</a>
            <div class="content product_meta">
                <span class="posted_in">
                    <strong>User Name : </strong>
                    <span><?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></span>
                    <br />
                    <strong>Email Address : </strong>
                    <span><?php echo $_SESSION['email'] ?></span>
                    <br />
                    <strong>CNIC Number : </strong>
                    <span><?php echo $_SESSION['cnic'] ?></span>
                    <br/>
                    <strong>Phone Number : </strong>
                    <span><?php echo $_SESSION['phno'] ?></span>
                    <br/>
                    <strong>Account Type : </strong>
                    <span>Buyer</span>
                </span>
            </div>
        </div>
    </div>
</body>

</html>