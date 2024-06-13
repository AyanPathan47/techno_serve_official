<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toEmail = "pathanayan9457@gmail.com";
    $subject = "New Contact Form Submission";

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $resume = $_FILES["resume"]["name"];
    $tmpName = $_FILES["resume"]["tmp_name"];

    $message = "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Email: $email\n";

    $headers = "From: $email";

    if (mail($toEmail, $subject, $message, $headers)) {
        move_uploaded_file($tmpName, "resumes/$resume"); // Save resume to server
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Error: Method not allowed.";
}
?>
