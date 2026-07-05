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

if (isset($_POST['login'])) {

    // Process login logic here
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Add your login logic here
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        header("Location: /novusblog/overview.php");
        $success = "Login successful. Redirecting to dashboard...";
        exit();
    } else {
        // Show error message for invalid credentials
        $error = "Invalid email or password. Please try again.";
        // }
    }
}






//ADD CATEGORY PROCESS
if (isset($_POST['add_category'])) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $category_name = $_POST['category_name'];

    //Check if category already exists
    $check_category_query = "SELECT * FROM categories WHERE name = '$category_name'";
    $check_category_result = mysqli_query($conn, $check_category_query);

    if (mysqli_fetch_assoc($check_category_result)) {
        $error = "Category already exists. Please use a different category name.";
    } else {
        // Add your category addition logic here
        $sql = "INSERT INTO categories (name) VALUES ('$category_name')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            $success = "Category added successfully.";
        } else {
            $error = "Error adding category. Please try again.";
        }
    }
}

//DELETE CATEGORY PROCESS
if (isset($_GET['delete_category'])) {
    $category_id = $_GET['delete_category'];
    $delete_category_query = "DELETE FROM categories WHERE id = '$category_id'";
    $delete_category_result = mysqli_query($conn, $delete_category_query);

        if ($delete_category_result) {
            $success = "Category deleted successfully.";
            // exit();
        } else {
            $error = "Error deleting category. Please try again.";
            // exit();
        }
}

//EDIT CATEGORY PROCESS
if (isset($_POST['edit_category'])) {
    $category_id = $_GET['edit_category'];
    $edited_category_name = $_POST['edited_category_name'];

    // Check if the category name already exists
    $check_category_query = "SELECT * FROM categories WHERE name = '$edited_category_name' AND id != '$category_id'";
    $check_category_result = mysqli_query($conn, $check_category_query);

    if (mysqli_fetch_assoc($check_category_result)) {
        $error = "Category name already exists. Please use a different name.";
    } else {
        // Update the category in the database
        $update_category_query = "UPDATE categories SET name = '$edited_category_name' WHERE id = '$category_id'";
        $update_category_result = mysqli_query($conn, $update_category_query);

        if ($update_category_result) {
            $success = "Category updated successfully.";
            // Redirect to categories.php after successful update
            header("Location: categories.php");
            exit();
        } else {
            $error = "Error updating category. Please try again.";
        }
    }
}


//ADD POST PROCESS
if (isset($_POST['add_post'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}




















?>