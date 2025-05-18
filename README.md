# PHP MySQL Login System with Session Timeout

## Overview

This is a basic login system built using PHP, MySQL, and HTML. It features:

- Secure login form
- Session-based access to an admin page
- 1-minute inactivity timeout
- Logout button
- Redirection on login failure
- Access control after logout

## Pages

- login.php: Login form and login logic
- admin.php: Admin page (only accessible after login)
- logout.php: Destroys session and redirects to login
- error.php: Shown if login fails

## Session Timeout

The system logs out users after 1 minute (60 seconds) of inactivity using PHP session management (`$_SESSION["last_activity"]`).

## Database Setup

Import the following SQL into your MySQL database:

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', 'admin123');