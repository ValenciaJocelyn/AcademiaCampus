<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Shuttle Booking - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/shuttle-overview.css') }}">
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
          <li><a href="{{ url('/attendance') }}"><i class="fas fa-clipboard-check"></i> Attendance</a></li>
          <li><a href="{{ url('/grade') }}"><i class="fas fa-chart-bar"></i> Grade</a></li>
          <li class="active"><a href="{{ url('/shuttle-overview') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle</a></li>
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
                <h2>Shuttle Overview</h2>
            </div>

            <div class="profile">
                <i class="fas fa-bell notification"></i>
                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
            </div>
        </header>

        <section class="shuttle-layout">
            <div class="map-booking-wrapper">
                <div class="map-card">
                    <img src="{{ asset('storage/shuttle-route.png') }}" alt="Shuttle Route Map">
                </div>

                <div class="button-group">
                    <a href="{{ url('/shuttle-booking') }}" class="btn-primary" style="text-decoration: none;">Book Shuttle</a>
                    <button class="btn-secondary">View Booking</button>
                </div>
            </div>

            <div class="live-location-wrapper">
                <h3>Live Shuttle Locations</h3>

                <div class="route-group">
                    <h4>Callaghan Campus</h4>
                    <ul class="shuttle-status-list">
                        <li>
                            <span class="location from">Chancellery</span>
                            <span class="arrow"><i class="fas fa-arrow-right"></i></span>
                            <span class="location to">Science</span>
                        </li>

                        <li>
                            <span class="location from">Design</span>
                            <span class="arrow"><i class="fas fa-arrow-right"></i></span>
                            <span class="location to">Student Accommodation</span>
                        </li>
                    </ul>
                </div>


                <div class="route-group">
                    <h4>Newcastle City</h4>
                    <p class="no-shuttle">No shuttles currently operating.</p>
                </div>
            </div>
        </section>
    </main>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
