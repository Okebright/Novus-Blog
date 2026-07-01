<?php
require "inc/header.php";

//REGISTRATION PROCESS

if (isset($_POST['register'])) {
    // Process registration logic here
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Add your registration logic here
    if ($password === $confirm_password) {
        //confirm password matches, proceed with registration
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        //check if email already exists
        $check_email_query = "SELECT * FROM users WHERE email = '$email'";
        $check_email_result = mysqli_query($conn, $check_email_query);

        if (mysqli_fetch_assoc($check_email_result)) {
            $error = "Email already exists. Please use a different email.";
            // echo $error;
        } else {
            // Save user to database
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$encrypted_password')";
            $query = mysqli_query($conn, $sql);
            $success = "Registration successful";
            // echo $success;
            // Redirect or show success message
        }
    } else {
        // Show error message for password mismatch
        $error = "Unmatched passwords. Please try again.";
        // echo $error;
    }
}

//LOGIN PROCESS


?>
