<?php
if (isset($_POST['signup']))
{
    include_once 'dbhandler.php';

    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $cnic = mysqli_real_escape_string($conn,$_POST['cnic']);
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $phno = mysqli_real_escape_string($conn,$_POST['pnumber']);
    $pwd = mysqli_real_escape_string($conn,$_POST['Password']);
    $rpwd = mysqli_real_escape_string($conn,$_POST['RPassword']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);


    if (!preg_match("/^[0-9]{5}-[0-9]{7}-[0-9]*$/", $cnic) && !preg_match("/^[a-zA-Z]*$/", $fname) && !preg_match("/^[a-zA-Z]*$/", $lname) && !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../register.html?error=invalidmailfirstnamelastnamecnic");
        exit();
    }
    elseif (!preg_match("/^[0-9]{5}-[0-9]{7}-[0-9]*$/", $cnic))
    {
        header("Location: ../register.html?error=invalidcnic&mail=".$email."&firstname=".$fname."&lastname=".$lname);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../register.html?error=invalidmail&fname=".$fname."&lastname=".$lname."&cnic=".$cnic);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $fname))
    {
        header("Location: ../register.html?error=invalidfirstname&mail=".$email."&lastname=".$lname."&cnic=".$cnic);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $lname))
    {
        header("Location: ../register.html?error=invalidlastname&mail=".$email."&firstname=".$fname."&cnic=".$cnic);
        exit();
    }
    elseif (!preg_match("/^[0-9]*$/", $phno))
    {
        header("Location: ../register.html?error=invalidcontactnumber&mail=".$email."&firstname=".$fname."&lastname=".$lname."&cnic=".$cnic);
        exit();
    }
    elseif ($type != 1 && $type !=2)
    {
        header("Location: ../register.html?error=typenotselected&mail=".$email."&firstname=".$fname."&lastname=".$lname."&cnic=".$cnic);
        exit();
    }
    elseif ($pwd !== $rpwd)
    {
        header("Location: ../register.html?error=passwordcheck&mail=".$email."&firstname=".$fname."&lastname=".$lname."&cnic=".$cnic);
        exit();
    }
    else
    {
        $sql = "SELECT User_CNIC, User_Type FROM user WHERE User_CNIC = ? AND User_Type = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../register.html?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $cnic, $type);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0)
            {
                header("Location: ../register.html?error=useralreadyexist");
                exit();
            }
            else
            {
                $sql = "INSERT INTO user (First_Name, Last_Name, User_email, User_CNIC, User_Contact, User_Password, User_Type)
                VALUES (?,?,?,?,?,?,?)";
                
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../register.html?error=sqlerror1");
                    exit();
                }
                else
                {
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssss", $fname, $lname, $email, $cnic, $phno, $hashedpwd, $type);
                    mysqli_stmt_execute($stmt);
                }            
            }
        }
    }
    $len = strlen($hashedpwd);
    header("Location: ../login.html?signup=success&".$len);
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../register.html");
}