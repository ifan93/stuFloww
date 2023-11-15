
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Your email address
    $to = "irfandaniel8615@gmail.com";

    // Subject and headers
    $subject = "New Form Submission";
    $headers = "From: $email";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Send the email
    $mailSent=mail($to, $subject, $email_message, $headers);

    if ($mailSent) {
        // Redirect to a thank you page or wherever you want after successful submission
        echo "<script>alert('message has been sent'); window.location.href='../contactUs.html';</script>";
        exit;
    } else {
        // Handle the case where the email failed to send
        echo "Error: Unable to send the email.";
    }
}
?>