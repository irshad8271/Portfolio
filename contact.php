<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Set the recipient email address (Update this if needed)
    $to = "irshadalam@829231gmail.com"; 

    // 2. Collect and sanitize form data
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Basic validation
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Redirect to index.html with an error status
        header("Location: index.html?status=error&message=Invalid form submission. Please fill all fields correctly.");
        exit;
    }

    // 3. Email content setup
    $subject = "New Contact Form Message from " . $name;
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // 4. Email headers
    // Set the Reply-To header so you can reply directly to the sender
    $headers = "From: New Portfolio Message <noreply@yourdomain.com>\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // 5. Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Success
        header("Location: index.html?status=success&message=Thank you! Your message has been sent.");
    } else {
        // Failure
        header("Location: index.html?status=error&message=Oops! Something went wrong and we couldn't send your message.");
    }

} else {
    // Not a POST request, redirect to the home page.
    header("Location: index.html");
}

exit;
?>