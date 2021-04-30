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

        .overlays {
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

        .overlays:target {
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
                    <h1><a href="index_buyer.php"><img class="image" src="./edit.jpeg"></a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="./index_buyer.php" style="font-family: 'Poppins';">Home</a></li>
                            <li></li>
                            <li><a href="includes/AllProperty.php" style="font-family: 'Poppins';">Find a Property</a>
                            </li>
                            <li>
                                <div class="dropdown" style="font-family: 'Poppins';">
                                    <button class="dropbtn"><?php echo $_SESSION['fname']." ".$_SESSION['lname']?></button>
                                    <div class="dropdown-content">
                                        <a href="#popup2">Details</a>
                                        <a href="includes/AllPropertyB.php">Favourites</a>
                                        <a href="includes/logout.php">Log Out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- //nav -->
        </div>
    </header>
    <br />
    <br />
    <div class="main-w3pvt mian-content-wthrees text-center" id="home">
        <div class="container">
            <div class="style-banner mx-auto">
                <h3 class="text-wh font-weight-bold" style="color: white;font-family: 'Poppins';">Find Favourite
                    Property Here
                </h3>
                <!-- form -->
                <div class="home-form-w3ls mt-5 pt-lg-4" style="font-family: 'Poppins';">
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
                                <select required="" class="form-control" name="propertyType">
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
                    <br />
                </div>
                <!-- //form -->
            </div>
        </div>
        <div id="popup2" class="overlays">
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

    <!-- //header -->
    <br />
    <p style="font-family: 'Poppins';">home>Favourites</p>
    <hr />

    <!-- Card -->
    <div class="container">
        <div class="row" style="font-family: 'Poppins';">
        <?php
            if ($_SESSION['q1'] !== false) {
            $sql1 = mysqli_query($conn,$_SESSION['q1']);
            while($rows1 = mysqli_fetch_array($sql1))
            {
                $pno = $rows1['Plot_no'];
                $sql = "SELECT * FROM user 
                join property ON user.User_id = property.User_User_id
                join plot ON property.Property_id = plot.Property_Property_id
                WHERE User_Type = 1 AND Plot_no = '".$pno."'";
                $sql = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($sql);
        ?>
            <div class="card" style="background-color: white;">
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="./images/image_houses/g4.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!-- Card content -->
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">Plot <?php echo $rows1['Plot_no'] ?></h4>
                    <!-- Text -->
                    <p class="card-text" style="color: black;">
                        <strong>Area : </strong>
                        <span><?php echo $rows1['Area'] ?></span>
                        <br />
                        <strong>Size : </strong>
                        <span><?php echo $rows1['Size'] ?>(SQFT)</span>
                        <br />
                    </p>
                    <!-- Button -->
                    <br />
                    <div class="text-center">
                        <a id = "<?php echo $pno ?>" href="./property_details_buyer.php?id=<?php echo $pno ?>&id1=<?php echo $row['User_id'] ?>" class="btn btn-primary">Get Full Details</a>
                    </div>
                </div>
            </div>
        <?php
            }}
        ?>
        <?php
            if ($_SESSION['q2'] !== false) {
            $sql2 = mysqli_query($conn,$_SESSION['q2']);
            while($rows2 = mysqli_fetch_array($sql2))
            {
                $hno = $rows2['House_no'];
                $sql = "SELECT * FROM user 
                join property ON user.User_id = property.User_User_id
                join house ON property.Property_id = house.Property_Property_id
                WHERE User_Type = 1 AND House_no = '".$hno."'";
                $sql = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($sql);
        ?>
            <div class="card" style="background-color: white;">
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="./images/image_houses/g4.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!-- Card content -->
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">House <?php echo $rows2['House_no'] ?></h4>
                    <!-- Text -->
                    <p class="card-text" style="color: black;">
                        <strong>Area : </strong>
                        <span><?php echo $rows2['Area'] ?></span>
                        <br />
                        <strong>Size : </strong>
                        <span><?php echo $rows2['Size'] ?>(SQFT)</span>
                        <br />
                        <strong>Rooms : </strong>
                        <span><?php echo $rows2['Rooms'] ?></span>
                        <br />
                        <strong>Levels : </strong>
                        <span><?php echo $rows2['Floors'] ?></span>
                        <br />
                    </p>
                    <!-- Button -->
                    <br />
                    <div class="text-center">
                        <a  id = "<?php echo $hno ?>" href="./property_details_buyer.php?id=<?php echo $hno ?>&id1=<?php echo $row['User_id'] ?>" class="btn btn-primary">Get Full Details</a>
                    </div>
                </div>
            </div>
        <?php
            }}
        ?>
        <?php
            if ($_SESSION['q3'] !== false) {
            $sql3 = mysqli_query($conn,$_SESSION['q3']);
            while($rows3 = mysqli_fetch_array($sql3))
            {
                $fno = $rows3['Flat_no'];
                $sql = "SELECT * FROM user 
                join property ON user.User_id = property.User_User_id
                join flat ON property.Property_id = flat.Property_Property_id
                WHERE User_Type = 1 AND Flat_no = '".$fno."'";
                $sql = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($sql);
        ?>
            <div class="card" style="background-color: white;">
                <!-- Card image -->
                <div class="view overlay">
                    <img class="card-img-top" src="./images/image_houses/g4.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!-- Card content -->
                <div class="card-body">
                    <!-- Title -->
                    <h4 class="card-title">Flat <?php echo $rows3['Flat_no'] ?></h4>
                    <!-- Text -->
                    <p class="card-text" style="color: black;">
                        <strong>Area : </strong>
                        <span><?php echo $rows3['Area'] ?></span>
                        <br />
                        <strong>Size : </strong>
                        <span><?php echo $rows3['Size'] ?>(SQFT)</span>
                        <br />
                        <strong>Rooms : </strong>
                        <span><?php echo $rows3['Rooms'] ?></span>
                        <br />
                        <strong>Levels : </strong>
                        <span><?php echo $rows3['Level'] ?></span>
                        <br />
                    </p>
                    <!-- Button -->
                    <br />
                    <div class="text-center">
                        <a id = "<?php echo $fno ?>" href="./property_details_buyer.php?id=<?php echo $fno ?>&id1=<?php echo $row['User_id'] ?>" class="btn btn-primary">Get Full Details</a>
                    </div>
                </div>
            </div>
        <?php
            }}
        ?>
        </div>
    </div>
    <!-- Card -->
    <br />
    <footer class="py-5" style="background-color: #f7f7f7; color: black;font-family: 'Poppins';">
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
    <div class="copyright-w3ls py-4" style="font-family: 'Poppins';">
        <div class="container">
            <div class="row">
                <!-- copyright -->
                <p class="col-lg-8 copy-right-grids text-wh text-lg-left text-center mt-lg-2">© 2019 Ghar Khareedo.pk.
                    All
                    Rights Reserved | Design by
                    <a href="#" target="_blank" style="font-family: 'Poppins';">SHAHEER AHMED SAROOSH</a>
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
    <div id="popup2" class="overlays
            <h2>Your Details</h2>
            <hr />
            <a class="close" href="#">&times;</a>
            <div class="content product_meta">
                <span class="posted_in">
                    <strong>User Name : </strong>
                    <span>Syed Shaheer</span>
                    <br />
                    <strong>Email Address : </strong>
                    <span>syed.shaheer@123.com</span>
                    <br />
                    <strong>CNIC Number : </strong>
                    <span>42101-1111111-3</span>
                    <br/>
                    <strong>Phone Number : </strong>
                    <span>+92123456787</span>
                    <br/>
                    <strong>Account Type : </strong>
                    <span>Buyer/Seller</span>
                </span>
            </div>
        </div>
    </div>
</body>

</html>