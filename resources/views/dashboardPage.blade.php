<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboardPage.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">🎓 Academia Campus</div>
      <nav>
        <ul>
          <li class="active">🏠 Dashboard</li>
          <li>📚 Courses</li>
          <li>💬 Discussion</li>
          <li>🗓️ Schedule</li>
          <li>⚙️ Settings</li>
        </ul>
      </nav>
    </aside>


      

    <main class="main-content">
      <header class="header">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Search Courses, Tasks" class="search-box" />
          </div>
        <div class="profile">
          <span class="notification">🔔</span>
          <img src="https://i.pravatar.cc/40" alt="User" class="avatar">
        </div>
      </header>

      <section class="welcome-box">
        <div>
          <h2>It's Good to have you back <span class="highlight">Achmad Nizar!</span></h2>
          <p>You've completed <b>3 lessons</b> today. Keep Going! You’re almost finished.</p>
          <div class="progress-bar">
            <div class="progress" style="width: 80%"></div>
          </div>
        </div>
        <div class="illustration">
            <img src="img/coding.png" alt="Coding Illustration" /> 
        </div>
      </section>

      <section class="cards">
        <div class="card">
          <h3>Ongoing Classes</h3>
          <div class="class-item">
            <img src="img/bigData.jpg" alt="Big Data Processing" />
            <div>
              <p>Big Data Processing</p>
              <small>Hadoop Platform Management</small>
              <div class="progress-container">
                <div class="progress-bar">
                  <div class="progress" style="width: 80%"></div>
                </div>
                <small>8 out of 10 lessons complete</small>

              </div>
              <div class="see-all-container">
                
              </div>
            </div>
            <button class="resume-button">Resume</button>
          </div>
          <div class="class-item">
            <img src="img/databaseDesign.jpg" alt="Database Design" />
            <div>
              <p>Database Design</p>
              <small>Data Manipulation Language</small>
              <div class="progress-container">
                <div class="progress-bar">
                  <div class="progress" style="width: 50%"></div>
                </div>
                <small>5 out of 10 lessons complete</small>
              </div>
            </div>
            <button class="resume-button">Resume</button>
          </div>
          <a href="#" class="see-all-link">See All</a>
        </div>

        <div class="card">
          <h3>Deadlines</h3>
          <div class="deadline-item">
            <div>
              <p><b>Class Project:</b> Usability Testing</p>
              <small>Due 15th July</small>
            </div>
            <button class="start-button">Start</button>
          </div>
          <div class="deadline-item">
            <div>
              <p><b>Quiz:</b> Design Principles</p>
              <small>Completed</small>
            </div>
            <button class="review-button">Review</button>

          </div>
          <a href="#" class="see-all-link">See All</a>
        </div>


        
        <div class="card">
          <h3>Weekly Activity</h3>
          <canvas id="activityChart" height="100"></canvas>
          <span class="week-range">Jul 5th - 11th</span>
        </div>

        <div class="card">
          <h3>Breakdown</h3>
          <canvas id="breakdownChart" height="100"></canvas>
        </div>
      </section>
    </main>
    

   
    <aside class="calendar-side">
        <div class="schedule-section">
            <h2>Schedule</h2>
        </div>
      
        <!-- Kalender Bulanan -->
        <div class="calendar-widget">
          <div class="calendar-header">
            <button class="calendar-nav prev-month">&lt;</button>
              <h4>July 2025</h4>
            <button class="calendar-nav next-month">&gt;</button>
          </div>
          <table>
            <thead>
              <tr>
                <th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>29</td><td>30</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
              <tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td></tr>
              <tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr>
              <tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr>
              <tr><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>1</td><td>2</td></tr>
            </tbody>
          </table>
        </div>
      
        <!-- Jadwal Mingguan Grid -->
        <div class="calendar-grid">
            <div class="grid-header">
              <div></div> <!-- Empty cell for row labels -->
              <div>8 am</div><div>9 am</div><div>10 am</div><div>11 am</div><div>12 pm</div><div>1 pm</div>
            </div>
          
            <div class="grid-row">
              <div class="day-label">Mon</div>
              <div class="event event-blue" style="grid-column: 1 / span 2;">Humanist Type<br><small>Video</small></div>
            </div>
          
            <div class="grid-row">
              <div class="day-label">Tue</div>
              <div class="event event-red" style="grid-column: 3 / span 2;">Usability Testing<br><small>Class Project</small></div>
            </div>
          
            <div class="grid-row">
              <div class="day-label">Wed</div>
              <div class="event event-yellow" style="grid-column: 1 / span 2;">Principles of...<br><small>Reading</small></div>
            </div>
          
            <div class="grid-row">
              <div class="day-label">Thu</div>
              <div class="event event-pink" style="grid-column: 3 / span 2;">Perception<br><small>Quiz</small></div>
            </div>
          
            <div class="grid-row">
              <div class="day-label">Sun</div>
              <div class="event event-blue" style="grid-column: 1 / span 2;">Grids<br><small>Video</small></div>
            </div>
          </div>
          
        </div>
      </aside>
      
      

  <script>
    const ctx = document.getElementById('activityChart');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
          label: 'Hours',
          data: [3, 4, 2, 5, 3],
          borderColor: '#6c63ff',
          tension: 0.4
        }]
      }
    });

    const ctx2 = document.getElementById('breakdownChart');
    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: ['Video', 'Quiz', 'Assignment'],
        datasets: [{
          label: 'Time',
          data: [2.5, 1.2, 1.25],
          backgroundColor: ['#ffcc00', '#ff6384', '#36a2eb']
        }]
      }
    });
  </script>
  <script src="script.js"></script>
</body>
</html>