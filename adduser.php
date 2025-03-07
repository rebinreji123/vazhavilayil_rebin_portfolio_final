<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Database connection details
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'user_form_db'; // Change to match your database name

// Connect to the database
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$connection) {
    die(json_encode(["errors" => ["Database connection failed: " . mysqli_connect_error()]]));
}

// Initialize errors array
$errors = [];

// Retrieve and sanitize form data
$fname = mysqli_real_escape_string($connection, $_POST['fname'] ?? '');
$lname = mysqli_real_escape_string($connection, $_POST['lname'] ?? '');
$email = $_POST['email'] ?? '';
$message = mysqli_real_escape_string($connection, $_POST['city'] ?? ''); // Using 'city' as 'message'

// Validate form data
if (empty($fname)) {
    $errors[] = "First name is required.";
}
if (empty($lname)) {
    $errors[] = "Last name is required.";
}
if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "\"" . $email . "\" is not a valid email address.";
}
if (empty($message)) {
    $errors[] = "Message is required.";
}

// If there are errors, return them
if (!empty($errors)) {
    echo json_encode(["errors" => $errors]);
    exit;
}

// Insert data into the database
$querystring = "INSERT INTO contact (first_name, last_name, email, message) VALUES ('$fname', '$lname', '$email', '$message')";
$result = mysqli_query($connection, $querystring);

if ($result) {
    echo json_encode(["message" => "Form submitted. Thank you for your interest!"]);
} else {
    echo json_encode(["errors" => ["Failed to submit the form. Please try again later."]]);
}

// Close the database connection
mysqli_close($connection);
?>