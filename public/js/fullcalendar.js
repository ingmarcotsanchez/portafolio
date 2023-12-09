
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    headerToolbar: { 
        start: 'multiMonthYear,dayGridMonth,dayGridWeek,timeGridDay',
        center: 'title' ,
        end: 'today prev,next'
    },
    buttonText:{
        today: 'Hoy',
        year: 'Año',
        month: 'Mes',
        week: 'Semana',
        day: 'Día'
    },
    hiddenDays: [ 0 ],
    events: '/Portafolio/controller/reserva.php?opc=mostrar',
    /*[
        {
            title: '',
            start: '',
            end:'',
            color:'',
        }
    ]*/
    
});
calendar.render();
});

