<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to CarShop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/CSS/login.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <header class="header">
    <a href="./index.php" class="company-logo">
      <i class="fas fa-car"></i>
      CarShop
    </a>
  </header>

  <div class="login-container">
    <div class="login-header">
      <h1>Welcome back</h1>
      <p>Log in to your CarShop account</p>
    </div>

    <div class="social-login">
      <button class="social-btn google">
        <i class="fab fa-google"></i>
        Continue with Google
      </button>
      <button class="social-btn facebook">
        <i class="fab fa-facebook"></i>
        Continue with Facebook
      </button>
    </div>

    <div class="divider">or use email</div>

    <form id="loginForm">
      <div class="form-group">
        <div class="floating-label">
          <input type="email" class="form-input" placeholder="Enter your email" id="loginEmail" required>
          <label for="loginEmail">Email</label>
          <div class="error-message" id="emailError"></div>
        </div>
      </div>

      <div class="form-group">
       <div class="floating-label password-container">
  <input type="password" class="form-input" placeholder="Enter your password" id="loginPassword" required>
  <label for="loginPassword">Password</label>
  <span class="password-toggle" onclick="togglePasswordVisibility('loginPassword', this)">
    <i class="fas fa-eye"></i>
  </span>
  <div class="error-message" id="passwordError"></div>
</div>
        <div class="forgot-password">
          <a href="./forgotpass.php">Forgot password?</a>
        </div>
      </div>

     <div class="g-recaptcha" data-sitekey="6Lfk0DUrAAAAAPf33ql7IZplvMrg9cdfG0Bj-4h_"></div>


      <button type="submit" class="submit-btn" id="loginSubmit">
        Log In
      </button>
    </form>

    <div class="signup-link">
      Don't have an account? <a href="./register.php">Sign up</a>
    </div>
  </div>

  <script src="./assets/JAVASCRIPT/login.js"></script>

</body>
</html>