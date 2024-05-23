<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    // Send email to bookstore's contact email address
    $to = "info@examplebookstore.com";
    $subject = "New Contact Form Submission: " . $subject;
    $body = "From: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your message has been sent successfully! We will get back to you soon.'); window.location.href = 'contact.html';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again later.'); window.location.href = 'contact.html';</script>";
    }
} else {
    header("Location: contact.html");
}
?>
