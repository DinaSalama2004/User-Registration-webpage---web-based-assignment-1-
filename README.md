# User Registration Webpage (IS333 - Spring 2025)  - web based

## Description
This project is a user registration system built using PHP, MySQL, JavaScript, and AJAX for the Web-Based Information Systems Development course (IS333). It includes form validation, database integration, image upload, and an API-based WhatsApp number validation.

## Features
- **User Registration Form**: Collects full name, username, phone, WhatsApp number, address, password, confirm password, user image, and email.
- **Client-Side Validation**: Ensures required fields, correct data formats, and password security.
- **Server-Side Validation with AJAX**: Checks username availability dynamically.
- **User Image Upload**: Stores the image on the server and saves the filename in the database.
- **WhatsApp Number Validation**: Uses a third-party API to verify if the number is a valid WhatsApp number.
- **Modular Structure**: Organized PHP files for database operations, API handling, and UI components.

## Project Structure
```
/26-ASSIGNMENT-1
│── header.php      # Contains the header
│── footer.php      # Contains the footer
│── index.php       # Main page (includes header & footer)
│── db_ops.php      # Database operations (connection, insertion, validation)
│── upload.php      # Handles image uploads
│── api_ops.php     # PHP implementation for API handling
│── api_ops.js      # JavaScript implementation for API handling (if applicable)
│── team_members.txt # List of team members and IDs
│── db_backup.sql   # Backup of the database
```


## Requirements
- PHP 
- MySQL Database
- JavaScript & AJAX
- Web Server (XAMPP)
- API key for WhatsApp number validation

## Usage
1. Open `index.php` in a browser.
2. Fill out the registration form with valid details.
3. Click the button to check WhatsApp number validity.
4. Submit the form to register a new user.
5. If the username is already taken, an AJAX alert will prompt the user to choose another username.

## License
This project is for educational purposes only.

---
🚀 Developed for IS333 - Web-Based Information Systems Development.

