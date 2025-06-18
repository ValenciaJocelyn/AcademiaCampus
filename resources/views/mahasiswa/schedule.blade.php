<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Schedule - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">Academia Campus</div>

      <nav class="nav-menu">
        <ul>
          <li><a href="{{ url('/dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="{{ url('/student-services') }}"><i class="fas fa-user-graduate"></i> Student Services</a></li>
          <li><a href="{{ url('/courses') }}"><i class="fas fa-book"></i> Courses</a></li>
          <li class="active"><a href="{{ url('/schedule') }}"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
          <li><a href="{{ url('/attendance') }}"><i class="fas fa-clipboard-check"></i> Attendance</a></li>
          <li><a href="{{ url('/grade') }}"><i class="fas fa-chart-bar"></i> Grade</a></li>
          <li><a href="{{ url('/shuttle-overview') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle</a></li>
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

    <!-- Main Content -->
    <main class="main-content">
      <!-- Header -->
       <header class="header">
        <div>
          <h2>Hello, {{ auth()->user()->name }}!</h2>
          <p>You are doing great. Keep practicing!</p>
        </div>

        <div class="header-right">
          <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Search event, activities..." class="search-box" />
          </div>

          <div class="profile">
            <i class="fas fa-bell notification"></i>
            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
          </div>
        </div>
      </header>

      <!-- Calendar Section -->
      <section class="calendar-wrapper">
        <!-- Calendar -->
        <div class="calendar-left">
          <div class="calendar-header">
            <div class="tabs">
              <button class="tab active">Month</button>
              <button class="tab">Week</button>
              <button class="tab">Day</button>
            </div>
          </div>

          <div class="calendar-grid">
            <!-- Day names -->
            <div class="day-name">Sun</div>
            <div class="day-name">Mon</div>
            <div class="day-name">Tue</div>
            <div class="day-name">Wed</div>
            <div class="day-name">Thu</div>
            <div class="day-name">Fri</div>
            <div class="day-name">Sat</div>

            <!-- Empty placeholders (assuming 1st is Sat) -->
            <div class="day empty"></div>
            <div class="day empty"></div>
            <div class="day empty"></div>
            <div class="day empty"></div>
            <div class="day empty"></div>
            <div class="day empty"></div>

            <!-- Dates -->
            <div class="day"><span class="date">1</span><div class="event gray">Course Big data Processing 11.20 - 13.00</div></div>
            <div class="day"><span class="date">2</span></div>
            <div class="day"><span class="date">3</span><div class="event red">Course Database Design 13.20 - 15.00</div></div>
            <div class="day"><span class="date">4</span></div>
            <div class="day"><span class="date">5</span><div class="event yellow">Assignment Distributed Cloud Computing, Deadline 23:59 PM</div></div>
            <div class="day"><span class="date">6</span></div>
            <div class="day"><span class="date">7</span><div class="event pink">Quiz Computational Biology (LAB)</div></div>
            <div class="day"><span class="date">8</span></div>
            <div class="day"><span class="date">9</span></div>
            <div class="day"><span class="date">10</span></div>
            <div class="day"><span class="date">11</span></div>
            <div class="day"><span class="date">12</span></div>
            <div class="day"><span class="date">13</span></div>
            <div class="day"><span class="date">14</span></div>
            <div class="day"><span class="date">15</span></div>
            <div class="day"><span class="date">16</span></div>
            <div class="day"><span class="date">17</span></div>
            <div class="day"><span class="date">18</span></div>
            <div class="day"><span class="date">19</span></div>
            <div class="day"><span class="date">20</span></div>
            <div class="day"><span class="date">21</span></div>
            <div class="day"><span class="date">22</span></div>
            <div class="day"><span class="date">23</span></div>
            <div class="day"><span class="date">24</span></div>
            <div class="day"><span class="date">25</span></div>
            <div class="day"><span class="date">26</span></div>
            <div class="day"><span class="date">27</span></div>
            <div class="day"><span class="date">28</span></div>
            <div class="day"><span class="date">29</span></div>
            <div class="day"><span class="date">30</span></div>
            <div class="day"><span class="date">31</span></div>
          </div>
        </div>

        <!-- Event Form -->
        <div class="event-form">
            <h3>Add Event</h3>
            <div class="type-toggle">
                <button class="active">Reminder</button>
                <button>Event</button>
            </div>
            <input id="event-title" type="text" placeholder="Title (e.g. Assignment Data Analysis)" />
            <label for="event-from">From</label>
            <input id="event-from" type="time" />
            <label for="event-to">To</label>
            <input id="event-to" type="time" />
            <label for="event-date">Date</label>
            <input id="event-date" type="date" />
            <button class="add-btn" onclick="addEventToCalendar()">+ Add</button>
            </div>


            <div id="deleteModal" class="modal" style="display:none;">
            <div class="modal-content">
                <p id="deleteMessage">Are you sure you want to delete this event?</p>
                <div class="modal-buttons">
                <button id="confirmDelete">OK</button>
                <button id="cancelDelete">Cancel</button>
                </div>
            </div>
            </div>
      </section>
    </main>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
  <script src="{{ asset('scripts/schedule.js') }}"></script>
</body>
</html>
