<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Attendance - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
          <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
          <li  class="active"><a href="{{ url('/attendance') }}"><i class="fas fa-clipboard-check"></i> Attendance</a></li>
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

    <main class="main-content">
      <header class="header">
        <div>
          <h2>Attendance Overview</h2>
        </div>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
        </div>
      </header>

      <section class="cards">
        <div class="card">
          <h3>Big Data Processing</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 13</p>
          <p>Absent: 1</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 93%"></div>
              </div>
              <small>93% attendance</small>
          </div>
        </div>

        <div class="card">
          <h3>Computational Biology</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 12</p>
          <p>Absent: 2</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 86%"></div>
              </div>
              <small>86% attendance</small>
          </div>
        </div>

        <div class="card">
          <h3>Data Analytics</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 11</p>
          <p>Absent: 3</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 79%"></div>
              </div>
              <small>79% attendance</small>
          </div>
        </div>

        <div class="card">
          <h3>Database Design</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 12</p>
          <p>Absent: 2</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 86%"></div>
              </div>
              <small>86% attendance</small>
          </div>
        </div>

        <div class="card">
          <h3>Distributed Cloud Computing</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 13</p>
          <p>Absent: 1</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 93%"></div>
              </div>
              <small>93% attendance</small>
          </div>
        </div>

        <div class="card">
          <h3>Research Methodology in Computer Science</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 14</p>
          <p>Absent: 0</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 100%"></div>
              </div>
              <small>100% attendance</small>
          </div>
        </div>

        <div class="card">
          <h3>Software Engineering</h3>
          <p>Total Meetings: 14</p>
          <p>Present: 13</p>
          <p>Absent: 1</p>
          <div class="progress-container">
              <div class="progress-bar">
                <div class="progress" style="width: 93%"></div>
              </div>
              <small>93% attendance</small>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
