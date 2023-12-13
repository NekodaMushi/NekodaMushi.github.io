<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($subject) || empty($message)) {
        echo "Please complete the form and try again.";
        exit;
    }

    $recipient = "official.fabien@gmail.com"; // REPLACE with your email address
    $headers = "From: $name <$email>";

    if (mail($recipient, $subject, $message, $headers)) {
        echo "Email sent"; // Message displayed on successful email sending
    } else {
        echo "Oops! Something went wrong, we couldn't send your message.";
    }
} else {
    echo "The form action property is not set!";
}
?>

