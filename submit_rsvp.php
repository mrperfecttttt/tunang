<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $attendance = $_POST['attendance'];
    $pax = isset($_POST['pax']) ? $_POST['pax'] : NULL;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO rsvp (nama, phone, email, attendance, pax) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nama, $phone, $email, $attendance, $pax);

    // Execute the statement
    if ($stmt->execute()) {
        echo "RSVP submitted successfully!";
        // Optionally, redirect to a thank you page
        header("Location: thank_you.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
