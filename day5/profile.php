<?php
    include('database.php');

    include('sidebar.php');
    $pin = '';
    $city = '';
    $district = '';
    $st = '';
    $about = '';
    $qry = " SELECT * FROM userprofile WHERE user_id = ".$_SESSION['id'];
    $data = $conn->query($qry);
    $user_details = $data->fetch_assoc();
    if(isset($user_details)){
        $pin = $user_details['pin']?$user_details['pin']:"";
        $city = $user_details['city']?$user_details['city']:"";
        $district = $user_details['district']?$user_details['district']:"";
        $st = $user_details['st']?$user_details['st'] : "";
        $about = $user_details['about']?$user_details['about'] : "";
    }
    if(!empty($_POST)){
        $age= $_POST['age'];
        $city= $_POST['city'];
        $district =$_POST['district'];
        $st =$_POST['state'];
        $user_id=$_SESSION['id'];
        $pin=$_POST['pin'];
        $about=$_POST['about'];
        
        if($_FILES){
            $filename = $_FILES['pfp']['name'];
            $tempname = $_FILES['pfp']['tmp_name'];
            if($filename){
                $img = "images/users/".$filename ;
                move_uploaded_file($tempname,$img);
            } else{
                $img = "images/users/default.jpg" ;
            } 
        } 

        if(isset($user_details) && count($user_details) > 0){
            $sql = "UPDATE userprofile
            SET city=?, district=?, st=?, pfp=?, pin=?, about=?
            WHERE user_id=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die("sql error");
            }
            mysqli_stmt_bind_param($stmt, "ssssssi", $city, $district, $st, $img, $pin,$about,$user_id);
            mysqli_stmt_execute($stmt);
            header("Location: home.php");
        } else {
            $sql = "INSERT INTO userprofile(city,user_id,district,st,pfp,pin,about)
            VALUES(?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if( ! mysqli_stmt_prepare($stmt,$sql)){
                die("sql error");
            }      
            mysqli_stmt_bind_param($stmt,"sssssss",$city,$user_id,$district,$st,$img,$pin,$about);
            mysqli_stmt_execute($stmt);
            
            header("Location: home.php");
        }
    }

?>	
<div class="hero-wrap js-fullheight" style="background-image: url(images/bg_1.jpg);"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="js-fullheight d-flex justify-content-center align-items-center">
		<div class="col-md-8 text text-center">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h1>Hi <?=$_SESSION['display_name']?>,</h1>
                </div>
                <div class="form-group">
                <h6>UserId: <?=$_SESSION['email']?></h6>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="pfp" placeholder="upload pfp">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="age" placeholder="enter age">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="enter city" value="<?= $city ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="district" placeholder="enter district" value="<?= $district ?>" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="state" placeholder="enter state" value="<?= $st ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pin" placeholder="enter pincode" value="<?= $pin  ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="about" placeholder="enter about" value="<?= $about  ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="register" value="submit" class="btn btn-primary py-3 px-5">
                </div>
            </form>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>