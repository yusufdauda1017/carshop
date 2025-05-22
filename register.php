<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Join CarShop - Simple & Secure Signup</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/CSS/signUp.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
  <header class="header">
    <a href="./index.php" class="company-logo">
      <i class="fas fa-car"></i>
      CarShop
    </a>
  </header>

  <div class="signup-container">
    <div class="progress-steps">
      <div class="step active">1</div>
      <div class="step">2</div>
      <div class="step">3</div>
      <div class="step">4</div>
    </div>
<!-- Step 1: Account Type -->
<div class="form-step active" id="step1">
  <h2>Welcome to CarShop</h2>
  <p>Choose your signup method</p>

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

  <div class="form-group">
    <div class="floating-label">
      <input type="email" class="form-input" placeholder="Enter your email" id="email" required>
      <label for="email">Email</label>
      <div class="error-message"></div>
    </div>
  </div>

  <button class="submit-btn" onclick="nextStep(2)">Continue</button>

  <!-- Add this login link right after the Continue button -->
  <div class="login-link" style="text-align: center; margin-top: 1.5rem;">
    Already have an account? <a href="./login.php">Log in</a>
  </div>
</div>

    <!-- Step 2: Account Details -->
    <div class="form-step" id="step2">
      <h2>Create Your Account</h2>

      <div class="form-group">
        <div class="floating-label">
          <input type="text" class="form-input" placeholder="Full name" id="fullName" required>
          <label for="fullName">Full Name</label>
          <div class="error-message"></div>
        </div>

        <div class="floating-label password-container">
          <input type="password" class="form-input" placeholder="Create password" id="password" required>
          <label for="password">Password</label>
          <span class="password-toggle" onclick="togglePasswordVisibility('password', this)">
            <i class="fas fa-eye"></i>
          </span>
          <div class="password-strength-meter">
            <div class="strength-bar"></div>
            <div class="strength-text"></div>
          </div>
          <div class="error-message"></div>
        </div>

        <div class="floating-label password-container">
          <input type="password" class="form-input" placeholder="Confirm password" id="confirmPassword" required>
          <label for="confirmPassword">Confirm Password</label>
          <span class="password-toggle" onclick="togglePasswordVisibility('confirmPassword', this)">
            <i class="fas fa-eye"></i>
          </span>
          <div class="error-message"></div>
        </div>

        <div class="phone-input">
          <div class="custom-select" id="countrySelect">
            <div class="selected-option form-input" onclick="toggleOptions()">
              <img src="./assets/Image/flags/Nigeria-01-1.png" alt="Nigeria Flag">
              <span id="selectedText">+234</span>
            </div>
            <div class="options-list" id="optionsList">
              <div class="option-item" onclick="selectCountry( '+234', './assets/Image/flags/Nigeria-01-1.png')">
                <img src="./assets/Image/flags/Nigeria-01-1.png" alt="Nigeria Flag">
                +234
              </div>
              <div class="option-item" onclick="selectCountry( '+227', './assets/Image/flags/Niger-01-1.png')">
                <img src="./assets/Image/flags/Niger-01-1.png" alt="Niger Flag">
                +227
              </div>
              <div class="option-item" onclick="selectCountry( '+237', './assets/Image/flags/Flag-of-Cameroonian-01-3.png')">
                <img src="./assets/Image/flags/Flag-of-Cameroonian-01-3.png" alt="Cameroon Flag">
                +237
              </div>
              <div class="option-item" onclick="selectCountry('+229', './assets/Image/flags/Flag-of-Benin-01-1.png')">
                <img src="./assets/Image/flags/Flag-of-Benin-01-1.png" alt="Benin Flag">
                +229
              </div>
            </div>
          </div>

          <input type="tel" class="form-input" placeholder="Phone number" id="phone" required>

          <div class="error-message"></div>
        </div>
      </div>

      <div class="form-navigation">
        <button class="back-btn" onclick="prevStep(1)">Back</button>
        <button class="submit-btn" onclick="nextStep(3)">Continue</button>
      </div>
    </div>

    <!-- Step 3: Personal Information -->
    <div class="form-step" id="step3">
      <h2>Personal Information</h2>

      <div class="form-group">
        <div class="form-row">
          <div class="floating-label">
            <input type="date" class="form-input" id="dob" required>
            <label for="dob">Date of Birth</label>
            <div class="error-message"></div>
          </div>

          <div class="floating-label">
            <select class="form-input" id="gender" required>
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
              <option value="prefer-not-to-say">Prefer not to say</option>
            </select>
            <label for="gender">Gender</label>
            <div class="error-message"></div>
          </div>
        </div>

        <div class="floating-label">
          <input type="text" class="form-input" placeholder="Street Address" id="street" required>
          <label for="street">Street Address</label>
          <div class="error-message"></div>
        </div>

        <div class="form-row">
          <div class="floating-label">
            <select class="form-input" id="country" onchange="loadStates(this.value)" required>
              <option value="">Select Country</option>
            </select>
            <label for="country">Country</label>
            <div class="error-message"></div>
          </div>
          <div class="floating-label" id="state-container">
            <input type="text" class="form-input" placeholder="State/Province" id="state" required>
            <label for="state">State/Province</label>
            <div class="error-message"></div>
          </div>
        </div>
      </div>

      <div class="form-navigation">
        <button class="back-btn" onclick="prevStep(2)">Back</button>
        <button class="submit-btn" onclick="nextStep(4)">Continue</button>
      </div>
    </div>

    <!-- Step 4: Terms & Conditions -->
    <div class="form-step" id="step4">
      <h2>Terms & Conditions</h2>

      <div class="terms-container">
        <input type="checkbox" id="terms" class="form-input" required>
        <label for="terms">I agree to the <a href="/terms" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a></label>
        <div class="error-message"></div>
      </div>

     <div class="form-group">
    <div class="g-recaptcha" data-sitekey="6Lfk0DUrAAAAAPf33ql7IZplvMrg9cdfG0Bj-4h_"></div>
</div>
      <div class="form-navigation">
        <button class="back-btn" onclick="prevStep(3)">Back</button>
        <button class="submit-btn" onclick="validateAndSubmitForm()">Complete Signup</button>
      </div>
    </div>
  </div>

  <script src="./assets/JAVASCRIPT/signup.js"></script>
</body>
</html>