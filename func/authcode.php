<?php

session_start();
require_once "../config/dbconfig.php";
require_once "helper.php";
if (isset($_POST['regis_btn']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['confirmPass']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);

    if ($password === $cpassword)
    {
        // check email already exists
        $email_query = "SELECT * FROM users WHERE email='$email'";
        $email_query_run = mysqli_query($conn, $email_query);
        if (mysqli_num_rows($email_query_run) > 0)
        {
            redirect('../register.php', 'Email Already Exists. Please Try Another Email');}
       


        $query = "INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
        $query_run = mysqli_query($conn, $query);

        

        if ($query_run)
        {
            // echo "Saved";
            $_SESSION['success'] = "Login Successfully";
            header('Location: ../login.php');
        }
        else
        {
            redirect('../register.php', 'Something Went Wrong. Please Try Again');
        }
    }
    else
    {
        redirect('../register.php', 'Password and Confirm Password Does Not Match');
    }
}
else if (isset($_POST['login-btn']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    // check email already exists
    $email_query = "SELECT * FROM users WHERE email='$email'";
    $email_query_run = mysqli_query($conn, $email_query);
    if (mysqli_num_rows($email_query_run) > 0)
    {
        // check pass
        $password_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $password_query_run = mysqli_query($conn, $password_query);
        if (mysqli_num_rows($password_query_run) > 0)
        {
            // login success
            $_SESSION['auth'] = true;
            $row = mysqli_fetch_assoc($password_query_run);
            $name = $row['name'];
            $role_as = $row['role_as'];

            $_SESSION['auth_user'] =
            ['name' => $name,
            'email' => $email,
            'role_as' => $role_as    
        ];

        if ($role_as == 1)
        {
            $_SESSION['success'] = "Welcome to Dashboard";
            header('Location: ../admin/index.php');
            return;
        }
        else {
            $_SESSION['success'] = "User Login Successfully";
            header('Location: ../index.php');
            return;
        }}
        else
        {
            redirect('../login.php', 'Password Does Not Match');
        }
    }
    else 
    {
        redirect('../login.php', 'Email Does Not Exists');
        
        return;
    }
}