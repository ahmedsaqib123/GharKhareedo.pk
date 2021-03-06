<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Land Real Estates Category Bootstrap Responsive website Template | Home :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Land Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="text/javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        
        var subcategory = {
            Karachi: ["Azizabad", "Gulshan", "DHA", "Gulzar-e-Hijri"],
            Islamabad: ["PECHS", "DHA", "Pakistan Secretariat", "Blue Area"]
        }

        function makeSubmenu(value) {
            if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategory[value]) {
                    citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
                }
                document.getElementById("categorySelect").innerHTML = citiesOptions;
            }
        }

        function displaySelected() {
            var country = document.getElementById("category").value;
            var city = document.getElementById("categorySelect").value;
            alert(country + "\n" + city);
        }
    </script>
    
    <style>
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
<link
href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
rel="stylesheet">
<link
href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<!-- //Web-Fonts -->
<link href="./fonts/Poppins-Regular.ttf" rel="stylesheet">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Bootstrap-Core-CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="index_buyer.php"><img class="image" src="./edit.jpeg"></a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle" style="font-family: 'Poppins';">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu" style="font-family: 'Poppins';">
                            <li><a href="./index_buyer.php" style="font-family: 'Poppins';">Home</a></li>
                            <li><a href="includes/AllProperty.php">Find a Property</a></li>
                            <li>
                                <div class="dropdown" style="font-family: 'Poppins';">
                                    <button class="dropbtn"><?php echo $_SESSION['fname']." ".$_SESSION['lname']?></button>
                                    <div class="dropdown-content">
                                        <a href="#popup2">Details</a>
                                        <a href="includes/AllpropertyB.php">Favourites</a>
                                        <a href="./includes/logout.php">Log Out</a>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- //nav -->
        </div>
        </div>
    </header>
    <!-- //header -->
    <!-- banner -->
    <div class="main-w3pvt mian-content-wthree text-center" id="home">
        <div class="container">
            <div class="style-banner mx-auto">
                <h3 class="text-wh font-weight-bold" style="color: white;" style="font-family: 'Poppins';">Search and
                    Find Your <span style="color: black;" style="font-family: 'Poppins';">Luxury</span>
                    Homes</h3>
                <br />
                <!-- form -->
                <div class="home-form-w3ls mt-5 pt-lg-4">
                    <form action="includes/search.php" method="post" style="font-family: 'Poppins';">    
                    <div onload="resetSelection()">
                        <div class="row  formed">
                            <div class="col-4">
                                <div class="form-group">
                                    <select required="" id="category" size="1" onchange="makeSubmenu(this.value)" class="form-control" name="city">
                                        <option value="" disabled selected>Select City</option>
                                        <option>Karachi</option>
                                        <option>Islamabad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select required="" id="categorySelect" size="1" class="form-control" name="location">
                                        <option value="" disabled selected>Select Location</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                <select class="form-control" name="propertyType" required="">
                                        <option value="" disabled selected>Property Type</option>
                                        <option value="1">Flat</option>
                                        <option value="2">Home</option>
                                        <option value="3">Plot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Input Area (SQFT)" name="size">
                                </div>
                            </div>
                            <br />
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Input Number of Rooms" name="rooms">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Enter Amount Here" name="price">
                                </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn_apt"
                            style="background-color: #343a40; font-family: 'Poppins';" name="search">Find Here</button>
                    </form>
                </div>
                <!-- //form -->
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
    </div>
    <!-- //banner -->



    <!-- places -->
    <section class="branches py-5" id="places" style="background-color: white; color: #343a40;">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold"
                style="color: #343a40; font-family: 'Poppins';">Most Popular Places</h3>
            <p class="text-center title-w3 mb-md-5 mb-4" style="color: #343a40;">Colorful places to live and play.
            </p>
            <div class="row branches-position pt-4">
                <div class="col-lg-3 col-sm-6 place-w3">
                    <!-- branch-img -->
                    <div class="team-img team-img-1">
                        <div class="team-content">
                            <h4 class="text-wh">Place 1</h4>
                            <p class="team-meta">Karachi</p>
                        </div>
                    </div>
                </div>
                <!-- / branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-sm-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-2">
                        <div class="team-content">
                            <h4 class="text-wh">Place 2</h4>
                            <p class="team-meta">Lahore</p>
                        </div>
                    </div>
                </div>
                <!-- /.branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-lg-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-3">
                        <div class="team-content">
                            <h4 class="text-wh">Place 3</h4>
                            <p class="team-meta">Islamabad</p>
                        </div>
                    </div>
                </div>
                <!-- /.branch-img -->
                <div class="col-lg-3 col-sm-6 place-w3 mt-lg-0 mt-4">
                    <!-- team-img -->
                    <div class="team-img team-img-4">
                        <div class="team-content">
                            <h4 class="text-wh">Place 4</h4>
                            <p class="team-meta">Multan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //places -->

    <!-- gallery -->
    <div class="gallery pb-5" id="gallery" style="background-color: #343a40;">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title-w3 mb-2 text-center text-bl font-weight-bold" style="color: white;">Our Gallery</h3>
            <p class="text-center title-w3 mb-md-5 mb-4" style="color: white;">Colorful places to live and play.
            </p>
            <div class="row news-grids text-center no-gutters">
                <div class="col-md-4 gal-img">
                    <a href="#gal1"><img src="images/g1.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal2"><img src="images/g2.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal3"><img src="images/g3.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
            </div>
            <div class="row news-grids text-center no-gutters">
                <div class="col-md-4 gal-img">
                    <a href="#gal4"><img src="images/g4.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal5"><img src="images/g5.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
                <div class="col-md-4 gal-img">
                    <a href="#gal6"><img src="images/g6.jpg" alt="Gallery Image" class="img-fluid"></a>
                </div>
            </div>
            <!-- gallery popups -->
            <!-- popup-->
            <div id="gal1" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g1.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal2" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g2.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal3" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g3.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup3 -->
            <!-- popup-->
            <div id="gal4" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g4.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal5" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g5.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- popup-->
            <div id="gal6" class="pop-overlay animate">
                <div class="popup">
                    <img src="images/g6.jpg" alt="Popup Image" class="img-fluid" />
                    <p class="mt-4">Nulla viverra pharetra se, eget pulvinar neque pharetra ac int. placerat placerat
                        dolor.</p>
                    <a class="close" href="#gallery">&times;</a>
                </div>
            </div>
            <!-- //popup -->
            <!-- //gallery popups -->
        </div>
    </div>
    <!-- //gallery -->



    <!-- footer -->
    <footer class="py-5" style="background-color: #f7f7f7; color: black">
        <div class="container py-xl-4 py-lg-3">
            <div class="row footer-grids">
                <div class="col-3 footer-grid">
                    <h3 class="mb-sm-4 mb-3 pb-lg-3" style="color: black;">Home</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index_buyer.php" style="color: black;">Index</a>
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
                            <a class="logo text-wh font-weight-bold" href="index_buyer.php" style="margin-left: 30px;"><img
                                    src="./WhatsApp Image 2020-11-12 at 1.39.25 PM.jpeg"></a>
                        </h2>
                    </div>
                </div>


            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="copyright-w3ls py-4">
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
    <!-- //copyright -->
    <!-- move top icon -->
    <!-- //move top icon -->
</body>

</html>