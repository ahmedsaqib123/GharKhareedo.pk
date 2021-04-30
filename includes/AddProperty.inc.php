<?php
session_start();
if (isset($_POST['add']))
{
    include_once 'dbhandler.php';

    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $location = mysqli_real_escape_string($conn,$_POST['location']);
    $q = "SELECT Location_id FROM location WHERE City = '".$city."' AND Area = '".$location."'";
    $sql = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($sql);
    $locationId = $row['Location_id'];
    $property_type = mysqli_real_escape_string($conn,$_POST['propertyType']);
    if ($property_type != "Plot")
    {
        $manzil = mysqli_real_escape_string($conn,$_POST['manzil']);
        $rooms = mysqli_real_escape_string($conn,$_POST['rooms']);
    }
    if($property_type === "Homes" || $property_type === "Plot")
    {
        $society = mysqli_real_escape_string($conn,$_POST['jaga']);
    }
    elseif ($property_type === "Flat")
    {
        $appartment = mysqli_real_escape_string($conn,$_POST['jaga']);
    }
    if($property_type === "Homes")
    {
        $house_num = mysqli_real_escape_string($conn,$_POST['jaganum']);
    }
    elseif ($property_type === "Plot")
    {
        $plot_num = mysqli_real_escape_string($conn,$_POST['jaganum']);
    }
    elseif ($property_type === "Flat")
    {
        $flat_num = mysqli_real_escape_string($conn,$_POST['jaganum']);
    }
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $size = mysqli_real_escape_string($conn,$_POST['size']);

    if ($property_type == "Homes")
    {
        $sql = "SELECT House_no FROM house WHERE House_no = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../AddProperty.php?error=sqlerrorflat");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $house_num);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                header("Location: ../AddProperty.php?error=propertyalreadyexist");
                exit();
            }
            else
            {
                $sql = "INSERT INTO property (Size, Description, Price, User_User_id, Location_Location_id) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../AddProperty.php?error=sqlerror1homes");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssss", $size, $description, $price, $_SESSION['user_id'], $locationId);
                    mysqli_stmt_execute($stmt);

                }

                $sql1 = "SELECT MAX(Property_id) as maxx FROM property";
                $sql = mysqli_query($conn,$sql1);
                $row = mysqli_fetch_array($sql);
                $propertyId = $row['maxx'];
                $sql = "INSERT INTO house (House_no, Rooms, Floors, Property_Property_id, Society_Name)
                VALUES (?,?,?,?,?)";
                
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../AddProperty.php?error=sqlerror2homes");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssss", $house_num, $rooms, $manzil, $propertyId, $society);
                    mysqli_stmt_execute($stmt);
                }            
            }
        }
    }
    elseif ($property_type == "Flat")
    {
        $sql = "SELECT Flat_no, Appartment_Name FROM flat WHERE Flat_no = ? AND Appartment_Name = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../AddProperty.php?error=sqlerrorflat");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $flat_num, $appartment);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                header("Location: ../AddProperty.php?error=propertyalreadyexist");
                exit();
            }
            else
            {
                $sql = "INSERT INTO property (Size, Description, Price, User_User_id, Location_Location_id) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../AddProperty.php?error=sqlerror1flat");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssss", $size, $description, $price, $_SESSION['user_id'], $locationId);
                    mysqli_stmt_execute($stmt);
                    
                }
                $sql1 = "SELECT MAX(Property_id) as maxx FROM property";
                $sql = mysqli_query($conn,$sql1);
                $row = mysqli_fetch_array($sql);
                $propertyId = $row['maxx'];

                $sql = "INSERT INTO flat (Flat_no, Appartment_Name, Level, Rooms, Property_Property_id)
                VALUES (?,?,?,?,?)";
                
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../AddProperty.php?error=sqlerror2flat");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssss", $flat_num, $appartment, $manzil, $rooms, $propertyId);
                    mysqli_stmt_execute($stmt);
                }            
            }
        }
    }
    if ($property_type == "Plot")
    {
        $sql = "SELECT Plot_no FROM plot WHERE Plot_no = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../AddProperty.php?error=sqlerrorplot");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $plot_num);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                header("Location: ../AddProperty.php?error=propertyalreadyexist");
                exit();
            }
            else
            {
                $sql = "INSERT INTO property (Size, Description, Price, User_User_id, Location_Location_id) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../AddProperty.php?error=sqlerror1plot");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssss", $size, $description, $price, $_SESSION['user_id'], $locationId);
                    mysqli_stmt_execute($stmt);
                    
                }
                $sql1 = "SELECT MAX(Property_id) as maxx FROM property";
                $sql = mysqli_query($conn,$sql1);
                $row = mysqli_fetch_array($sql);
                $propertyId = $row['maxx'];
                $sql = "INSERT INTO plot (Plot_no, Property_Property_id, Society_Name)
                VALUES (?,?,?)";
                
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../AddProperty.php?error=sqlerror2plot");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sss", $plot_num, $propertyId, $society);
                    mysqli_stmt_execute($stmt);
                }            
            }
        }
    }
    header("Location: ../AddProperty.php?sahichala");
}
else
{
    header("Location: ../AddProperty.php?sahisebharo");
}