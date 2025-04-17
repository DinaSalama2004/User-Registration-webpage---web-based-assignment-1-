//keyup" means that the code runs every time the user releases a key while typing in the username field.
let username = document.getElementById('userName');
let password = document.getElementById('password');
let isUsernameAvailable = false; // Track username availability
let confirmPass = document.getElementById('confirmPassword');
let fileInput = document.getElementById('fileInput'); // Assuming the file input has an id of 'fileInput'


username.onkeyup = function () {
    var user = username.value.trim();
    var statusMessage = document.getElementById("username_status");

    if (user === "") {
        statusMessage.innerHTML = "";
        isUsernameAvailable = false;
        return;
    }

    if (user.length >= 3) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php", true); // Now requests index.php directly
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "taken") {
                    statusMessage.innerHTML = "<span class='text-danger'>Username already taken , try another user name</span>";
                    isUsernameAvailable = false;
                } else {
                    statusMessage.innerHTML = "<span class='text-success'>Username available </span>";
                    isUsernameAvailable = true;
                }
            }
        }
    };
    //Sends the username to index.php in a URL-encoded format (username=somevalue).
    xhr.send("username=" + encodeURIComponent(user));
};

let nameLength = document.createElement("p");
nameLength.textContent = "username must be at least 3 characters long";
nameLength.style.fontSize = "15px";
nameLength.style.color = "red";
nameLength.style.margin = "0";

username.onblur = function () {
    if (this.value.length < 3) {
        username.parentNode.insertBefore(nameLength, username.nextSibling.nextSibling);
        this.focus();
        return false;
    }
    if (username.nextSibling.nextSibling.tagName == "P") {
        username.nextSibling.nextSibling.remove();

    }

    if (!isUsernameAvailable) {
        username.focus(); // Force user to stay in username field
        return false;
    }
};

let passlength = document.createElement("P");
passlength.textContent = "Password must be at least 8 characters long, contain at least one number, and one special character (e.g., @, #, $, etc.).";
passlength.style.fontSize = "15px";
passlength.style.color = "red";
passlength.style.margin = "0";

const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$/;

password.onblur = function () {
    if (!passwordRegex.test(this.value)) {
        // Show error message
        if (!password.nextElementSibling || password.nextElementSibling.tagName !== "P") {
            password.parentNode.insertBefore(passlength, password.nextSibling.nextSibling);
        }
        this.focus();
        return false;
    }

    // Remove error message if valid
    if (password.nextElementSibling && password.nextElementSibling.tagName === "P") {
        password.nextElementSibling.remove();
    }
};

let confirmed = document.createElement("P");
confirmed.textContent = "Passwords do not match , try again";
confirmed.style.fontSize = "15px";
confirmed.style.color = "red";
confirmed.style.margin = "0";

confirmPass.onblur = function () {
    if (this.value != password.value) {
        confirmPass.parentNode.insertBefore(confirmed, confirmPass.nextSibling.nextSibling);
        // Disable the file input to prevent file upload
        fileInput.disabled = true;  // Disable the file input
        this.focus();
        return false;

    }
    if (confirmPass.nextSibling.nextSibling.tagName == "P") {
        confirmPass.nextSibling.nextSibling.remove();

    }
    fileInput.disabled = false;

};


/* whatsapp number validation */
var countryPrefix = document.getElementById("countryPrefix");
var whatsappNumber = document.getElementById('whatsappNumber');
var checkWhatsappNumberBtn = document.getElementById("checkWhatsappNumberBtn");
var apiKey = "016594cd32mshadfb3ed6c008eebp17d63bjsnf03b7ec16629";
var whatsappMsg = document.getElementById("whatsappMsg");

checkWhatsappNumberBtn.addEventListener("click", function () {
    var whatsappNumberValue = whatsappNumber.value;
    whatsappNumberValue = countryPrefix.value + whatsappNumberValue;
    if (checkWhatsappNumber(whatsappNumberValue) == true) {
        successMsg(whatsappMsg, "Valid Whatsapp Number!");
    }
    else {
        errorMsg(whatsappMsg, "Invalid Whatsapp Number!");
    }
})

async function checkWhatsappNumber(number) {
    try {
        var response = await fetch("https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken", {
            method: "POST",
            body: JSON.stringify(
                {
                    phone_number: number
                }
            ),
            headers: {
                'Content-Type': 'application/json',
                'x-rapidapi-host': 'whatsapp-number-validator3.p.rapidapi.com',
                'x-rapidapi-key': 'c8f257b4f5msh2e0fe7adb65cb0dp1ac6d2jsn565585c65f62'
            }
        })
        var finalResponse = await response.json();
        if (finalResponse.status == "valid") {
            return true;
        }
        return false;
    }
    catch (error) {
        console.error("Error: ", error);
        return false;
    }
}


function successMsg(element, msg) {
    element.classList.replace("text-danger", "text-success");
    element.innerHTML = msg;
}

function errorMsg(element, msg) {
    element.classList.replace("text-success", "text-danger");
    element.innerHTML = msg;
}
