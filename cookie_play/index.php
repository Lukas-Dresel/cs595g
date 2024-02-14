<?php
session_start();

// Check if the logout GET parameter is set
if (isset($_GET['logout'])) {
    // Call the logout function
    logout();
}

// Function to logout the user
function logout() {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if user is logged in and is admin
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_COOKIE['is_admin'])) {
    $FLAG = $_ENV['FLAG'] ?? 'flag{cookie_monster}';

    if($_COOKIE['is_admin'] === 'true'){
        echo "<h1>Welcome Admin!</h1>";
        echo "<p>Here is your flag: <strong>$FLAG</strong></p>";
    } else {
        echo "<h1>Welcome User!</h1>";
        echo "<p>Unfortunately only the admin has the flag...</p>";
    }
    echo '<a href="index.php?logout=true">Logout</a>';
    exit; // Exit to prevent further execution of the script

} else {
    header('Location: login.php');
    exit;
}
?>
