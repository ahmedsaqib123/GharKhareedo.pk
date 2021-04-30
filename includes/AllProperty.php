<?php
    session_start();
    include_once 'dbhandler.php';

    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $property_type = mysqli_real_escape_string($conn,$_POST['propertyType']);
    if ($property_type != 3)
    {
        $rooms = mysqli_real_escape_string($conn,$_POST['rooms']);
    }
    
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $size = mysqli_real_escape_string($conn,$_POST['size']);

    if (empty($city) && empty($location) && $property_type == 0 && empty($rooms) && empty($price) && empty($size))
    {
        $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`";
        $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`";
        $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`";
       
        $_SESSION['q1'] = $q1;
        $_SESSION['q2'] = $q2;
        $_SESSION['q3'] = $q3;
        header("Location: ../findAllproperty.php?khali");
        exit();
    }
    