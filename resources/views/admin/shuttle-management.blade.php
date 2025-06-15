<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Shuttle Management - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
          <li class="active"><a href="{{ route('admin.shuttle-management') }}"><i class="fas fa-bus"></i> Shuttle Management</a></li>
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
        <form method="GET" action="{{ route('admin.shuttle-management') }}" class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" name="search" placeholder="Search User or Route" class="search-box" value="{{ request('search') }}" />
        </form>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
        </div>
      </header>

        <section class="main-content container py-4">
            <h2 class="mb-4">Shuttle Booking Management</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>User</th>
                            <th>Route</th>
                            <th>Date</th>
                            <th>Hour</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $booking->user->name }} <br><small class="text-muted">({{ $booking->user->username }})</small></td>
                                <td>{{ $booking->route }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->hour }}</td>
                                <td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.shuttle-management.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.shuttle-management.destroy', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete This Booking?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
