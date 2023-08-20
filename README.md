# SecureLoginSystem
SecureLoginSystem is a PHP and Bootstrap-based user authentication system designed to provide secure user registration, login, and access to protected resources.

Features:

- User registration with password hashing using `password_hash`.
- User login with password verification using `password_verify`.
- Responsive design using Bootstrap CSS.
- Dynamic navigation bar based on user authentication.
- Session management for user login state.
- User-friendly feedback alerts for login and registration actions.

Project Structure:

- `index.php`: Home page and entry point.
- `login.php`: User login page.
- `signup.php`: User registration page.
- `welcome.php`: Dashboard for logged-in users.
- `partials/_dbconnect.php`: Database connection script.
- `partials/_nav.php`: Reusable navigation bar.
