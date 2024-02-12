<?php

if(!empty($_POST)){
    //var_dump($_FILES);
//   $filename = $_FILES['photo']['name'];
   $tempname = $_FILES['photo']['tmp_name'];
//   $store = "images/".$filename ;
  
//   move_uploaded_file($tempname,$store);

//   $json = json_encode($_POST);
//   $file = 'data/data.json';

//   file_put_contents($file, $json);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['inputGender'];
    $profession = $_POST['Profession'];
    $qualification = $_POST['qualification'];
    $marritalStatus = $_POST['marritalStatus'];
    $inputEmail = $_POST['inputEmail'];
    $inputphone = $_POST['inputPhone'];
    $inputAddress = $_POST['inputAddress'];
    $inputAddress2 = $_POST['inputAddress2'];
    $inputCity = $_POST['inputCity'];
    $inputState = $_POST['inputState'];
    $inputZip = $_POST['inputZip'];
    $photo = $tempname;

     $host = "localhost";
     $database_name = "registration";
     $user = "root";
     $password = "";

     $conn = mysqli_connect($host,$user,$password,$database_name);

     if(mysqli_connect_errno()){
        die("connection not achieved");
     }
     $sql = "INSERT INTO registration_form(Fname,Lname,gender,profession,qualification,marital_stats,email,phone,address1,address2,city,states,zip,photo)
               VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      
      
      $stmt = mysqli_stmt_init($conn);

     if( ! mysqli_stmt_prepare($stmt,$sql)){
      die("sql error");
     }
     mysqli_stmt_bind_param($stmt,"ssssssssssssss",
     $fname,
     $lname,
     $gender,
     $profession,
     $qualification,
     $marritalStatus,
     $inputEmail,
     $inputphone,
     $inputAddress,
     $inputAddress2,
     $inputCity,
     $inputState,
     $inputZip,$photo
    );
    mysqli_stmt_execute($stmt);

    echo "record has been saved";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!--   meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Form Design</title>
  </head>
  <body>
   <div class="container-fluid text-dark py-3">
       <header class="text-center">
           <h1 class="display-6">Registration page</h1>
       </header>
   </div>
   <section class="container my-2 w-50 text-dark rounded-3 p-2">
    <form action="#" method="post" class="row g-3 p-3" enctype = "multipart/form-data">
        <div class="col-md-4">
            <label for="fname" class="form-label">First name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter Fname..."  >
          </div>
          <div class="col-md-4">
            <label for="lname" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lname" placeholder="Enter Lname..."  >
          </div>
          <div class="col-md-4">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" placeholder="Enter Age..."  >
          </div>
          <div class="col-md-4">
            <label for="inputGender" class="form-label">Gender</label>
            <select name="inputGender" class="form-select">
              <option selected value=''>Choose...</option>
              <option value="male">male</option>
              <option value="female">female</option>
              <option value="other">other</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="Profession" class="form-label">Profession</label>
            <select name="Profession" class="form-select">
              <option selected value=''>Choose...</option>
              <option value="salaried">Salaried</option>
              <option value="unemployed">Unemployed</option>
              <option value="student">Student</option>
              <option value="business">Business</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="qualification" class="form-label">Highest qualification</label>
            <select name="qualification" class="form-select">
              <option selected value=''>Choose...</option>
              <option value="graduation">Graduation</option>
              <option value="marticulation">Matriculation</option>
              <option value="postmarticulation">Post matriculation</option>
            </select>
          </div>
          <div class="col-md-6">
            <label for="marritalStatus" class="form-label">Marrital Status</label>
            <select name="marritalStatus" class="form-select">
              <option selected value=''>-Na-</option>
              <option value="married">Married</option>
              <option value="unmarried">Unmarried</option>
            </select>
          </div>  
        <div class="col-md-6">
            <label for="uploadPhoto" class="form-label">upload your photo</label>
            <input type="file" class="form-control" name="photo">
          </div>
        <div class="col-md-6">
          <label for="inputEmail" class="form-label">Email</label>
          <input type="email" class="form-control" name="inputEmail"  >
        </div>
        <div class="col-md-6">
          <label for="inputPhone" class="form-label">phone</label>
          <input type="tel" class="form-control" name="inputPhone"  >
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St"  >
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Address 2</label>
          <input type="text" class="form-control" name="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" name="inputCity">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select name="inputState" class="form-select">
            <option selected value=''>Choose...</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip</label>
          <input type="number" class="form-control" name="inputZip">
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="gridCheck" value="1">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" value="1" name="submit">submit</button>
        </div>
      </form>
   </section>
  </body>
</html>