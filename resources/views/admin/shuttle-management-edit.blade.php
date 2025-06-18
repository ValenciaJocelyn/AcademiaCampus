<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Shuttle - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">Academia Campus</div>

      <nav class="nav-menu">
        <ul>
          <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a href="{{ route('admin.admin-management') }}"><i class="fas fa-user-shield"></i> Admin Management</a></li>
          <li><a href="{{ route('admin.student-management') }}"><i class="fas fa-user-graduate"></i> Student Management</a></li>
          <li><a href="{{ route('admin.lecturer-management') }}"><i class="fas fa-chalkboard-teacher"></i> Lecturer Management</a></li>
          <li><a href="{{ route('admin.driver-management') }}"><i class="fas fa-id-badge"></i> Driver Management</a></li>
          <li><a href="{{ route('admin.shuttle-bus') }}"><i class="fas fa-bus"></i> Shuttle Bus</a></li>
          <li><a href="{{ route('admin.shuttle-route') }}"><i class="fas fa-bus"></i> Shuttle Route</a></li>
          <li><a href="{{ route('admin.shuttle-status') }}"><i class="fas fa-bus"></i> Shuttle Status</a></li>
          <li class="active"><a href="{{ route('admin.shuttle-booking') }}"><i class="fas fa-bus"></i> Shuttle Booking</a></li>
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
          <span class="notification">🔔</span>
          <img src="https://i.pravatar.cc/40" alt="User" class="avatar">
        </div>
      </header>

<section class="main-content container py-4">
    <h2 class="mb-4">Edit Shuttle Booking</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.shuttle-booking.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="route" class="form-label">Route</label>
            <select name="route" id="route" class="form-select" required>
                <option value="Kemanggisan - Bekasi" {{ $booking->route == 'Kemanggisan - Bekasi' ? 'selected' : '' }}>Kemanggisan - Bekasi</option>
                <option value="Bekasi - Kemanggisan" {{ $booking->route == 'Bekasi - Kemanggisan' ? 'selected' : '' }}>Bekasi - Kemanggisan</option>
                <option value="Alam Sutera - Kemanggisan" {{ $booking->route == 'Alam Sutera - Kemanggisan' ? 'selected' : '' }}>Alam Sutera - Kemanggisan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $booking->date }}" required>
        </div>

        <div class="mb-3">
            <label for="hour" class="form-label">Hour</label>
            <select name="hour" id="hour" class="form-select" required>
                <option value="07:00" {{ $booking->hour == '07:00' ? 'selected' : '' }}>07:00</option>
                <option value="09:00" {{ $booking->hour == '09:00' ? 'selected' : '' }}>09:00</option>
                <option value="11:00" {{ $booking->hour == '11:00' ? 'selected' : '' }}>11:00</option>
                <option value="13:00" {{ $booking->hour == '13:00' ? 'selected' : '' }}>13:00</option>
                <option value="15:00" {{ $booking->hour == '15:00' ? 'selected' : '' }}>15:00</option>
                <option value="17:00" {{ $booking->hour == '17:00' ? 'selected' : '' }}>17:00</option>
                <option value="19:00" {{ $booking->hour == '19:00' ? 'selected' : '' }}>19:00</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Booking</button>
        <a href="{{ route('admin.shuttle-booking') }}" class="btn btn-secondary ms-2">Back</a>
    </form>
</section>

  <script src="{{ asset('scripts/default.js') }}"></script>
  <script src="{{ asset('scripts/dashboard.js') }}"></script>
</body>
</html>
