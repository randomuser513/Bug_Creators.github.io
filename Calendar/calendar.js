document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var rsvpButton = document.getElementById('rsvpButton'); // Retrieve the RSVP button

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    eventTimeFormat: {
      hour: 'numeric',
      minute: '2-digit',
      meridiem: 'short'
    },
    events: [
      {
        id: 'event1',
        title: 'Upcycling Workshop Part 1',
        start: '2023-09-01T10:00:00',
        end: '2023-09-01T14:00:00',
        description: 'Learn upcycling techniques from experts!',
        location: 'Virtual (Zoom)',
        instructor: 'Christian Tan',
      },
      {
        id: 'event2',
        title: 'Upcycling Workshop Part 2',
        start: '2023-09-10T13:30:00',
        end: '2023-09-10T17:30:00',
        description: 'Learn upcycling techniques from expert, Lily.',
        location: 'Virtual (Zoom)',
        instructor: 'Lily Quek',
      },
      {
        id: 'event3',
        title: 'Colour Theory Workshop',
        start: '2023-09-07T11:00:00',
        end: '2023-09-07T13:00:00',
        description: 'Learn the basics of colour theory!',
        location: 'Virtual (Zoom)',
        instructor: 'Avery Quek',
      },
      {
        id: 'event4',
        title: 'DIY Home Decor Class',
        start: '2023-08-28T09:30:00',
        end: '2023-08-28T12:30:00',
        description: 'Learn how to create DIY Home Decor with upcycling.',
        location: 'Virtual (Zoom)',
        instructor: 'Kelly Kok',
      },
      {
        id: 'event5',
        title: 'Stitching Workshop',
        start: '2023-08-30T14:00:00',
        end: '2023-08-30T16:00:00',
        description: 'Learn basic stitching techniques',
        location: 'Virtual (Zoom)',
        instructor: 'May Lee',
      },
    ],
    eventClick: function(info) {
      var title = info.event.title;
      var start = info.event.start.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' });
      var end = info.event.end.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit', meridiem: 'short' });
      var location = info.event.extendedProps.location;
      var instructor = info.event.extendedProps.instructor;
      var description = info.event.extendedProps.description;

      var eventDetails = `
        <h5>${title}</h5>
        <p><strong>Time:</strong> ${start} - ${end}</p>
        <p><strong>Location:</strong> ${location}</p>
        <p><strong>Instructor:</strong> ${instructor}</p>
        <p>${description}</p>
      `;

      document.querySelector('#eventDetails').innerHTML = eventDetails;

      // Show modal
      $('#eventModal').modal('show');

      // Store the event's unique ID as a data attribute in the RSVP button
      rsvpButton.dataset.eventUniqueId = info.event.id;
    }
  });

  rsvpButton.addEventListener('click', function() {
    var eventUniqueId = rsvpButton.dataset.eventUniqueId;
    var event = calendar.getEventById(eventUniqueId);
    var title = event.title;
    var eventDatetime = moment(event.start).format("YYYY-MM-DD HH:mm:ss");

    var userUID = prompt("To confirm your registration, please enter your UserID:");
    if (userUID === null || userUID === "") {
      return; // User canceled or didn't provide a UID
    }
  
    // Make an AJAX request to insert RSVP data into the database
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert('You have successfully RSVPed to the event: ' + title);
        $('#eventModal').modal('hide');
      }
    };
    xhttp.open("POST", "rsvp.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("uid=" + userUID + "&event_name=" + title + "&event_datetime=" + eventDatetime);
  });

  calendar.render();
});
