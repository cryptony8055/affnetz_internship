<?php
include('sidebar1.php');
$error = '';
if(!empty($_POST)){
    $inputname = $_POST['inputname'];
    $pass = $_POST['pass'];
    $password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $cpass = $_POST['confpass'];
    $status = 0;
    $roles = 'user';

    if($pass==$cpass){
        include('database.php');
        $sql = "INSERT INTO users(display_name,email,pass,roles,user_status)
                VALUES(?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if( ! mysqli_stmt_prepare($stmt,$sql)){
            die("sql error");
        }
    
        mysqli_stmt_bind_param($stmt,"ssssi",$inputname,$email,$password_hash,$roles,$status);
        mysqli_stmt_execute($stmt);
    } else {
        $error = '<p style="color:red;">password and confirm password doesnot match</P>';
    }
}
?>	
<form class="ftco-section contact-section" action="#" method="post">
    <div class="container">
        <div class="row block-9 justify-content-center">
            <div class="col-md-8 order-md-last pr-md-5">
                <h1 class="mb-4 col-md-12">Register</h1>
                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" name="inputname" placeholder="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confpass" placeholder="confirm Password">
                    </div>
                    <?= $error != ''?$error:'' ?>
                    <div class="form-group">
                        <input type="submit" name="register" value="submit" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?php
include('footer.php');
?>	