# Customized-PHP-Login-System
This is login system includes autoloading of classes, material design, middleware, session expiration and PDO connection type.

# Functions
  - Middleware
  - Class Autoloading
  - Helpers
  - PDO Connection type
# Features
  - Login
  - Register
  - Admin Dashboard
  - List of Registered Users
  - Session Expiration
  - Material Design  
  
# Usage
  #### Middleware - Prevents unautorized users to view the admin dashboard
  #### Class Autholoading - All classes located in "lib" directory will be loaded dynamically
  #### Helpers/Config - Helpers for assets, base url and more. You could also add more helpers on the lib directory.
  #### Class Functions 
  ###### $config->asset() - point to public folder
  ###### $config->base_url() - change the value of the base url depending on your local ip address (e.g: http://localhost:8000)
  ###### $config->session_timeout($timeout=1800) - This will be used to set expiration onto your session. Defaul is 1800, change it if necessary
