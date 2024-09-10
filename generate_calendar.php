<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $attendance = htmlspecialchars($_POST['attendance']);
    $pax = isset($_POST['pax']) ? (int)$_POST['pax'] : 1;

    // Event details
    $eventStart = '20240501T100000Z';  // Replace with your event start time in UTC (Ymd\THis\Z)
    $eventEnd = '20240501T140000Z';    // Replace with your event end time in UTC (Ymd\THis\Z)
    $eventName = "Majlis Perkahwinan Fikri & Syahirah";
    $eventDescription = "You're invited to the wedding event of Fikri & Syahirah!";
    $eventLocation = "Wedding Venue, Kuala Lumpur, Malaysia";

    // Generate iCalendar (ICS) content
    $icsContent = "BEGIN:VCALENDAR\r\n";
    $icsContent .= "VERSION:2.0\r\n";
    $icsContent .= "PRODID:-//YourDomain//Event//EN\r\n";
    $icsContent .= "BEGIN:VEVENT\r\n";
    $icsContent .= "UID:" . uniqid() . "@yourdomain.com\r\n";
    $icsContent .= "DTSTAMP:" . gmdate('Ymd\THis\Z') . "\r\n";
    $icsContent .= "DTSTART:$eventStart\r\n";
    $icsContent .= "DTEND:$eventEnd\r\n";
    $icsContent .= "SUMMARY:$eventName\r\n";
    $icsContent .= "DESCRIPTION:$eventDescription\r\n";
    $icsContent .= "LOCATION:$eventLocation\r\n";
    $icsContent .= "END:VEVENT\r\n";
    $icsContent .= "END:VCALENDAR\r\n";

    // Set headers to force download of the ICS file
    header('Content-type: text/calendar; charset=utf-8');
    header('Content-Disposition: attachment; filename=event.ics');
    echo $icsContent;
}
?>
