<?php
// Formular Variablen
$varFirstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$varLastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$varEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$varPhonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
$varEvent = filter_input(INPUT_POST, 'event', FILTER_SANITIZE_STRING);
$varMessage = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$varHoneypot = filter_input(INPUT_POST, 'honeypot', FILTER_SANITIZE_STRING);

// PHP Variablen
$to_email = "music@2tune2.ch";

// Check for Honeypot
if (!empty($varHoneypot)) {
   die("Bot detected!");
}

// Basic input validation
if (
    filter_var($varEmail, FILTER_VALIDATE_EMAIL) &&
    !empty($varFirstname) &&
    !empty($varLastname) &&
    !empty($varEmail) &&
    !empty($varMessage)
) {
    // Mail senden
    $subject = "2Tune2 Eventanfrage: " . $varEvent;
    $message = "Nachricht von: " . $varFirstname . " " . $varLastname . "\r\n" . "Telefonnummer: " . $varPhonenumber . "\r\n" . "Nachricht: " . $varMessage;
    $headers = "From: " . $varEmail . "\r\n" .
               "MIME-Version: 1.0\r\n" .
               "Content-Type: text/plain; charset=utf-8\r\n";

    // Send mail
    mail($to_email, $subject, $message, $headers);
}

// Redirect after submission
header("Location: https://2tune2.ch/#contact");
?>
