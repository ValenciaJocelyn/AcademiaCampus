<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Service</title>

  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/studentServices.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
          <li class="active"><a href="{{ url('/student-services') }}"><i class="fas fa-user-graduate"></i> Student Services</a></li>
          <li><a href="{{ url('/courses') }}"><i class="fas fa-book"></i> Courses</a></li>
          <li><a href="{{ url('/schedule') }}"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
          <li><a href="{{ url('/attendance') }}"><i class="fas fa-clipboard-check"></i> Attendance</a></li>
          <li><a href="{{ url('/grade') }}"><i class="fas fa-chart-bar"></i> Grade</a></li>
          <li><a href="{{ url('/shuttle-booking') }}"><i class="fa-solid fa-van-shuttle"></i> Shuttle Booking</a></li>
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
          <h2>Student Services</h2>
        </div>

        <div class="profile">
          <i class="fas fa-bell notification"></i>
          <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User" class="avatar">
        </div>
      </header>

      <div class="services">
        <nav class="service-nav">
          <ul>
            <li><a href="#course-registration">Course Registration</a></li>
            <li><a href="#academic-counseling">Academic Counseling</a></li>
            <li><a href="#library-services">Library Services</a></li>
            <li><a href="#career-center">Career Center</a></li>
            <li><a href="#health-services">Health Services</a></li>
            <li><a href="#student-organizations">Student Organizations</a></li>
          </ul>
        </nav>

        <section id="financial" class="card-section">
          <h2>Financial</h2>
          <div class="card">
            <h3>Tagihan Aktif</h3>
            <p>SPP Semester Genap 2025: Rp 10.000.000</p>
            <button>Bayar Sekarang</button>
          </div>
        </section>

        <section id="ebook" class="card-section">
          <h2>Pembelian E-Book</h2>
          <div class="card">
            <h3>E-Book: Algoritma Pemrograman</h3>
            <p>Harga: Rp 75.000</p>
            <button>Beli E-Book</button>
          </div>
        </section>

        <section id="toefl" class="card-section">
          <h2>Pendaftaran TOEFL</h2>
          <div class="card">
            <h3>Tes TOEFL - 20 Juni 2025</h3>
            <p>Biaya: Rp 450.000</p>
            <button>Daftar TOEFL</button>
          </div>
        </section>

        <section id="surat" class="card-section">
          <h2>Permohonan Surat</h2>
          <div class="card">
            <h3>Ajukan Surat</h3>
            <p>Jenis: Surat Keterangan Aktif Kuliah</p>
            <button>Ajukan Surat</button>
          </div>
        </section>

        <section id="biodata" class="card-section">
          <h2>Update Data Pribadi</h2>
          <div class="card">
            <h3>Edit Biodata</h3>
            <p>Nama, Alamat, Kontak, dan lainnya</p>
            <button>Update Data</button>
          </div>
        </section>

        <section id="sidang" class="card-section">
          <h2>Pendaftaran Sidang / Yudisium</h2>
          <div class="card">
            <h3>Formulir Pendaftaran</h3>
            <p>Semester ini: Terbuka</p>
            <button>Daftar Sekarang</button>
          </div>
        </section>

        <section id="konsultasi" class="card-section">
          <h2>Konsultasi Dosen Wali</h2>
          <div class="card">
            <h3>Jadwal Konsultasi</h3>
            <p>Dosen: Dr. Ahmad Ridwan, M.Kom</p>
            <button>Buat Janji</button>
          </div>
        </section>

        <section id="cuti" class="card-section">
          <h2>Pengajuan Cuti / DO</h2>
          <div class="card">
            <h3>Formulir Pengajuan</h3>
            <p>Cuti Akademik maksimal 2 semester</p>
            <button>Ajukan Sekarang</button>
          </div>
        </section>

        <section id="masalah" class="card-section">
          <h2>Laporan Masalah Akademik</h2>
          <div class="card">
            <h3>Lapor Kendala</h3>
            <p>Contoh: Nilai tidak muncul, jadwal bentrok</p>
            <button>Lapor Sekarang</button>
          </div>
        </section>

        <section id="beasiswa" class="card-section">
          <h2>Informasi & Pengajuan Beasiswa</h2>
          <div class="card">
            <h3>Beasiswa Prestasi Akademik</h3>
            <p>Deadline: 30 Juni 2025</p>
            <button>Ajukan Beasiswa</button>
          </div>
        </section>
      </div>

      <!-- <footer>
        <p>&copy; 2025 Student Service - Academia Campus</p>
      </footer> -->
    </main>
  </div>

  <script src="{{ asset('scripts/default.js') }}"></script>
</body>
</html>
