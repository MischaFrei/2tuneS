
<?php
// Formular Variablen
$varFirstname = $_POST['firstname'];
$varLastname = $_POST['lastname'];
$varEmail = $_POST['email'];
$varPhonenumber = $_POST['phonenumber'];
$varEvent = $_POST['event'];
$varMessage = $_POST['message'];    


// Funktionen
// wordwrap ( string $str [, int $width = 50 [, string $break = "\r\n" [, bool $cut = FALSE ]]] ) : string

// PHP Variablen
$to_email = "music@2tune2.ch";
// $processedMessage = wordwrap($varMessage);


if (filter_var($varEmail, FILTER_VALIDATE_EMAIL)) {
      // Mail senden
   if((!empty($_POST['firstname']))
   && (!empty($_POST['lastname']))
   && (!empty($_POST['email']))
   && (!empty($_POST['message']))) {
   mail($to_email, // An 2tune2
   "2Tune2 Eventanfrage: ".$varEvent, // Betreff
   "Nachricht von: ".$varFirstname." ".$varLastname."\r\n"."Telefonnummer: ".$varPhonenumber."\r\n"."Nachricht: ".$varMessage, // Nachricht
   "From: " . $varEmail); // Absender
   }
}



header("Location: https://2tune2.ch/#contact");
?>



