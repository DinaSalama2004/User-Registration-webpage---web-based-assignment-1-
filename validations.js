let username = document.getElementById('userName');
let password = document.getElementById('password');
let isUsernameAvailable = false; // Track username availability
let confirmPass = document.getElementById('confirmPassword');
let fileInput = document.getElementById('fileInput'); // Assuming the file input has an id of 'fileInput'
// showBootstrapAlert("usernameAlert", "Username is already taken, try another one");





username.onkeyup = function () {
    const user = username.value.trim();

    if (user === "") {
        showBootstrapAlert("usernameAlert", "Username cannot be empty");
        isUsernameAvailable = false;
        return;
    }

    if (user.length >= 3) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "taken") {
                    showBootstrapAlert("usernameAlert", "Username is already taken, try another one");
                    isUsernameAvailable = false;
                } else {
                    hideBootstrapAlert("usernameAlert");
                    isUsernameAvailable = true;
                }
            }
        };
        hideBootstrapAlert("usernameAlert");
        xhr.send("username=" + encodeURIComponent(user));
    } else {
        showBootstrapAlert("usernameAlert", "Username must be at least 3 characters long");
        isUsernameAvailable = false;
        this.focus();
        return false;
    }
};


const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$/;

password.onblur = function () {
    if (!passwordRegex.test(this.value)) {
        // Show error message
        showBootstrapAlert("passwordAlert", "Password must be at least 8 characters long, contain at least one number, and one special character.");

        // this.focus();
        return false;
    }

    hideBootstrapAlert("passwordAlert");
};


confirmPass.onblur = function () {
    if (this.value != password.value) {
        showBootstrapAlert("confirmPasswordAlert", "Passwords do not match");        // Disable the file input to prevent file upload
        // fileInput.disabled = true;  

        // this.focus();
        return false;

    }
    hideBootstrapAlert("confirmPasswordAlert");
    fileInput.disabled = false;

};  






function validateNotEmpty(inputId, alertId, message) {
    const input = document.getElementById(inputId);

    input.onkeyup = function () {
        if (!input.value.trim()) {
            showBootstrapAlert(alertId, message);
        } else {
            hideBootstrapAlert(alertId);
        }
    };
}

function validatePhone(inputId, alertId, message) {
    const input = document.getElementById(inputId);
    const phoneRegex = /^01(1|2|5|0)[0-9]{8}$/; // Adjust phone regex as per your needs

    input.onkeyup = function () {
        if (!input.value.trim()) {
            showBootstrapAlert(alertId, message);
        } else if (!phoneRegex.test(input.value)) {
            showBootstrapAlert(alertId, "Please enter a valid phone number.");
        } else {
            hideBootstrapAlert(alertId);
        }
    };
}


function validateEmail(inputId, alertId, message) {
    const input = document.getElementById(inputId);
    const emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/; // Check for @gmail.com domain

    input.onkeyup = function () {
        if (!input.value.trim()) {
            showBootstrapAlert(alertId, message);
        } else if (!emailRegex.test(input.value)) {
            showBootstrapAlert(alertId, "Please enter a valid Gmail address.");
        } else {
            hideBootstrapAlert(alertId);
        }
    };
}

validateNotEmpty("fullName", "fullNameAlert", "Full Name is required");
validateNotEmpty("phone", "phoneAlert", "Phone number is required");
validatePhone("phone", "phoneAlert", "Phone number is required");
validateNotEmpty("whatsappNumber", "whatsappAlert", "WhatsApp number is required");
validateNotEmpty("address", "addressAlert", "Address is required");
validateNotEmpty("email", "emailAlert", "Email is required");
validateEmail("email", "emailAlert", "Email must be a Gmail address");



// helper functions to show error 

function showBootstrapAlert(id, message) {
    const alertDiv = document.getElementById(id);
    if (alertDiv) {
        alertDiv.textContent = message;
        alertDiv.classList.remove("d-none");
    }
}

function hideBootstrapAlert(id) {
    const alertDiv = document.getElementById(id);
    if (alertDiv) {
        alertDiv.classList.add("d-none");
    }
}