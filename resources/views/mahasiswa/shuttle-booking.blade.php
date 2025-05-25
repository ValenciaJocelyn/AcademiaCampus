<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Shuttle Booking - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/shuttle.css') }}">
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
          <li class="active"><a href="{{ url('/shuttle-booking') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle Booking</a></li>
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
          <h2>Shuttle Booking</h2>
        </div>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="https://i.pravatar.cc/40" alt="User" class="avatar">
        </div>
      </header>

      <section class="cards">
        <div class="card booking-card">
          <h3>Book Your Shuttle</h3>

            @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
            @endif

            @if(session('error'))
                <script>
                    alert("{{ session('error') }}");
                </script>
            @endif

            <form action="{{ route('shuttle-booking.store') }}" method="POST" class="booking-form">
            @csrf

            <div class="form-group">
                <label>Username</label>
                <input type="text" value="{{ auth()->user()->username }}" disabled />
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" value="{{ auth()->user()->name }}" disabled />
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" value="{{ auth()->user()->no_hp }}" disabled />
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required />
            </div>

            <div class="form-group">
                <label for="hour">Hour</label>
                <select id="hour" name="hour" required>
                    <option value="" disabled selected>Select Hour</option>
                    <option value="07:00">07:00</option>
                    <option value="09:00">09:00</option>
                    <option value="11:00">11:00</option>
                    <option value="13:00">13:00</option>
                    <option value="15:00">15:00</option>
                    <option value="17:00">17:00</option>
                    <option value="19:00">19:00</option>
                </select>
            </div>

            <div class="form-group">
                <label for="route">Route</label>
                <select id="route" name="route" required>
                    <option value="" disabled selected>Select Route</option>
                    <option value="Kemanggisan - Bekasi">Kemanggisan - Bekasi</option>
                    <option value="Bekasi - Kemanggisan">Bekasi - Kemanggisan</option>
                    <option value="Kemanggisan - Alam Sutera">Bekasi - Kemanggisan</option>
                    <option value="Alam Sutera - Kemanggisan">Alam Sutera - Kemanggisan</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Pesan Shuttle</button>
            </form>
        </div>
      </section>
    </main>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
