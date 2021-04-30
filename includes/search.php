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
    
    if (empty($rooms) && empty($price) && empty($size))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type");
        exit();

    }
    elseif (empty($price) && empty($size))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Rooms = '".$rooms."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Rooms = '".$rooms."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type&rooms");
        exit();

    }
    elseif (empty($size) && empty($rooms))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price <= '".$price."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price <= '".$price."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price <= '".$price."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type&price");
        exit();

    }
    elseif (empty($price) && empty($rooms))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Size = '".$size."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Size = '".$size."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Size = '".$size."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type&size");
        exit();

    }
    elseif (empty($price))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Rooms = '".$rooms."' AND Size = '".$size."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Rooms = '".$rooms."' AND Size = '".$size."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Size = '".$size."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type&rooms&size");
        exit();

    }
    elseif (empty($rooms))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price = '".$price."' AND Size = '".$size."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price = '".$price."' AND Size = '".$size."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Size = '".$size."' AND Price = '".$price."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type&price&size");
        exit();

    }
    elseif (empty($size))
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price = '".$price."' AND Rooms = '".$rooms."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price = '".$price."' AND Rooms = '".$rooms."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price = '".$price."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?city&area&type&rooms&price");
        exit();

    }
    else
    {
        if ($property_type == 1)
        {
            $q3 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Rooms = '".$rooms."' AND Price = '".$price."' AND Size = '".$size."'";
            $_SESSION['q3'] = $q3;
            $_SESSION['q2'] = false;
            $_SESSION['q1'] = false;
        }
        elseif ($property_type == 2)
        {
            $q2 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN house ON property.`Property_id` = house.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Rooms = '".$rooms."' AND Price = '".$price."' AND Size = '".$size."'";
            $_SESSION['q2'] = $q2;
            $_SESSION['q1'] = false;
            $_SESSION['q3'] = false;
        }
        elseif ($property_type == 3)
        {
            $q1 = "SELECT * FROM property
            JOIN location ON property.`Location_Location_id` = location.`Location_id`
            JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
            WHERE City = '".$city."' AND Area = '".$location."' AND Price = '".$price."' AND Size = '".$size."'";
            $_SESSION['q1'] = $q1;
            $_SESSION['q2'] = false;
            $_SESSION['q3'] = false;
        }
        header("Location: ../findAllproperty.php?saryhai");
        exit();

    }
