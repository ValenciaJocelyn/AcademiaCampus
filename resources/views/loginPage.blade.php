<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Academia Campus</title>
  <link rel="stylesheet" href="loginPage.css" />
</head>
<body>
  <div class="container">
    <div class="form-box">
      <h2>Welcome Back</h2>

      <div class="google-container">
        <button class="google-btn">
          <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" />
          Log in with Google
        </button>
      </div>

      <div class="divider">OR LOGIN WITH EMAIL</div>

      <form>
        <input type="email" placeholder="Email Address" required />
        <input type="password" placeholder="Password" required />

        <div class="options">
          <label><input type="checkbox" /> Keep me logged in</label>
          <a href="#">Forgot your password?</a>
        </div>

        <button type="submit" class="login-btn">Log In</button>
      </form>

      <p class="signup-link">Don't have an account? <a href="registerPage.html">Sign up</a></p>
    </div>
  </div>
</body>
</html>
