<?php
if (isset($_POST["button"]))
{
    include_once 'dbhandler.php';

    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $area = mysqli_real_escape_string($conn,$_POST['area']);

    $sql = "INSERT INTO location (Area, City) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: dataEntery.php?error=sqlerror1");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "ss", $area, $city);
        mysqli_stmt_execute($stmt);
    }

    header("Location: dataEntery.php?hogaya");
}
else
{
    header("Location: dataEntery.php?nahichala");
}
    