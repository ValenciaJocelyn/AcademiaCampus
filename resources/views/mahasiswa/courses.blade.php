<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Courses - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/courses.css') }}">
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
          <li class="active"><a href="{{ url('/courses') }}"><i class="fas fa-book"></i> Courses</a></li>
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

    <!-- Main Content -->
    <main class="main-content">
      <header class="header">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Search your favorite course" class="search-box" />
          </div>
        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
        </div>
      </header>

      <section class="featured-courses">
        <h2>Featured Course</h2>
        <div class="featured-list">
          <div class="featured-card active">
            <h3>Big Data Processing</h3>
            <p>12 Lessons • 40 Hours</p>
            <button>See Course</button>
          </div>
          <div class="featured-card">
            <h3>Database Design</h3>
            <p>12 Lessons • 40 Hours</p>
            <button>See Course</button>
          </div>
          <div class="featured-card">
            <h3>Data analysis using Python</h3>
            <p>12 Lessons • 40 Hours</p>
            <button>See Course</button>
          </div>
        </div>
      </section>

      <!-- New Courses Section -->
      <section class="course-section">
        <div class="featured-list">
          <div class="featured-card">
            <h3>Distributed Cloud Computing</h3>
            <p>10 Lessons • 35 Hours</p>
            <button>See Course</button>
          </div>
          <div class="featured-card">
            <h3>Computational Biology</h3>
            <p>8 Lessons • 25 Hours</p>
            <button>See Course</button>
          </div>
          <div class="featured-card">
            <h3>Software Engginering</h3>
            <p>15 Lessons • 50 Hours</p>
            <button>See Course</button>
          </div>
        </div>
      </section>

      <section class="recommended">
        <div class="section-header">
          <h2>Recommended Course</h2>
          <a href="#" class="see-all">SEE ALL</a>
        </div>
        <div class="recommended-list">
          <div class="recommended-card">
            <div class="info">
              <h4>Research Methodology</h4>
              <span>Introduction to Research Method</span>
            </div>
            <div class="meta">
              <span>24 May 2025</span>

            </div>
          </div>
          <div class="recommended-card">
            <div class="info">
              <h4>Program Design Method</h4>
              <span>TECHNOLOGY</span>
            </div>
            <div class="meta">
              <span>24 May 2025</span>

            </div>
          </div>
          <div class="recommended-card">
            <div class="info">
              <h4>Introduction to Data Science</h4>
              <span>PREDICTIVE ANALYSIS</span>
            </div>
            <div class="meta">
              <span>24 May 2025</span>

            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Right Panel -->
    <aside class="right-panel">
      <div class="profile-card">
        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
        <h3>{{ auth()->user()->name }}</h3>
        <p class="verified">Verified Student</p>
        <div class="stats">
          <div><strong>32</strong><span>Total Course</span></div>
          <div><strong>120</strong><span>Hours</span></div>
        </div>
      </div>

      <div class="calendar">
        <h4>May 2025</h4>
        <div class="calendar-grid">
          <span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
          <span></span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
          <span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span>
          <span>14</span><span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span>
          <span>21</span><span>22</span><span class="active">23</span><span>24</span><span>25</span><span>26</span><span>27</span>
          <span>28</span>
        </div>
      </div>

      <!-- Schedule Class Section -->
      <div class="schedule-class">
        <h4 class="schedule-title">Schedule Class</h4>

        <!-- Class Item 1 -->
        <div class="class-item active">
          <div class="date">
            <p class="day">02</p>
            <p class="month">FEB</p>
          </div>
          <div class="details">
            <p class="title">Basic HTML and CSS</p>
            <p class="meta">👥 2/3</p>
          </div>
          <div class="arrow">➔</div>
        </div>

        <!-- Class Item 2 -->
        <div class="class-item">
          <div class="date">
            <p class="day">04</p>
            <p class="month">FEB</p>
          </div>
          <div class="details">
            <p class="title">Object Detection with YOLOv11</p>
            <p class="meta">👥 2/3</p>
          </div>
        </div>

        <!-- Class Item 3 -->
        <div class="class-item">
          <div class="date">
            <p class="day">05</p>
            <p class="month">FEB</p>
          </div>
          <div class="details">
            <p class="title">Database 101</p>
            <p class="meta">👥 1/3</p>
          </div>
        </div>
      </div>
    </aside>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>

</body>
</html>
