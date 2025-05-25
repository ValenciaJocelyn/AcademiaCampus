// Navigasi aktif
document.querySelectorAll('.nav-item').forEach(item => {
  item.addEventListener('click', function () {
    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
    this.classList.add('active');
  });
});

// Klik tanggal pada kalender
const calendarCells = document.querySelectorAll(".calendar-widget td");
calendarCells.forEach(cell => {
  cell.addEventListener("click", () => {
    calendarCells.forEach(c => c.classList.remove("active"));
    cell.classList.add("active");
  });
});

// CHART LINE (Weekly Activity)
const ctxActivity = document.getElementById('activityChart').getContext('2d');
const gradientActivity = ctxActivity.createLinearGradient(0, 0, 0, 200);
gradientActivity.addColorStop(0, 'rgba(108, 99, 255, 0.3)');
gradientActivity.addColorStop(1, 'rgba(108, 99, 255, 0)');

new Chart(ctxActivity, {
  type: 'line',
  data: {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
    datasets: [{
      label: 'Hours',
      data: [3, 4, 2, 5, 3],
      backgroundColor: gradientActivity,
      borderColor: '#6c63ff',
      fill: true,
      tension: 0.4,
      pointRadius: 4,
      pointBackgroundColor: '#6c63ff'
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: { stepSize: 1 }
      },
      x: {
        grid: { display: false }
      }
    }
  }
});

// CHART DOUGHNUT (Breakdown)
const ctxBreakdown = document.getElementById('breakdownChart').getContext('2d');
new Chart(ctxBreakdown, {
  type: 'doughnut',
  data: {
    labels: ['Video', 'Quiz', 'Assignment'],
    datasets: [{
      label: 'Time',
      data: [2.5, 1.2, 1.25],
      backgroundColor: ['#ffcc00', '#ff6384', '#36a2eb']
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { position: 'bottom' }
    }
  }
});

// CALENDAR BULANAN - Navigasi Bulan
const monthDisplay = document.querySelector('.calendar-header h4');
const prevBtn = document.querySelector('.prev-month');
const nextBtn = document.querySelector('.next-month');
const calendarBody = document.querySelector('.calendar-widget tbody');

let currentMonth = 6; // July
let currentYear = 2025;

function updateCalendar(month, year) {
  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDayIndex = new Date(year, month, 1).getDay(); // 0 = Sunday

  // Convert to Monday-first format
  const startDay = (firstDayIndex === 0) ? 6 : firstDayIndex - 1;

  // Update header
  monthDisplay.textContent = `${monthNames[month]} ${year}`;

  // Clear previous
  calendarBody.innerHTML = '';

  let day = 1;
  for (let i = 0; i < 6; i++) {
    const row = document.createElement("tr");
    for (let j = 0; j < 7; j++) {
      const cell = document.createElement("td");
      if ((i === 0 && j < startDay) || day > daysInMonth) {
        cell.textContent = "";
      } else {
        cell.textContent = day;
        day++;
      }
      row.appendChild(cell);
    }
    calendarBody.appendChild(row);
  }
}

prevBtn.addEventListener('click', () => {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  updateCalendar(currentMonth, currentYear);
});

nextBtn.addEventListener('click', () => {
  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  updateCalendar(currentMonth, currentYear);
});

updateCalendar(currentMonth, currentYear);
