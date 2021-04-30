<?php
    session_start();
    include_once 'dbhandler.php';

    $pid = $_GET['id'];
    $uid = $_SESSION['user_id'];
    $q = "SELECT * FROM favourites WHERE User_id = '".$uid."' AND Property_id = '".$pid."'";
    $sql = mysqli_query($conn,$q);
    if ($row = mysqli_fetch_array($sql))
    {
        header("Location: ../findAllproperty.php?exist");
    }
    else
    {
        $sql = "INSERT INTO favourites (`User_id`, Property_id) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../findAllproperty.php?error=sqlerror1");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ss", $uid, $pid);
                mysqli_stmt_execute($stmt);
            }
        header("Location: ../findAllproperty.php?added");
    }
    