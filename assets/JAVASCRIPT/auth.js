// Forgot Password Form Handling
document.getElementById('forgotPasswordForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  
  const email = document.getElementById('resetEmail');
  const emailError = document.getElementById('emailError');
  const submitBtn = document.getElementById('resetSubmit');
  
  // Validate email
  if (!email.value.trim()) {
    showError(email, emailError, 'Email is required');
    return;
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email.value)) {
    showError(email, emailError, 'Please enter a valid email address');
    return;
  }

  // Show loading state
  const originalText = submitBtn.innerHTML;
  submitBtn.disabled = true;
  submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';

  try {
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 1500));
    
    // Show success message
    alert('Password reset link sent to your email!');
    email.value = '';
    
  } catch (error) {
    console.error('Error:', error);
    showError(email, emailError, 'Error sending reset link. Please try again.');
  } finally {
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
  }
});

function showError(input, errorElement, message) {
  input.classList.add('error');
  errorElement.textContent = message;
  errorElement.style.display = 'block';
}