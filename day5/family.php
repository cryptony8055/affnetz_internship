<?php
include('sidebar.php');
if(!empty($_POST)){
    $user_id = $_SESSION['id'];
    $data = $_POST;

    include('database.php');
    for($key = 0 ; $key<count($data['fname']) ; $key++) {
        $sql = "INSERT INTO family_info(user_id,fname,email,phone,relation,age,gender)
                VALUES(?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            die("sql error");
        }
        mysqli_stmt_bind_param($stmt,"issssss",$user_id,$data['fname'][$key],$data['email'][$key],$data['phone'][$key],$data['relation'][$key],$data['age'][$key],$data['gender'][$key]);
        mysqli_stmt_execute($stmt);
    }
    

}
?>	
<form class="ftco-section contact-section" action="#" method="post">
    <div class="container">
        <div class="row block-9 justify-content-center border">
            <h1 class="mb-4 col-md-12 border-bottom">Enter Family Details</h1>
            <div id="familyContent">
                <div class="col-md-12 row mg">
                    <div class="form-group col-md-4 ">
                        <input type="text" class="form-control" name="fname[]" placeholder="name">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="email[]" placeholder="Your Email">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="phone[]" placeholder="enter phone">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="relation[]" placeholder="relation">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="age[]" placeholder="enter age">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="gender[]" placeholder="gender">
                    </div>
                    <div class="form-group col-md-12 change">
                    <input type="button" name="register" value="Addmore" class="btn btn-outline-success btn-sm py-2 px-3" onclick="addFamilySection()">
                    <input type="submit" name="register" value="submit" class="btn btn-primary btn-sm py-2 px-3">
                    </div>
                </div>
            </div>
            <div id="familyAppend"></div>
            <input type="hidden" value="0" id="addmore_count">
            <!-- <div class="form-group col-md-12">
                <input type="button" name="register" value="Addmore" class="btn btn-outline-success btn-sm py-2 px-3" onclick="addFamilySection()">
            </div> -->
        </div>
    </div>
</form>
<?php
include('footer.php');
?>	