<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Edit Student - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user-management.css') }}">
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
          <li class="active"><a href="{{ route('admin.student-management') }}"><i class="fas fa-user-graduate"></i> Student Management</a></li>
          <li><a href="{{ route('admin.lecturer-management') }}"><i class="fas fa-chalkboard-teacher"></i> Lecturer Management</a></li>
          <li><a href="{{ route('admin.driver-management') }}"><i class="fas fa-id-badge"></i> Driver Management</a></li>
          <li><a href="{{ route('admin.shuttle-bus') }}"><i class="fas fa-bus"></i> Shuttle Bus</a></li>
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
            <h2 class="mb-4">Edit Student</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.student-management.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-edit-wrapper d-flex flex-wrap gap-4">
                    <div class="flex-grow-1" style="min-width: 250px;">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ $student->username }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Phone Number</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $student->no_hp) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="male" {{ $student->gender === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->gender === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="others" {{ $student->gender === 'others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Birth Date</label>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $student->dob }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
                        </div>

                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus</label>
                            <input type="text" name="campus" id="campus" class="form-control" value="{{ $student->campus }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password (leave blank to keep current)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>

                    <div class="profile-picture-container text-center">
                        <label for="profile-picture" class="picture-wrapper d-block mx-auto position-relative profile-clickable">
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="Profile Picture" class="profile-img rounded-circle border border-primary w-100 h-100 object-fit-cover">
                            <div class="edit-overlay position-absolute bottom-0 end-0 bg-primary text-white rounded-circle p-2 pen" style="display: none;">
                                <i class="fas fa-pen"></i>
                            </div>
                        </label>
                        <input type="file" id="profile-picture" name="photo" accept="image/*" hidden>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
                <a href="{{ route('admin.student-management') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </section>
    </main>

    <script src="{{ asset('scripts/default.js') }}"></script>
    <script src="{{ asset('scripts/user-management.js') }}"></script>
</body>
</html>
