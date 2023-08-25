document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      eventTimeFormat: {
        hour: 'numeric',
        minute: '2-digit',
        meridiem: 'short'
      },
      events: [
        {
          title: 'Upcycling Workshop Part 1',
          start: '2023-09-01T10:00:00',
          end: '2023-09-01T14:00:00',
          description: 'Learn upcycling techniques from expert, Christian.',
          location: 'Virtual (Zoom)',
          instructor: 'Christian Tan',
        },
        {
          title: 'Upcycling Workshop Part 2',
          start: '2023-09-10T13:30:00',
          end: '2023-09-10T17:30:00',
          description: 'Learn upcycling techniques from expert, Lily.',
          location: 'Virtual (Zoom)',
          instructor: 'Lily Quek',
        },
        {
          title: 'Colour Theory Workshop',
          start: '2023-08-25T11:00:00',
          end: '2023-08-25T13:00:00',
          description: 'Learn the basics of colour theory!',
          location: 'Virtual (Zoom)',
          instructor: 'Tan Ah Li',
        },
        {
          title: 'DIY Home Decor Class',
          start: '2023-08-28T09:30:00',
          end: '2023-08-28T12:30:00',
          description: 'Learn how to create DIY Home Decor with upcycling.',
          location: 'Virtual (Zoom)',
          instructor: 'Kelly Kok',
        },
        {
          title: 'Stitching Workshop',
          start: '2023-08-30T14:00:00',
          end: '2023-08-30T16:00:00',
          description: 'Learn basic stitching techniques',
          location: 'Virtual (Zoom)',
          instructor: 'May Lee',
        }
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

        // Show the modal
        $('#eventModal').modal('show');

        // Attach an event listener to the RSVP button
        document.getElementById('rsvpButton').addEventListener('click', function() {
          // Perform RSVP action here (e.g., show a confirmation message)
          alert('You have successfully RSVPed to the event: ' + title);
          $('#eventModal').modal('hide'); // Close the modal after RSVP
        });
      }
    });
    
    calendar.render();
  });
  