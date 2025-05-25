<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Academia Campus</title>
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <span class="text">Academia <strong>Campus</strong></span>
      </div>
      <input type="checkbox" id="menu-toggle">
      <label for="menu-toggle" class="menu-icon">&#9776;</label>
      <ul class="nav-links">
        <li><a href="#">HOME</a></li>
        <li><a href="#">SERVICES</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">BLOG</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </nav>

    <div class="hero">
      <h1>ACADEMIA CAMPUS</h1>
      <p>
        Hello, there! 
        <br/>Log in to continue your educational journey 
        <br/>If you are a new one,
        please register to get your educational journey.
      </p>
      <div class="hero-buttons">
        <a href="{{ route('login') }}" class="btn learn">LOG IN</a>
        <a href="{{ route('register') }}" class="btn purchase">REGISTER</a>
      </div>
    </div>
  </header>
</body>
</html>