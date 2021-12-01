<?php
    session_start();
    //When clicking on the logout button we have to destroy user sessions. It will redirect to the login page
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: login.php");
    }
?>