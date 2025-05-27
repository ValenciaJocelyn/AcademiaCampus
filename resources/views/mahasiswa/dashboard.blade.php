<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Dashboard - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">Academia Campus</div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="{{ url('/student-services') }}"><i class="fas fa-user-graduate"></i> Student Services</a></li>
          <li><a href="{{ url('/courses') }}"><i class="fas fa-book"></i> Courses</a></li>
          <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
          <li><a href="{{ url('/attendance') }}"><i class="fas fa-clipboard-check"></i> Attendance</a></li>
          <li><a href="{{ url('/grade') }}"><i class="fas fa-chart-bar"></i> Grade</a></li>
          <li><a href="{{ url('/shuttle-booking') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle Booking</a></li>
          <li><a href="{{ url('/announcement') }}"><i class="fas fa-bullhorn"></i> Announcement</a></li>
          <li><a href="{{ url('/setting') }}"><i class="fas fa-cog"></i> Settings</a></li>
        </ul>
      </nav>

      @auth
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
          @csrf
        </form>

        <div class="logout" style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-door-open"></i>
          <span>Log Out</span>
        </div>
      @else
        <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a></p>
      @endauth
    </aside>

    <main class="main-content">
      <header class="header">
        <div class="search-container">
          <i class="fas fa-search search-icon"></i>
          <input type="text" placeholder="Search Courses, Tasks" class="search-box" />
        </div>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="https://i.pravatar.cc/40" alt="User" class="avatar">
        </div>
      </header>

      <section class="welcome-box">
        <div>
          <h2>It's Good to have you back <span class="highlight">Syahira!</span></h2>
          <p>You've completed <b>3 lessons</b> today. Keep Going! You’re almost finished.</p>
          <div class="progress-bar">
            <div class="progress" style="width: 80%"></div>
          </div>
        </div>
      </section>

      <section class="cards">
        <div class="card">
          <h3>Ongoing Classes</h3>
          <div class="class-item">
            <img src="{{ asset('assets/bigData.jpg') }}" alt="Big Data Processing" />
            <div>
              <p>Big Data Processing</p>
              <small>Hadoop Platform Management</small>
              <div class="progress-container">
                <div class="progress-bar">
                  <div class="progress" style="width: 80%"></div>
                </div>
                <small>8 out of 10 lessons complete</small>
              </div>
            </div>
            <button class="resume-button">Resume</button>
          </div>

          <div class="class-item">
            <img src="{{ asset('assets/databaseDesign.jpg') }}" alt="Database Design" />
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
        <div class="card upcoming-events-card">
            <h3>Upcoming Events</h3>
            <div class="event-scroll">
                <ul class="event-list">
                <li>
                    📢 <strong>AI in Education</strong><br>
                    <small>July 18, 10:00 AM via Zoom</small>
                </li>
                <li>
                    📝 <strong>UX Case Study Submission</strong><br>
                    <small>Due July 21 via Moodle</small>
                </li>
                <li>
                    🤝 <strong>Design Sprint Meeting</strong><br>
                    <small>July 22, 3:00 PM at Library Room B</small>
                </li>
                <li>
                    👨‍🏫 <strong>Guest Lecture: Data Analytics</strong><br>
                    <small>July 25, 09:00 AM at Hall A</small>
                </li>
                <li>
                    🧪 <strong>Usability Test</strong><br>
                    <small>July 26, Computer Lab 1</small>
                </li>
                <!-- Tambahkan lebih banyak jika perlu -->
                </ul>
            </div>
        </div>

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

<!-- Bungkus total -->
<!-- Calendar Container -->
    <div class="calendar-container">
      <!-- Day Labels -->
      <div class="day-labels">
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thu</div>
        <div>Fri</div>
        <div>Sat</div>
        <div>Sun</div>
      </div>

  <!-- Scrollable Grid -->
  <div class="scroll-area">
    <div class="calendar-grid">
      <!-- Header Row -->
      <div class="grid-header">
        <div>07.20</div>
        <div>09.20</div>
        <div>11.20</div>
        <div>13.20</div>
        <div>15.20</div>
        <div>17.20</div>
    </div>

      <!-- Monday -->
    <div class="grid-row" data-day="Mon">
      <div class="grid-cell"></div>
      <div class="grid-cell course-research">Research Methodology</div>
      <div class="grid-cell"></div>
      <div class="grid-cell course-bigdata">Big Data Processing</div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
    </div>

    <!-- Tuesday -->
    <div class="grid-row" data-day="Tue">
      <div class="grid-cell"></div>
      <div class="grid-cell course-softeng">Software Engineering</div>
      <div class="grid-cell course-softeng">Software Engineering</div>
      <div class="grid-cell"></div>
      <div class="grid-cell course-cloud">Distributed Cloud Computing</div>
      <div class="grid-cell"></div>
    </div>

    <!-- Wednesday -->
    <div class="grid-row" data-day="Wed">
      <div class="grid-cell"></div>
      <div class="grid-cell course-dataanalysis">Data Analysis</div>
      <div class="grid-cell"></div>
      <div class="grid-cell course-softeng-tut">Software Engg (TUT)</div>
      <div class="grid-cell course-dbproject">Project Database Design</div>
      <div class="grid-cell"></div>
    </div>

    <!-- Thursday -->
    <div class="grid-row" data-day="Thu">
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell course-biology">Computational Biology</div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell course-biology-lab">Computational Biology (LAB)</div>
    </div>

    <!-- Friday -->
    <div class="grid-row" data-day="Fri">
      <div class="grid-cell course-usability">Usability Testing</div>
      <div class="grid-cell course-db-lab">Database Design (LAB)</div>
      <div class="grid-cell"></div>
      <div class="grid-cell course-cloud">Distributed Cloud Computing</div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
    </div>

    <!-- Saturday -->
    <div class="grid-row" data-day="Sat">
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
    </div>

    <!-- Sunday -->
    <div class="grid-row" data-day="Sun">
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
      <div class="grid-cell"></div>
    </div>
  </div>
</div>

  <!-- Input Modal -->
  <div id="inputModal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.2); z-index:999;">
    <h4>Add Schedule</h4>
    <input type="text" id="eventTitle" placeholder="Event Title" style="width:100%; padding:8px; margin-bottom:10px;">
    <button onclick="saveEvent()">Save</button>
    <button onclick="closeModal()">Cancel</button>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
  <script src="{{ asset('scripts/dashboard.js') }}"></script>
</body>
</html>
