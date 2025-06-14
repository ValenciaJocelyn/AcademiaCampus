<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Edit Driver - Academia Campus</title>

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
          <li class="active"><a href="{{ route('admin.driver-management') }}"><i class="fas fa-id-badge"></i> Driver Management</a></li>
          <li><a href="{{ route('admin.shuttle-management') }}"><i class="fas fa-bus"></i> Shuttle Management</a></li>
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
        <section class="main-content container py-4">
            <h2 class="mb-4">Edit Driver</h2>

            <form action="{{ route('admin.driver-management.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $driver->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $driver->username }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $driver->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">Phone Number</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $driver->no_hp) }}" required>
                </div>

                <div class="mb-3">
                    <label for="route" class="form-label">Route</label>
                    <input type="text" name="route" id="route" class="form-control" value="{{ old('route', $driver->route) }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password (leave blank to keep current)</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update Driver</button>
                <a href="{{ route('admin.driver-management') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </section>
    </main>
  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
