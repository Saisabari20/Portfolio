<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['fullname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Error: Invalid email format.</p>";
        exit;
    }

    $to = "saisabari.leadersdesk@gmail.com";
    $subject = "New message from Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "<p>Error: Message could not be sent. Please try again later.</p>";
    }
} else {
    echo "<p>No form data received. Please try submitting the form again.</p>";
}
?>
