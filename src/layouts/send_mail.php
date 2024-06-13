<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];

    // Send email
    $to = "pathanayan9457@gmail.com"; // Your email address where you want to receive messages
    $subject = "New Application Submission";
    $message = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Comments:\n$comments\n
    ";

    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your application!";
    } else {
        echo "Oops! Something went wrong.";
    }
} else {
    // Not a POST request, redirect or handle as needed
    echo "Method not allowed.";
}
?>
