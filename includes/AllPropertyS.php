<?php
    session_start();
    include_once 'dbhandler.php';

    $usr = $_SESSION['user_id'];
    $q1 = "SELECT * FROM property
        JOIN location ON property.`Location_Location_id` = location.`Location_id`
        JOIN plot ON property.`Property_id` = plot.`Property_Property_id`
        AND property.User_User_id = '".$usr."'";
    $q2 = "SELECT * FROM property
        JOIN location ON property.`Location_Location_id` = location.`Location_id`
        JOIN house ON property.`Property_id` = house.`Property_Property_id`
        AND property.User_User_id = '".$usr."'";
    $q3 = "SELECT * FROM property
        JOIN location ON property.`Location_Location_id` = location.`Location_id`
        JOIN flat ON property.`Property_id` = flat.`Property_Property_id`
        AND property.User_User_id = '".$usr."'";
    
    $_SESSION['q1'] = $q1;
    $_SESSION['q2'] = $q2;
    $_SESSION['q3'] = $q3;
    header("Location: ../Seller_property.php?khali");
    exit();
    