<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "tingahire@gmail.com";
    $headers = "From: no-reply@tingahire.com\r\n";
    $headers .= "Reply-To: tingahire@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    /* =========================
       NEWSLETTER FORM
    ========================== */
    if (isset($_POST["email"]) && !isset($_POST["message"])) {

        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address.";
            exit;
        }

        $subject = "New Newsletter Subscription - Tinga Hire";
        $message = "New newsletter subscription:\n\nEmail: $email";

        mail($to, $subject, $message, $headers);
        echo "Thank you for subscribing!";
        exit;
    }

    /* =========================
       CONTACT FORM
    ========================== */
    if (isset($_POST["name"]) && isset($_POST["message"])) {

        $name    = htmlspecialchars($_POST["name"]);
        $email   = htmlspecialchars($_POST["email"]);
        $subject = htmlspecialchars($_POST["subject"]);
        $msg     = htmlspecialchars($_POST["message"]);

        $emailSubject = "Contact Form Message - Tinga Hire";
        $emailBody = "
New Contact Message

Name: $name
Email: $email
Subject: $subject

Message:
$msg
        ";

        mail($to, $emailSubject, $emailBody, $headers);
        echo "Message sent successfully!";
        exit;
    }

}
?>
