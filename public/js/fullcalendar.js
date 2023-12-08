
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('contact-content');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth'
});
calendar.render();
});

