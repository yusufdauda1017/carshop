<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password | CarShop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/CSS/auth.css"> <!-- Shared auth styles -->
</head>
<body>
  <header class="header">
    <a href="/" class="company-logo">
      <i class="fas fa-car"></i>
      CarShop
    </a>
  </header>

  <div class="auth-container">
    <div class="auth-header">
      <h1>Forgot Password?</h1>
      <p>Enter your email to reset your password</p>
    </div>

    <form id="forgotPasswordForm">
      <div class="form-group">
        <div class="floating-label">
          <input type="email" class="form-input" placeholder="Enter your email" id="resetEmail" required>
          <label for="resetEmail">Email Address</label>
          <div class="error-message" id="emailError"></div>
        </div>
      </div>

      <button type="submit" class="submit-btn" id="resetSubmit">
        Send Reset Link
      </button>
    </form>

    <div class="auth-footer">
      <p>Remember your password? <a href="./login.php">Log in</a></p>
      <p>Don't have an account? <a href="./register.php">Sign up</a></p>
    </div>
  </div>

  <script src="./assets/JAVASCRIPT/auth.js"></script>
</body>
</html>