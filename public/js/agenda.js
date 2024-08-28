document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        businessHours: [
            // Horario de lunes a sábado
            {
                daysOfWeek: [1, 2, 3, 4, 5, 6], // Lunes a Sábado
                startTime: '08:00:00',
                endTime: '20:00:00'
            },
            // Horario de domingo
            {
                daysOfWeek: [0], // Domingo
                startTime: '08:00:00',
                endTime: '12:30:00'
            }
        ],
        dateClick: function(info) {
            // Mostrar modal solo si la fecha no está en horario laboral
            const isBusinessHour = (info.date.getDay() === 0 && info.date.getHours() >= 8 && info.date.getHours() < 12) || 
                                   (info.date.getDay() > 0 && info.date.getDay() < 6 && info.date.getHours() >= 8 && info.date.getHours() < 20);
            if (isBusinessHour) {
                $("#evento").modal("show");
            } else {
                alert("Esta hora está fuera del horario laboral.");
            }
        },
        views: {
            dayGridMonth: {
                businessHours: true // Mostrar horarios laborales en la vista mensual
            },
            timeGridWeek: {
                businessHours: true // Mostrar horarios laborales en la vista semanal
            },
            listWeek: {
                businessHours: true // Mostrar horarios laborales en la vista de lista
            }
        },
        events: function(fetchInfo, successCallback, failureCallback) {
            fetch('/citas')
                .then(response => response.json())
                .then(data => successCallback(data))
                .catch(error => failureCallback(error));
        }
    });
    calendar.render();
});
