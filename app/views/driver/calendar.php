<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='/thoga.lk/public/fullcalendarlib/main.css' rel='stylesheet' />
<script src='/thoga.lk/public/fullcalendarlib/main.js'></script>
<script>
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialDate: '2020-09-21',//today,
      navLinks: false, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = 'Unavailable';
        var go=confirm('Are you sure to make unavailable?');
        type='a';
        var tt= type=='a'?'#d00000':'';
        if (go) {
          calendar.addEvent({
            title: title,
            color: tt,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },
      editable: true,
      height: '100%',
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'Order #12',
          start: '2020-09-01'
        },
        {
          title: 'Unavailable',
          start: '2020-09-07',
          end: '2020-09-10',
          color: '#d00000'
        },
        {
          groupId: 999,
          title: 'Unavailable',
          start: '2020-09-16',
          color: '#d00000'
          
        },
        {
          title: 'order #14',
          start: '2020-09-11',
          end: '2020-09-11'
        },
        {
          title: 'Order #15',
          start: '2020-09-13'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-28'
        }
      ],
    });

    calendar.render();
  });

</script>
<style>

  body {
    /* margin: 40px 10px; */
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    width: 50%;
    /* height: auto; */
    max-width: 1100px;
    margin: 0 auto;
    padding:5px;
    border: 3px black solid;
  }

  .fc-event{
    height: 25px;
  }



@media only screen and (max-width:820px) {
    /* For mobile phones: */
    #calendar{
  width:100%;
}
} 
</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
