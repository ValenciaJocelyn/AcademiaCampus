<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Shuttle Bus - Academia Campus</title>

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
          <li class="active"><a href="{{ route('admin.shuttle-bus') }}"><i class="fas fa-bus"></i> Shuttle Bus</a></li>
          <li><a href="{{ route('admin.shuttle-route') }}"><i class="fas fa-bus"></i> Shuttle Route</a></li>
          <li><a href="{{ route('admin.shuttle-status') }}"><i class="fas fa-bus"></i> Shuttle Status</a></li>
          <li><a href="{{ route('admin.shuttle-booking') }}"><i class="fas fa-bus"></i> Shuttle Booking</a></li>
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
            <h2 class="mb-4">Create Shuttle Bus</h2>

            <form action="{{ route('admin.shuttle-bus.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Plate Number</label>
                    <input type="text" name="plate_number" id="plate_number" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="bus_type" class="form-label">Bus Type</label>
                    <select name="bus_type" id="bus_type" class="form-select" required>
                        <option value="">Select Bus Type</option>
                        <option value="Campus" {{ old('bus_type') == 'Campus' ? 'selected' : '' }}>Campus</option>
                        <option value="Inter-campus" {{ old('bus_type') == 'Inter-campus' ? 'selected' : '' }}>Inter-campus</option>
                        <option value="Others" {{ old('bus_type') == 'Others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="route" class="form-label">Route</label>
                    <select name="route" id="route" class="form-select" required>
                        <option value="" disabled selected>Select a route</option>
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}" {{ old('route_id', $bus->route_id ?? '') == $route->id ? 'selected' : '' }}>
                                {{ $route->route }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Create Bus</button>
                <a href="{{ route('admin.shuttle-bus') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </section>
    </main>
  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
