document.addEventListener('DOMContentLoaded', function() {
  setupEventListeners();
});

function setupEventListeners() {
  const loginForm = document.getElementById('loginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', handleLogin);
  }

  document.querySelectorAll('.social-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      alert('Social login coming soon!');
    });
  });

  const emailInput = document.getElementById('loginEmail');
  if (emailInput) {
    emailInput.addEventListener('input', function() {
      validateEmail(this);
    });
  }

  const passwordInput = document.getElementById('loginPassword');
  if (passwordInput) {
    passwordInput.addEventListener('input', function() {
      if (this.value.trim()) {
        clearError(this);
      }
    });
  }
}

function togglePasswordVisibility(inputId, toggleElement) {
  const input = document.getElementById(inputId);
  const icon = toggleElement.querySelector('i');

  if (input.type === 'password') {
    input.type = 'text';
    icon.classList.replace('fa-eye', 'fa-eye-slash');
  } else {
    input.type = 'password';
    icon.classList.replace('fa-eye-slash', 'fa-eye');
  }
}

function validateEmail(input) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const errorElement = document.getElementById('emailError');

  if (!input.value.trim()) {
    showError(input, errorElement, 'Email is required');
    return false;
  }

  if (!emailRegex.test(input.value)) {
    showError(input, errorElement, 'Please enter a valid email address');
    return false;
  }

  clearError(input, errorElement);
  return true;
}

function showError(input, errorElement, message) {
  input.classList.add('error');
  errorElement.textContent = message;
  errorElement.style.display = 'block';
}

function clearError(input, errorElement) {
  input.classList.remove('error');
  errorElement.style.display = 'none';
}

async function handleLogin(e) {
  e.preventDefault();

  const email = document.getElementById('loginEmail');
  const password = document.getElementById('loginPassword');
  const emailError = document.getElementById('emailError');
  const passwordError = document.getElementById('passwordError');
  const submitBtn = document.getElementById('loginSubmit');

  let isValid = true;

  // Validate email
  if (!validateEmail(email)) {
    isValid = false;
  }

  // Validate password
  if (!password.value.trim()) {
    showError(password, passwordError, 'Password is required');
    isValid = false;
  } else if (password.value.length < 8) {
    showError(password, passwordError, 'Password must be at least 8 characters');
    isValid = false;
  } else {
    clearError(password, passwordError);
  }

  // Validate reCAPTCHA
  const recaptchaResponse = grecaptcha.getResponse();
  if (!recaptchaResponse) {
    alert('Please complete the reCAPTCHA');
    isValid = false;
  }

  if (!isValid) return;

  // Show loading state
  const originalText = submitBtn.innerHTML;
  submitBtn.disabled = true;
  submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';

  try {
    const formData = new FormData();
    formData.append('email', email.value.trim());
    formData.append('password', password.value.trim());
    formData.append('recaptcha_response', recaptchaResponse);

    const response = await fetch('./loginlogic.php', {
      method: 'POST',
      body: formData,
    });

    const data = await response.json();

    if (response.ok && data.success) {
      alert('Login successful!');
      // window.location.href = '/dashboard';
    } else {
      showError(password, passwordError, data.message || 'Invalid email or password');
    }

  } catch (error) {
    console.error('Login error:', error);
    showError(password, passwordError, 'Server error occurred');
  } finally {
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
    grecaptcha.reset(); // Reset reCAPTCHA for retry
  }
}
