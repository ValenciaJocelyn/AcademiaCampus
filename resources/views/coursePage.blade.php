<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Courses - Academia Campus</title>
  <link rel="stylesheet" href="coursePage.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">🎓 Academia Campus</div>
        <nav>
          <ul>
            <li>🏠 Dashboard</li>
            <li class="active">📚 Courses</li>
            <li>💬 Discussion</li>
            <li>🗓️ Schedule</li>
            <li>⚙️ Settings</li>
          </ul>
        </nav>
      </aside>

    <!-- Main Content -->
    <main class="main-content">
      <div class="top-bar">
        <input type="text" class="search-bar" placeholder="Search your favorite course" />
        <div class="top-icons">
          <i class="fa-regular fa-bell"></i>
          <i class="fa-regular fa-user"></i>
        </div>
      </div>

      <section class="featured-courses">
        <h2>Featured Course</h2>
        <div class="featured-list">
          <div class="featured-card active">
            <h3>Basic Design System</h3>
            <p>12 Lessons • 40 Hours</p>
            <button>Buy Course</button>
          </div>
          <div class="featured-card">
            <h3>Machine Learning Basics</h3>
            <p>12 Lessons • 40 Hours</p>
            <button>Buy Course</button>
          </div>
          <div class="featured-card">
            <h3>Tutorial Pro Dribbble by Ari</h3>
            <p>12 Lessons • 40 Hours</p>
            <button>Buy Course</button>
          </div>
        </div>
      </section>

  
  <!-- New Courses Section -->
  <section class="course-section">
    <div class="featured-list">
      <div class="featured-card">
        <h3>Frontend Development</h3>
        <p>10 Lessons • 35 Hours</p>
        <button>Buy Course</button>
      </div>
      <div class="featured-card">
        <h3>UI/UX for Beginners</h3>
        <p>8 Lessons • 25 Hours</p>
        <button>Buy Course</button>
      </div>
      <div class="featured-card">
        <h3>JavaScript Mastery</h3>
        <p>15 Lessons • 50 Hours</p>
        <button>Buy Course</button>
      </div>
    </div>
  </section>


      <section class="recommended">
        <div class="section-header">
          <h2>Recommended Course</h2>
          <a href="#" class="see-all">SEE ALL</a>
        </div>
        <div class="recommended-list">
          <div class="recommended-card">
            <div class="info">
              <h4>Build landing page with figma</h4>
              <span>UX/UI DESIGN</span>
            </div>
            <div class="meta">
              <span>24 May 2022</span>
              <span>5.0 ★</span>
            </div>
          </div>
          <div class="recommended-card">
            <div class="info">
              <h4>Fundamentals of machine learning</h4>
              <span>TECHNOLOGY</span>
            </div>
            <div class="meta">
              <span>24 May 2022</span>
              <span>5.0 ★</span>
            </div>
          </div>
          <div class="recommended-card">
            <div class="info">
              <h4>Introduction to data science</h4>
              <span>PROGRAMMING</span>
            </div>
            <div class="meta">
              <span>24 May 2022</span>
              <span>5.0 ★</span>
            </div>
          </div>
        </div>
      </section>
    </main>


  <!-- Right Panel -->
<aside class="right-panel">
  <div class="profile-card">
    <img src="avatar.png" alt="Andre Maspion">
    <h3>Andre Maspion</h3>
    <p class="verified">Verified Student</p>
    <div class="stats">
      <div><strong>32</strong><span>Total Course</span></div>
      <div><strong>120</strong><span>Hours</span></div>
      <div><strong>5.0</strong><span>Rating</span></div>
    </div>
  </div>

  <div class="calendar">
    <h4>February 2022</h4>
    <div class="calendar-grid">
      <span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
      <span></span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
      <span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span>
      <span>14</span><span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span>
      <span>21</span><span>22</span><span class="active">23</span><span>24</span><span>25</span><span>26</span><span>27</span>
      <span>28</span>
    </div>
  </div>

  <!-- Schedule Class Section -->
<div class="schedule-class">
    <h4 class="schedule-title">Schedule Class</h4>
  
    <!-- Class Item 1 -->
    <div class="class-item active">
      <div class="date">
        <p class="day">02</p>
        <p class="month">FEB</p>
      </div>
      <div class="details">
        <p class="title">Basic HTML and CSS</p>
        <p class="meta">👥 2/3</p>
      </div>
      <div class="arrow">➔</div>
    </div>
  
    <!-- Class Item 2 -->
    <div class="class-item">
      <div class="date">
        <p class="day">04</p>
        <p class="month">FEB</p>
      </div>
      <div class="details">
        <p class="title">Fundamental Shiba Coin</p>
        <p class="meta">👥 2/3</p>
      </div>
    </div>
  
    <!-- Class Item 3 -->
    <div class="class-item">
      <div class="date">
        <p class="day">05</p>
        <p class="month">FEB</p>
      </div>
      <div class="details">
        <p class="title">How to survive in jungle</p>
        <p class="meta">👥 1/3</p>
      </div>
    </div>
  </div>
</aside>
