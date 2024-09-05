<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['nama']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $attendance = htmlspecialchars($_POST['attendance']);
    $pax = isset($_POST['pax']) ? (int)$_POST['pax'] : 1;

    $to = $email;
    $subject = "Confirmation of Attendance";
    $message = "Dear $name,\n\nThank you for confirming your attendance at our wedding.\n\n";
    $message .= "Details:\n";
    $message .= "Phone: $phone\n";
    $message .= "Attendance: " . ($attendance == 'yes' ? "Yes, with $pax guest(s)" : "No") . "\n\n";
    $message .= "Looking forward to seeing you there!\n\nBest Regards,\nFikri & Syahirah";
    
    $headers = "From: no-reply@yourdomain.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Confirmation email sent to $email.";
    } else {
        echo "Failed to send confirmation email.";
    }
} else {
    echo "Invalid request method.";
}
?>