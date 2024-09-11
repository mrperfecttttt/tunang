<?php
// Function to generate and serve Apple Calendar (ICS file)
function generateAppleCalendarICS() {
    $eventStart = '20240501T100000Z'; // Replace with your event start time in UTC (Ymd\THis\Z)
    $eventEnd = '20240501T140000Z';   // Replace with your event end time in UTC (Ymd\THis\Z)
    $eventName = "Majlis Perkahwinan Fikri & Syahirah";
    $eventDescription = "You're invited to the wedding event of Fikri & Syahirah!";
    $eventLocation = "Wedding Venue, Kuala Lumpur, Malaysia";

    $icsContent = "BEGIN:VCALENDAR\n";
    $icsContent .= "VERSION:2.0\n";
    $icsContent .= "CALSCALE:GREGORIAN\n";
    $icsContent .= "BEGIN:VEVENT\n";
    $icsContent .= "DTSTART:$eventStart\n";
    $icsContent .= "DTEND:$eventEnd\n";
    $icsContent .= "SUMMARY:" . $eventName . "\n";
    $icsContent .= "DESCRIPTION:" . $eventDescription . "\n";
    $icsContent .= "LOCATION:" . $eventLocation . "\n";
    $icsContent .= "END:VEVENT\n";
    $icsContent .= "END:VCALENDAR\n";

    header('Content-type: text/calendar; charset=utf-8');
    header('Content-Disposition: attachment; filename="wedding_event.ics"');
    echo $icsContent;
    exit;
}

// Call the function to generate and download the ICS file
generateAppleCalendarICS();
?>
