<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Settings - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
          <li><a href="{{ url('/shuttle-booking') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle Booking</a></li>
          <li><a href="{{ url('/announcement') }}"><i class="fas fa-bullhorn"></i> Announcement</a></li>
          <li class="active"><a href="{{ url('/setting') }}"><i class="fas fa-cog"></i> Settings</a></li>
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
          <h2>Settings</h2>
        </div>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="https://i.pravatar.cc/40" alt="User" class="avatar">
        </div>
      </header>

      <div class="settings-box">
        <aside class="settings-menu">
          <ul>
            <li class="active" data-section="profile">Edit Profile</li>
            <li data-section="password">Change Password</li>
            <li data-section="theme">Theme Settings</li>
            <li data-section="notifications">Notification Settings</li>
          </ul>
        </aside>

        <section class="settings-section">

          <!-- Edit Profile -->
          <div id="profile" class="settings-panel active">
            <h3>Edit Profile</h3>

            <div class="profile-edit-container">
              <form class="form-profile">
                <div class="form-row">
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" placeholder="First name" required>
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" placeholder="Last name" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" id="email" placeholder="Your email" required>
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" id="phone" placeholder="Optional">
                </div>

                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="dob">Date of Birth</label>
                  <input type="date" id="dob" required>
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea id="address" rows="3" placeholder="Your address"></textarea>
                </div>

                <button type="submit" class="btn-save">Save Changes</button>
              </form>

              <div class="profile-picture-container">
                <label for="profile-picture" class="picture-wrapper">
                  <img src="https://i.pravatar.cc/40" alt="Profile Picture" class="profile-img">
                  <div class="edit-overlay"><i class="fas fa-pen"></i></div>
                </label>
                <input type="file" id="profile-picture" accept="image/*" hidden>
              </div>
            </div>
          </div>

          <!-- Change Password -->
          <div id="password" class="settings-panel">
            <h3>Change Password</h3>

            <form class="form-password">
              <div class="form-group">
                <label for="current-password">Current Password</label>
                <div class="password-wrapper">
                  <input type="password" id="current-password" required>
                  <i class="fas fa-eye toggle-password"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="new-password">New Password</label>
                <div class="password-wrapper">
                  <input type="password" id="new-password" required>
                  <i class="fas fa-eye toggle-password"></i>
                </div>
              </div>

              <div class="form-group">
                <label for="confirm-password">Confirm New Password</label>
                <div class="password-wrapper">
                  <input type="password" id="confirm-password" required>
                  <i class="fas fa-eye toggle-password"></i>
                </div>
              </div>

              <button type="submit" class="btn-save">Update Password</button>
            </form>
          </div>

          <!-- Theme Settings -->
          <div id="theme" class="settings-panel">
            <h3>Theme Settings</h3>

            <form class="form-theme" id="themeForm">
              <div class="theme-item">
                <label for="primaryColor">Primary Color</label>
                <p>Customize the look and feel of your workspace.</p>
                <input type="color" id="primaryColor" name="primaryColor" value="#5a3ef9">
              </div>
              <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" class="btn-save">Save Changes</button>
                <button type="button" id="resetTheme" class="btn-reset">Reset</button>
              </div>
            </form>
          </div>

          <!-- Notification Settings -->
          <div id="notifications" class="settings-panel">
            <h3>Notification Settings</h3>

            <form class="form-notifications">
              <div class="notif-item">
                <div class="notif-text">
                  <h4>Email Notifications</h4>
                  <p>Receive important updates, announcements, and activity alerts directly to your registered email address.</p>
                </div>
                <label class="switch">
                  <input type="checkbox" checked>
                  <span class="slider round"></span>
                </label>
              </div>

              <div class="notif-item">
                <div class="notif-text">
                  <h4>Push Notifications</h4>
                  <p>Get real-time alerts on your device without needing to open the website.</p>
                </div>
                <label class="switch">
                  <input type="checkbox" checked>
                  <span class="slider round"></span>
                </label>
              </div>

              <div class="notif-item">
                <div class="notif-text">
                  <h4>Notification Topics</h4>
                  <p>Select which topics you'd like to receive updates about.</p>
                  <div class="checkbox-group">
                    <label><input type="checkbox" checked> Class announcements</label>
                    <label><input type="checkbox" checked> Class reminders</label>
                    <label><input type="checkbox" checked> Assignment deadlines</label>
                    <label><input type="checkbox" checked> Grade releases</label>
                    <label><input type="checkbox" checked> Campus announcements</label>
                    <label><input type="checkbox" checked> Campus events</label>
                  </div>
                </div>
              </div>

              <div class="notif-item">
                <div class="notif-text">
                  <h4>Do Not Disturb</h4>
                  <p>Set a quiet period during which you won't receive any notifications.</p>
                  <div class="form-row">
                    <input type="time" value="22:00">
                    <span style="align-self: center;">to</span>
                    <input type="time" value="07:00">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn-save">Save Changes</button>
            </form>
          </div>

        </section>
      </div>
    </main>

    <script src="{{ asset('scripts/default.js') }}"></script>
    <script src="{{ asset('scripts/setting.js') }}"></script>

</body>
</html>
