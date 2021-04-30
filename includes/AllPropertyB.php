<?php
    session_start();
    include_once 'dbhandler.php';

    $usr = $_SESSION['user_id'];
    $q1 = "SELECT * FROM property
        JOIN location ON property.`Location_Location_id` = location.`Location_id`
        JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
        JOIN favourites ON favourites.`Property_id` = property.`Property_id`
        ANd `User_id` = '".$usr."'";
    $q2 = "SELECT * FROM property
        JOIN location ON property.`Location_Location_id` = location.`Location_id`
        JOIN house ON property.`Property_id` = house.`Property_Property_id`
        JOIN favourites ON favourites.`Property_id` = property.`Property_id`
        ANd `User_id` = '".$usr."'";
    $q3 = "SELECT * FROM property
        JOIN location ON property.`Location_Location_id` = location.`Location_id`
        JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
        JOIN favourites ON favourites.`Property_id` = property.`Property_id`
        ANd `User_id` = '".$usr."'";
    
    $_SESSION['q1'] = $q1;
    $_SESSION['q2'] = $q2;
    $_SESSION['q3'] = $q3;
    header("Location: ../Favourites.php?khali");
    exit();
    