<?php
if (isset($_POST['login']))
{
    include_once 'dbhandler.php';

    $cnic = mysqli_real_escape_string($conn,$_POST['cnic']);
    $pwd = mysqli_real_escape_string($conn,$_POST['Password']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);

    if (!preg_match("/^[0-9]{5}-[0-9]{7}-[0-9]*$/", $cnic))
    {
        header("Location: ../login.html?error=invalidcnic");
        exit();
    }
    elseif ($type != 1 && $type !=2)
    {
        header("Location: ../login.html?error=typenotselected&cnic=".$cnic);
        exit();
    }
    else
    {
        $sql = "SELECT * FROM user WHERE User_CNIC = ? AND User_Type = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../login.html?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $cnic, $type);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdcheck = password_verify($pwd, $row['User_Password']);
                if ($pwdcheck == false)
                {
                    header("Location: ../login.html?error=wrongpassword?og");
                    exit();
                }
                elseif ($pwdcheck == true)
                {
                    session_start();
                    $_SESSION['user_id'] = $row['User_id'];
                    $_SESSION['fname'] = $row['First_Name'];
                    $_SESSION['lname'] = $row['Last_Name'];
                    $_SESSION['email'] = $row['User_email'];
                    $_SESSION['cnic'] = $row['User_CNIC'];
                    $_SESSION['phno'] = $row['User_Contact'];
                    $_SESSION['type'] = $row['User_Type'];

                    if ($type == 1)
                    {
                        header("Location: ../index_seller.php?login=success");
                    }
                    elseif ($type == 2)
                    {
                        header("Location: ../index_buyer.php?login=success");
                    }
                }
                else
                {
                    header("Location: ../login.html?error=wrongpassword");
                    exit();
                }
            }
            else
            {
                header("Location: ../login.html?error=usernotexist");
                exit();           
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../login.html?sahisebharo");
}