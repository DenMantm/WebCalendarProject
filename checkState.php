<?php
session_start();
if($_SESSION['logged'] != true){

                header("Location: ../views/partials/main.php"); 
            die("Redirecting to: ../m_index.html"); 
            
                if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
    } else if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
    }
}

echo "you are not logged in. Redirecting to home";

?>