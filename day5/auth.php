<?php
ini_set('display_errors', '1');
if(!empty($_POST)) {
    $conn = require __DIR__ . "/database.php";
	$email = $_POST['email'];
	$pass = $_POST['pass'];
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s' AND user_status = 1 AND is_delete = 0",
                   $conn->real_escape_string($email));
    
    $result = $conn->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        echo password_verify($pass, $user["pass"]);
        if (password_verify($pass, $user["pass"])) {
            session_start();
            
            session_regenerate_id();
            
            $_SESSION = $user;
            header("Location: home.php");
        }
   }
    
}
?>