<?php
// =============================================
// RAMBA VI HOTEL - Database Connection
// db.php — Include this file in all PHP pages
// =============================================

// Database Configuration — adjust to match your WAMP setup
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // Default WAMP username
define('DB_PASS', '');           // Default WAMP password (empty)
define('DB_NAME', 'ramba_vi_hotel');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("
        <div style='font-family:sans-serif;background:#f8d7da;color:#721c24;
                    padding:20px;border-radius:4px;margin:20px;border:1px solid #f5c6cb;'>
            <strong>Database Connection Failed!</strong><br>
            Error: " . $conn->connect_error . "<br><br>
            <small>Make sure WAMP server is running and the database 
            <strong>ramba_vi_hotel</strong> exists.</small>
        </div>
    ");
}

// Set character encoding
$conn->set_charset("utf8");
?>
