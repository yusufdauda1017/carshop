// Global variables
let currentStep = 1;
let formData = {};

// Initialize the form when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    loadCountries();
    setupEventListeners();
});

// ======================
// TOAST NOTIFICATION SYSTEM
// ======================

function showToast(type, message) {
    const toastContainer = document.getElementById('toastContainer') || createToastContainer();
    const toastId = 'toast-' + Date.now();
    const iconClass = type === 'success' ? 'fa-check-circle' :
                     type === 'danger' ? 'fa-exclamation-circle' :
                     type === 'info' ? 'fa-info-circle' : 'fa-bell';

    const toast = document.createElement('div');
    toast.id = toastId;
    toast.className = `custom-toast show ${type}`;
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'polite');
    toast.setAttribute('aria-atomic', 'true');

    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas ${iconClass}"></i>
            <span class="toast-message">${message}</span>
            <button type="button" class="toast-close" aria-label="Close">
                &times;
            </button>
        </div>
    `;

    toastContainer.appendChild(toast);

    // Auto-dismiss after 5 seconds
    const autoDismiss = setTimeout(() => {
        dismissToast(toastId);
    }, 5000);

    // Manual dismissal
    toast.querySelector('.toast-close').addEventListener('click', () => {
        clearTimeout(autoDismiss);
        dismissToast(toastId);
    });
}

function dismissToast(toastId) {
    const toast = document.getElementById(toastId);
    if (toast) {
        toast.classList.add('hide');
        setTimeout(() => toast.remove(), 300);
    }
}

function createToastContainer() {
    const container = document.createElement('div');
    container.id = 'toastContainer';
    container.className = 'custom-toast-container';
    document.body.appendChild(container);
    return container;
}

// ======================
// STEP NAVIGATION FUNCTIONS
// ======================

function nextStep(step) {
    if (!validateCurrentStep()) return;

    saveFormData();
    updateStepUI(step);
    currentStep = step;

    // Scroll to top of form when changing steps
    document.querySelector('.signup-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function prevStep(step) {
    updateStepUI(step);
    currentStep = step;

    // Scroll to top of form when changing steps
    document.querySelector('.signup-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function updateStepUI(step) {
    // Update form steps visibility
    document.querySelectorAll('.form-step').forEach(function(el) {
        el.classList.remove('active');
    });

    // Update progress steps
    document.querySelectorAll('.step').forEach(function(el, index) {
        if (index < step) {
            el.classList.add('active');
        } else {
            el.classList.remove('active');
        }
    });

    // Show current step
    document.getElementById('step' + step).classList.add('active');
}

// ======================
// VALIDATION FUNCTIONS
// ======================

function validateCurrentStep() {
    switch (currentStep) {
        case 1: return validateStep1();
        case 2: return validateStep2();
        case 3: return validateStep3();
        case 4: return validateStep4();
        default: return true;
    }
}

function validateStep1() {
    const email = document.getElementById('email');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email.value.trim()) {
        showError(email, 'Email is required');
        return false;
    }

    if (!emailRegex.test(email.value)) {
        showError(email, 'Please enter a valid email address');
        return false;
    }

    clearError(email);
    return true;
}

function validateStep2() {
    const fullName = document.getElementById('fullName');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const phone = document.getElementById('phone');
    let isValid = true;

    // Validate full name
    if (!fullName.value.trim()) {
        showError(fullName, 'Full name is required');
        isValid = false;
    } else {
        clearError(fullName);
    }

    // Validate password
    if (password.value.length < 8) {
        showError(password, 'Password must be at least 8 characters');
        isValid = false;
    } else {
        clearError(password);
    }

    // Validate password confirmation
    if (password.value !== confirmPassword.value) {
        showError(confirmPassword, 'Passwords do not match');
        isValid = false;
    } else if (confirmPassword.value.length > 0) {
        clearError(confirmPassword);
    }

    // Validate phone number
    if (!phone.value.trim()) {
        showError(phone, 'Phone number is required');
        isValid = false;
    } else {
        // Remove any formatting before validation
        const rawPhone = phone.value.replace(/\D/g, '');
        if (!/^\d{8,15}$/.test(rawPhone)) {
            showError(phone, 'Please enter a valid phone number');
            isValid = false;
        } else {
            clearError(phone);
        }
    }

    return isValid;
}

function validateStep3() {
    const dob = document.getElementById('dob');
    const gender = document.getElementById('gender');
    const street = document.getElementById('street');
    const country = document.getElementById('country');
    const state = document.getElementById('state');
    let isValid = true;

    // Validate date of birth
    if (!dob.value) {
        showError(dob, 'Date of birth is required');
        isValid = false;
    } else {
        // Validate age (at least 18 years old)
        const dobDate = new Date(dob.value);
        const today = new Date();
        let age = today.getFullYear() - dobDate.getFullYear();
        const monthDiff = today.getMonth() - dobDate.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobDate.getDate())) {
            age--;
        }

        if (age < 18) {
            showError(dob, 'You must be at least 18 years old');
            isValid = false;
        } else {
            clearError(dob);
        }
    }

    // Validate gender
    if (!gender.value) {
        showError(gender, 'Gender is required');
        isValid = false;
    } else {
        clearError(gender);
    }

    // Validate street address
    if (!street.value.trim()) {
        showError(street, 'Street address is required');
        isValid = false;
    } else {
        clearError(street);
    }

    // Validate country
    if (!country.value) {
        showError(country, 'Country is required');
        isValid = false;
    } else {
        clearError(country);
    }

    // Validate state/province
    if (!state.value) {
        showError(state, 'State/Province is required');
        isValid = false;
    } else {
        clearError(state);
    }

    return isValid;
}

function validateStep4() {
    const termsCheckbox = document.getElementById('terms');
    const termsContainer = document.querySelector('.terms-container');
    let isValid = true;

    if (!termsCheckbox.checked) {
        const errorElement = termsContainer.querySelector('.error-message');
        if (errorElement) {
            errorElement.textContent = 'You must agree to the Terms of Service and Privacy Policy';
            errorElement.style.display = 'block';
        }
        isValid = false;
    } else {
        const errorElement = termsContainer.querySelector('.error-message');
        if (errorElement) {
            errorElement.style.display = 'none';
        }
    }

    // Validate reCAPTCHA
    if (typeof grecaptcha !== 'undefined') {
        const recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            showToast('danger', 'Please complete the verification');
            isValid = false;
        }
    }

    return isValid;
}

// ======================
// PASSWORD FUNCTIONS
// ======================

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

function checkPasswordStrength(password) {
    let strength = 0;
    const strengthBar = document.querySelector('.strength-bar');
    const strengthText = document.querySelector('.strength-text');

    if (!password) {
        strengthBar.style.width = '0%';
        strengthBar.style.backgroundColor = 'transparent';
        strengthText.textContent = '';
        return;
    }

    // Check length
    if (password.length >= 8) strength += 1;
    if (password.length >= 12) strength += 1;

    // Check for mixed case
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;

    // Check for numbers
    if (/\d/.test(password)) strength += 1;

    // Check for special chars
    if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

    // Update UI based on strength
    switch(strength) {
        case 0:
        case 1:
            strengthBar.style.width = '20%';
            strengthBar.style.backgroundColor = 'var(--error)';
            strengthText.textContent = 'Weak';
            strengthText.style.color = 'var(--error)';
            break;
        case 2:
            strengthBar.style.width = '40%';
            strengthBar.style.backgroundColor = '#ff9800';
            strengthText.textContent = 'Fair';
            strengthText.style.color = '#ff9800';
            break;
        case 3:
            strengthBar.style.width = '60%';
            strengthBar.style.backgroundColor = '#ffc107';
            strengthText.textContent = 'Good';
            strengthText.style.color = '#ffc107';
            break;
        case 4:
            strengthBar.style.width = '80%';
            strengthBar.style.backgroundColor = '#4caf50';
            strengthText.textContent = 'Strong';
            strengthText.style.color = '#4caf50';
            break;
        case 5:
            strengthBar.style.width = '100%';
            strengthBar.style.backgroundColor = '#2e7d32';
            strengthText.textContent = 'Very Strong';
            strengthText.style.color = '#2e7d32';
            break;
    }
}

// ======================
// HELPER FUNCTIONS
// ======================

function showError(input, message) {
    const formGroup = input.closest('.floating-label') || input.closest('.form-group');
    let errorElement = formGroup.querySelector('.error-message');

    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        formGroup.appendChild(errorElement);
    }

    input.classList.add('error');
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

function clearError(input) {
    const formGroup = input.closest('.floating-label') || input.closest('.form-group');
    const errorElement = formGroup.querySelector('.error-message');

    if (errorElement) {
        errorElement.style.display = 'none';
    }

    input.classList.remove('error');
}

function formatPhoneNumber() {
    const phoneInput = document.getElementById('phone');
    const countryCode = phoneInput.getAttribute('data-country-code') || '';
    let phoneNumber = phoneInput.value.replace(/\D/g, '');

    // Format with spaces for better readability
    if (phoneNumber.length > 3 && phoneNumber.length <= 6) {
        phoneNumber = phoneNumber.replace(/(\d{3})(\d{1,3})/, '$1 $2');
    } else if (phoneNumber.length > 6) {
        phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{1,4})/, '$1 $2 $3');
    }

    phoneInput.value = countryCode + ' ' + phoneNumber;
}

function saveFormData() {
    formData = {
        email: document.getElementById('email').value,
        fullName: document.getElementById('fullName')?.value,
        password: document.getElementById('password')?.value,
        phone: document.getElementById('phone')?.value.replace(/\D/g, ''),
        dob: document.getElementById('dob')?.value,
        gender: document.getElementById('gender')?.value,
        street: document.getElementById('street')?.value,
        country: document.getElementById('country')?.value,
        state: document.getElementById('state')?.value
    };
    return formData;
}

// ======================
// COUNTRY/STATE FUNCTIONS
// ======================

async function loadCountries() {
    try {
        const response = await fetch('https://countriesnow.space/api/v0.1/countries');
        const result = await response.json();

        if (!result.error && result.data) {
            const countries = result.data;
            const countrySelect = document.getElementById('country');

            // Sort countries alphabetically
            countries.sort((a, b) => a.country.localeCompare(b.country));

            countrySelect.innerHTML = `
                <option value="">Select Country</option>
                ${countries.map(function(c) {
                    return `<option value="${c.country}">${c.country}</option>`;
                }).join('')}
            `;

            // Set default country if needed
            if (formData.country) {
                countrySelect.value = formData.country;
                loadStates(formData.country);
            }
        } else {
            throw new Error('Failed to load countries');
        }
    } catch (error) {
        console.error('Error loading countries:', error);
        const countrySelect = document.getElementById('country');
        countrySelect.innerHTML = `
            <option value="">Select Country</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Ghana">Ghana</option>
            <option value="South Africa">South Africa</option>
        `;
    }
}

async function loadStates(selectedCountry) {
    const stateContainer = document.getElementById('state-container');

    if (!selectedCountry) {
        stateContainer.innerHTML = `
            <input type="text" class="form-input" placeholder="State/Province" id="state" required>
            <label for="state">State/Province</label>
        `;
        return;
    }

    try {
        const response = await fetch('https://countriesnow.space/api/v0.1/countries/states', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ country: selectedCountry })
        });

        const result = await response.json();

        if (!result.error && result.data?.states?.length > 0) {
            const states = result.data.states;

            stateContainer.innerHTML = `
                <select class="form-input" id="state" required>
                    <option value="">Select State/Province</option>
                    ${states.map(function(state) {
                        return `<option value="${state.name}">${state.name}</option>`;
                    }).join('')}
                </select>
                <label for="state">State/Province</label>
            `;

            // Set default state if needed
            if (formData.state) {
                document.getElementById('state').value = formData.state;
            }
        } else {
            throw new Error('No states found for selected country');
        }
    } catch (error) {
        console.error('Error loading states:', error);
        stateContainer.innerHTML = `
            <input type="text" class="form-input" placeholder="State/Province" id="state" required>
            <label for="state">State/Province</label>
        `;

        if (formData.state) {
            document.getElementById('state').value = formData.state;
        }
    }
}

// ======================
// COUNTRY SELECTOR DROPDOWN
// ======================

function toggleOptions() {
    const optionsList = document.getElementById('optionsList');
    optionsList.style.display = optionsList.style.display === 'block' ? 'none' : 'block';
}

function selectCountry(code, flagPath) {
    document.querySelector('.selected-option img').src = flagPath;
    document.getElementById('optionsList').style.display = 'none';
}

// ======================
// EVENT LISTENERS
// ======================

function setupEventListeners() {
    // Social login buttons
    document.querySelectorAll('.social-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            alert('Social login coming soon!');
        });
    });

    // Email validation
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('input', function() {
            validateEmail(this);
        });
    }

    // Password strength meter
    const passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            checkPasswordStrength(this.value);
        });
    }

    // Password confirmation validation
    const confirmPassword = document.getElementById('confirmPassword');
    if (confirmPassword) {
        confirmPassword.addEventListener('input', function() {
            const password = document.getElementById('password').value;
            if (this.value && password !== this.value) {
                showError(this, 'Passwords do not match');
            } else {
                clearError(this);
            }
        });
    }

    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', formatPhoneNumber);
    }

    // Date of birth validation
    const dobInput = document.getElementById('dob');
    if (dobInput) {
        const today = new Date().toISOString().split('T')[0];
        dobInput.setAttribute('max', today);

        // Set default value if in formData
        if (formData.dob) {
            dobInput.value = formData.dob;
        }
    }

    // Country change listener
    const countrySelect = document.getElementById('country');
    if (countrySelect) {
        countrySelect.addEventListener('change', function() {
            loadStates(this.value);
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-select')) {
            const optionsList = document.getElementById('optionsList');
            if (optionsList) {
                optionsList.style.display = 'none';
            }
        }
    });

    // Real-time validation for all inputs
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim()) {
                clearError(this);
            }
        });
    });
}

// ======================
// FORM SUBMISSION
// ======================

async function validateAndSubmitForm() {
    if (!validateStep4()) return;

    const formData = saveFormData(); // Get form data
    let recaptchaResponse = '';

    if (typeof grecaptcha !== 'undefined') {
        recaptchaResponse = grecaptcha.getResponse();
    }

    const submitBtn = document.querySelector('#step4 .submit-btn');
    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';

    try {
        const response = await fetch('./include/register_logic.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                ...formData,
                recaptcha_response: recaptchaResponse
            })
        });

        const result = await response.json();

        if (result.success) {
            showToast('success', result.message || 'Registration successful!');
            // Redirect after 2 seconds to allow user to see the success message
            setTimeout(() => {
                window.location.href = result.redirect || 'dashboard.php';
            }, 2000);
        } else {
            showToast('danger', result.message || 'An error occurred during registration');
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.reset();
            }
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('danger', 'An error occurred. Please try again.');
        if (typeof grecaptcha !== 'undefined') {
            grecaptcha.reset();
        }
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    }
}

// Helper function for email validation
function validateEmail(input) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!input.value.trim()) {
        showError(input, 'Email is required');
        return false;
    } else if (!emailRegex.test(input.value)) {
        showError(input, 'Please enter a valid email address');
        return false;
    } else {
        clearError(input);
        return true;
    }
}