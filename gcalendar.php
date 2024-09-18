<?php
// Function to generate Google Calendar URL
function generateGoogleCalendarUrl() {
    $eventStart = '20250404T030000Z';  // Replace with your event start time in UTC (Ymd\THis\Z)
    $eventEnd = '20250404T060000Z';    // Replace with your event end time in UTC (Ymd\THis\Z)
    $eventName = urlencode("Majlis Perkahwinan Fikri & Syahirah");
    $eventDescription = urlencode("You're invited to the wedding event of Fikri & Syahirah!");
    $eventLocation = urlencode("Wedding Venue, Kuala Lumpur, Malaysia");

    $googleCalendarUrl = "https://www.google.com/calendar/render?action=TEMPLATE";
    $googleCalendarUrl .= "&text=$eventName";
    $googleCalendarUrl .= "&dates=$eventStart/$eventEnd";
    $googleCalendarUrl .= "&details=$eventDescription";
    $googleCalendarUrl .= "&location=$eventLocation";
    $googleCalendarUrl .= "&sf=true&output=xml";

    return $googleCalendarUrl;
}
?>
