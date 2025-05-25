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