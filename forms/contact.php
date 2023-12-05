<?php
  $receiving_email_address = 'abdul-mooinishaq21@gmail.com';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $name = $email = $subject = $message = "";
    $error = "";

    // Validate name
    if (empty($_POST["name"])) {
        $error .= "Name is required. ";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $error .= "Only letters and white space allowed in the name field. ";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $error .= "Email is required. ";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= "Invalid email format. ";
        }
    }

    // Validate subject
    if (empty($_POST["subject"])) {
        $error .= "Subject is required. ";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    // Validate message
    if (empty($_POST["message"])) {
        $error .= "Message is required. ";
    } else {
        $message = test_input($_POST["message"]);
    }

    if (empty($error)) {
        // If there are no validation errors, you can proceed with further processing (e.g., sending emails, saving to a database)
        // For demonstration purposes, we'll just print a success message
        echo "Your message has been successfully submitted. Thank you!";
    } else {
        // If there are validation errors, print the error message
        echo "Validation Error: " . $error;
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
