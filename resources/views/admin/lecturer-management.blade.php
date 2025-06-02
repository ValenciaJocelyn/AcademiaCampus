<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Lecturer Management - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
          <li class="active"><a href="{{ route('admin.lecturer-management') }}"><i class="fas fa-chalkboard-teacher"></i> Lecturer Management</a></li>
          <li><a href="{{ route('admin.driver-management') }}"><i class="fas fa-id-badge"></i> Driver Management</a></li>
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
      <header class="header">
        <div class="search-container">
          <i class="fas fa-search search-icon"></i>
          <input type="text" placeholder="Search Lecturer" class="search-box" />
        </div>

        <div class="profile">
            <i class="fas fa-bell notification"></i>
            <img src="https://i.pravatar.cc/40" alt="User" class="avatar">
        </div>
      </header>

        <section class="main-content container py-4">
            <h2 class="mb-4">Lecturer Management</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('admin.lecturer-management.create') }}" class="btn btn-success mb-3">Add Lecturer</a>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Campus</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lecturers as $lecturer)
                        <tr>
                            <td>{{ $lecturer->name }}</td>
                            <td>{{ $lecturer->username }}</td>
                            <td>{{ $lecturer->email }}</td>
                            <td>{{ $lecturer->no_hp }}</td>
                            <td>{{ $lecturer->campus }}</td>
                            <td>
                                <a href="{{ route('admin.lecturer-management.edit', $lecturer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.lecturer-management.destroy', $lecturer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete This Lecturer?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">No lecturers found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </main>
  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
