<?php
if(!empty($_POST)) {
    $conn = require __DIR__ . "/database.php";
	$email = $_POST['email'];
	$pass = $_POST['pass'];
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $conn->real_escape_string($email));
    
    $result = $conn->query($sql);
    
    $user = $result->fetch_assoc();
	//var_dump($user);
	//die();
    
    if ($user) {
        
        if (password_verify($pass, $user["pass"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION = $user;
            header("Location: home.php");
        }
   }
    
}
?>