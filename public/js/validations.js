// public/js/validations.js - Updated with localization support and real-time email validation

document.addEventListener('DOMContentLoaded', function() {
    // Get current language from HTML lang attribute
    const currentLang = document.documentElement.lang || 'en';

    // Localized messages
    const messages = {
        en: {
            required: 'This field is required',
            invalidEmail: 'Please enter a valid email address',
            passwordsNotMatch: 'Passwords do not match',
            phoneDigits: 'Phone number must be 9 to 11 digits',
            usernameTaken: 'The username has already been taken.',
            usernameAvailable: 'Username is available',
            usernameMinLength: 'Username must be at least 3 characters',
            emailTaken: 'The email has already been taken.',
            emailAvailable: 'Email is available',
            passwordMinLength: 'Password must be at least 8 characters',
            passwordRequirements: 'Password must contain at least one number and one special character',
            addressMinLength: 'Address must be at least 5 characters',
            fullNameMinLength: 'Full name must be at least 2 characters'
        },
        ar: {
            required: 'هذا الحقل مطلوب',
            invalidEmail: 'يرجى إدخال عنوان بريد إلكتروني صحيح',
            passwordsNotMatch: 'كلمتا المرور غير متطابقتين',
            phoneDigits: 'رقم الهاتف يجب أن يكون من 9 إلى 11 رقماً',
            usernameTaken: 'اسم المستخدم هذا محجوز بالفعل',
            usernameAvailable: 'اسم المستخدم متاح',
            usernameMinLength: 'اسم المستخدم يجب أن يكون 3 أحرف على الأقل',
            emailTaken: 'البريد الإلكتروني هذا محجوز بالفعل',
            emailAvailable: 'البريد الإلكتروني متاح',
            passwordMinLength: 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            passwordRequirements: 'كلمة المرور يجب أن تحتوي على رقم واحد على الأقل ورمز خاص(@,$,!,%,*,#,?,&,.)',
            addressMinLength: 'العنوان يجب أن يكون 5 أحرف على الأقل',
            fullNameMinLength: 'الاسم الكامل يجب أن يكون حرفين على الأقل'
        }
    };

    const msg = messages[currentLang] || messages.en;

    // Form elements
    const form = document.getElementById('registrationForm');
    const fullNameInput = document.getElementById('fullName');
    const usernameInput = document.getElementById('userName');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const viewPasswordCheckbox = document.getElementById('viewPassword');

    // Alert elements
    const fullNameAlert = document.getElementById('fullNameAlert');
    const usernameAlert = document.getElementById('usernameAlert');
    const usernameAlertS = document.getElementById('usernameAlertS');
    const phoneAlert = document.getElementById('phoneAlert');
    const addressAlert = document.getElementById('addressAlert');
    const emailAlert = document.getElementById('emailAlert');
    const emailAlertS = document.getElementById('emailAlertS'); // Add this element to your HTML
    const passwordAlert = document.getElementById('passwordAlert');
    const confirmPasswordAlert = document.getElementById('confirmPasswordAlert');

    // Show/Hide password functionality
    if (viewPasswordCheckbox) {
        viewPasswordCheckbox.addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';
            passwordInput.type = type;
            confirmPasswordInput.type = type;
        });
    }

    // Validation functions
    function showError(element, message) {
        element.textContent = message;
        element.classList.remove('d-none');
    }

    function hideError(element) {
        element.classList.add('d-none');
    }

    function showSuccess(element, message) {
        element.textContent = message;
        element.classList.remove('d-none');
    }

    function validateFullName() {
        const value = fullNameInput.value.trim();
        if (value === '') {
            showError(fullNameAlert, msg.required);
            return false;
        } else if (value.length < 2) {
            showError(fullNameAlert, msg.fullNameMinLength);
            return false;
        } else {
            hideError(fullNameAlert);
            return true;
        }
    }

    function validateUsername() {
        const value = usernameInput.value.trim();
        if (value === '') {
            showError(usernameAlert, msg.required);
            hideError(usernameAlertS);
            return false;
        } else if (value.length < 3) {
            showError(usernameAlert, msg.usernameMinLength);
            hideError(usernameAlertS);
            return false;
        } else {
            hideError(usernameAlert);
            checkUsernameAvailability(value);
            return true;
        }
    }

    function validatePhone() {
        const value = phoneInput.value.trim();
        const phonePattern = /^\d{9,15}$/;
        if (value === '') {
            showError(phoneAlert, msg.required);
            return false;
        } else if (!phonePattern.test(value)) {
            showError(phoneAlert, msg.phoneDigits);
            return false;
        } else {
            hideError(phoneAlert);
            return true;
        }
    }

    function validateAddress() {
        const value = addressInput.value.trim();
        if (value === '') {
            showError(addressAlert, msg.required);
            return false;
        } else if (value.length < 5) {
            showError(addressAlert, msg.addressMinLength);
            return false;
        } else {
            hideError(addressAlert);
            return true;
        }
    }

    function validateEmail() {
        const value = emailInput.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (value === '') {
            showError(emailAlert, msg.required);
            hideError(emailAlertS);
            return false;
        } else if (!emailPattern.test(value)) {
            showError(emailAlert, msg.invalidEmail);
            hideError(emailAlertS);
            return false;
        } else {
            hideError(emailAlert);
            checkEmailAvailability(value);
            return true;
        }
    }

    function validatePassword() {
        const value = passwordInput.value;
        const hasNumber = /\d/.test(value);
        const hasSpecialChar = /[@$!%*#?&.]/.test(value);

        if (value === '') {
            showError(passwordAlert, msg.required);
            return false;
        } else if (value.length < 8) {
            showError(passwordAlert, msg.passwordMinLength);
            return false;
        } else if (!hasNumber || !hasSpecialChar) {
            showError(passwordAlert, msg.passwordRequirements);
            return false;
        } else {
            hideError(passwordAlert);
            return true;
        }
    }

    function validateConfirmPassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (confirmPassword === '') {
            showError(confirmPasswordAlert, msg.required);
            return false;
        } else if (password !== confirmPassword) {
            showError(confirmPasswordAlert, msg.passwordsNotMatch);
            return false;
        } else {
            hideError(confirmPasswordAlert);
            return true;
        }
    }

    // Username availability check
    function checkUsernameAvailability(username) {
        if (username.length >= 3) {
            fetch('/check-username', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ username: username })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'taken') {
                        showError(usernameAlert, msg.usernameTaken);
                        hideError(usernameAlertS);
                    } else {
                        hideError(usernameAlert);
                        showSuccess(usernameAlertS, msg.usernameAvailable);
                    }
                })
                .catch(error => {
                    console.error('Error checking username:', error);
                });
        }
    }

    // Email availability check (NEW FUNCTION)
    function checkEmailAvailability(email) {
        if (email && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ email: email })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'taken') {
                        showError(emailAlert, msg.emailTaken);
                        hideError(emailAlertS);
                    } else {
                        hideError(emailAlert);
                        showSuccess(emailAlertS, msg.emailAvailable);
                    }
                })
                .catch(error => {
                    console.error('Error checking email:', error);
                });
        }
    }

    // Event listeners
    if (fullNameInput) fullNameInput.addEventListener('blur', validateFullName);
    if (usernameInput) usernameInput.addEventListener('blur', validateUsername);
    if (phoneInput) phoneInput.addEventListener('blur', validatePhone);
    if (addressInput) addressInput.addEventListener('blur', validateAddress);
    if (emailInput) emailInput.addEventListener('blur', validateEmail);
    if (passwordInput) passwordInput.addEventListener('blur', validatePassword);
    if (confirmPasswordInput) confirmPasswordInput.addEventListener('blur', validateConfirmPassword);

    // Real-time validation (optional - triggers while typing)
    if (usernameInput) {
        usernameInput.addEventListener('input', function() {
            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                if (this.value.trim().length >= 3) {
                    validateUsername();
                }
            }, 500); // Wait 500ms after user stops typing
        });
    }

    if (emailInput) {
        emailInput.addEventListener('input', function() {
            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailPattern.test(this.value.trim())) {
                    validateEmail();
                }
            }, 500); // Wait 500ms after user stops typing
        });
    }

    // Form submission validation
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;

            isValid = validateFullName() && isValid;
            isValid = validateUsername() && isValid;
            isValid = validatePhone() && isValid;
            isValid = validateAddress() && isValid;
            isValid = validateEmail() && isValid;
            isValid = validatePassword() && isValid;
            isValid = validateConfirmPassword() && isValid;

            if (!isValid) {
                e.preventDefault();
                const errorMsg = document.getElementById('errorMessage');
                if (errorMsg) {
                    errorMsg.classList.remove('d-none');
                }
            }
        });
    }

    // Auto-hide success/error messages after 5 seconds
    setTimeout(function() {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        if (successMessage && !successMessage.classList.contains('d-none')) {
            successMessage.style.transition = 'opacity 0.5s';
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.classList.add('d-none'), 500);
        }

        if (errorMessage && !errorMessage.classList.contains('d-none')) {
            errorMessage.style.transition = 'opacity 0.5s';
            errorMessage.style.opacity = '0';
            setTimeout(() => errorMessage.classList.add('d-none'), 500);
        }
    }, 5000);
});
