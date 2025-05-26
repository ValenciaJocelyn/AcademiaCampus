// Toggle Reminder/Event
const typeButtons = document.querySelectorAll('.type-toggle button');
typeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
    typeButtons.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    });
});

// Optional: Tabs logic
const tabs = document.querySelectorAll('.tabs .tab');
tabs.forEach(tab => {
    tab.addEventListener('click', () => {
    tabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    });
});

document.getElementById("submit-event").addEventListener("click", function () {
const title = document.getElementById("event-title").value;
const date = document.getElementById("event-date").value;
const color = document.getElementById("event-color").value;

if (!title || !date) {
    alert("Please fill in title and date.");
    return;
}

// Dapatkan tanggal (misalnya '2025-05-07') dan ambil hanya tanggal
const eventDate = parseInt(date.split("-")[2], 10);

// Cari elemen dengan class "day" yang punya <span class="date">7</span> misalnya
const days = document.querySelectorAll(".calendar-grid .day");

for (const day of days) {
    const span = day.querySelector(".date");
    if (span && parseInt(span.textContent, 10) === eventDate) {
    const eventEl = document.createElement("div");
    eventEl.classList.add("event", color);
    eventEl.textContent = title;
    day.appendChild(eventEl);
    break;
    }
}

// Reset form
document.getElementById("event-title").value = "";
document.getElementById("event-date").value = "";
});

function addEventToCalendar() {
    const title = document.getElementById('event-title').value.trim();
    const from = document.getElementById('event-from').value;
    const to = document.getElementById('event-to').value;
    const date = document.getElementById('event-date').value;

    if (!title || !from || !to || !date) {
      alert('Please fill out all fields');
      return;
    }

    // Ambil tanggal (misalnya 2025-06-03), lalu ambil bagian tanggalnya saja (3)
    const dateObj = new Date(date);
    const day = dateObj.getDate();

    // Cari elemen .day yang memiliki span.date dengan angka yang sesuai
    const days = document.querySelectorAll('.calendar-grid .day');
    for (let i = 0; i < days.length; i++) {
      const daySpan = days[i].querySelector('.date');
      if (daySpan && parseInt(daySpan.textContent) === day) {
        const eventDiv = document.createElement('div');
        eventDiv.className = 'event red';
        eventDiv.innerHTML = `${title}<br>${from} - ${to}`;
        days[i].appendChild(eventDiv);
        break;
      }
    }

    // Bersihkan form
    document.getElementById('event-title').value = '';
    document.getElementById('event-from').value = '';
    document.getElementById('event-to').value = '';
    document.getElementById('event-date').value = '';
  }


  //Delete Button
    function addEventToCalendar() {
    const title = document.getElementById('event-title').value.trim();
    const from = document.getElementById('event-from').value;
    const to = document.getElementById('event-to').value;
    const date = document.getElementById('event-date').value;

    if (!title || !from || !to || !date) {
      alert('Please fill out all fields');
      return;
    }

    const dateObj = new Date(date);
    const day = dateObj.getDate();

    const days = document.querySelectorAll('.calendar-grid .day');
    for (let i = 0; i < days.length; i++) {
      const daySpan = days[i].querySelector('.date');
      if (daySpan && parseInt(daySpan.textContent) === day) {
        // Buat div event baru
        const eventDiv = document.createElement('div');
        eventDiv.className = 'event red'; // bisa kamu ubah warna sesuai kebutuhan

        eventDiv.innerHTML = `
          ${title}<br>${from} - ${to}
          <span class="delete-btn" title="Delete event">&times;</span>
        `;

        // Pasang event listener delete
        eventDiv.querySelector('.delete-btn').addEventListener('click', function(e) {
          e.stopPropagation(); // biar gak n-trigger event lain kalau ada
          if(confirm('Are you sure you want to delete this event?')) {
            eventDiv.remove();
          }
        });

        days[i].appendChild(eventDiv);
        break;
      }
    }

    // Clear form inputs
    document.getElementById('event-title').value = '';
    document.getElementById('event-from').value = '';
    document.getElementById('event-to').value = '';
    document.getElementById('event-date').value = '';
}
