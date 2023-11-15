htm
<?php
ini_set('session.cookie_lifetime', 0); // This will ensure the session expires when the browser is closed
session_start();

// Check if the session variable exists before unsetting
if (isset($_SESSION['iPaN'])) {
    unset($_SESSION['iPaN']);
}

// Destroy the entire session
session_destroy();

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect to the index.html page
header("Location: ../login.html");
exit;

?>