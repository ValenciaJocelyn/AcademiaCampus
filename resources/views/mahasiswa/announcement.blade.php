<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Announcement - Academia Campus</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/announcement.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
          <li><a href="{{ url('/shuttle-overview') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle</a></li>
          <li class="active"><a href="{{ url('/announcement') }}"><i class="fas fa-bullhorn"></i> Announcement</a></li>
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

    <div class="main-content">
      <header class="header">
        <div>
          <h2>Announcements</h2>
        </div>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
        </div>
      </header>

      <div class="tab-menu">
        <button class="tab active">All</button>
        <button class="tab">Academic</button>
        <button class="tab">Events</button>
        <button class="tab">Administration</button>
        <button class="tab">Careers</button>
        <button class="tab">Organization</button>
      </div>

      <div class="announcement-list">
        <!-- Academic -->
        <div class="announcement-card purple">
          <h2>Informasi Akademik</h2>
          <p>- Jadwal UTS & UAS sudah diumumkan. Cek di dashboard masing-masing.</p>
          <p>- Pengisian KRS dimulai tanggal 15 Mei 2025.</p>
          <p>- Revisi jadwal kuliah maksimal sampai 20 Mei 2025.</p>
          <button class="btn-more">More About</button>
        </div>

        <!-- Events -->
        <div class="announcement-card orange">
          <h2>Event dan Kegiatan Kampus</h2>
          <p>- Seminar AI & IoT akan dilaksanakan pada 25 Mei 2025.</p>
          <p>- Workshop Machine Learning terbuka untuk semua mahasiswa.</p>
          <p>- Pendaftaran lomba Hackathon ditutup pada akhir bulan ini.</p>
          <button class="btn-more">More About</button>
        </div>

        <!-- Administration -->
        <div class="announcement-card blue">
          <h2>Informasi Administratif</h2>
          <p>- Batas akhir pembayaran semester genap adalah 30 Mei 2025.</p>
          <p>- Mahasiswa yang akan mengajukan cuti akademik dapat melakukannya melalui student service.</p>
          <button class="btn-more">More About</button>
        </div>

        <!-- Internship & Job -->
        <div class="announcement-card green">
          <h2>Internship & Job</h2>
          <p>- Lowongan magang bidang IT di PT. Inovasi Digital.</p>
          <p>- Program Internship di Tokopedia, pendaftaran dibuka sampai 20 Juni 2025.</p>
          <p>- Career Fair akan dilaksanakan pada 15 Juni 2025.</p>
          <button class="btn-more">More About</button>
        </div>

        <!-- Organisasi -->
        <div class="announcement-card yellow">
          <h2>Kegiatan Organisasi</h2>
          <p>- Pemilihan Ketua Himpunan Mahasiswa Informatika 2025.</p>
          <p>- Open House UKM (Unit Kegiatan Mahasiswa) pada 5 Juni 2025.</p>
          <p>- Recruitment anggota baru untuk BEM dan DPM.</p>
          <button class="btn-more">More About</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
