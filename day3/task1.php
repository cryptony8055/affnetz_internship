<?php

if(!empty($_POST)){
    if($_POST['submit']==1){
        var_dump($_POST);
    }
    
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
    <form action="#" method="post" class="row g-3 p-3">
        <div class="col-md-4">
            <label for="fname" class="form-label">First name</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter Fname..." required>
          </div>
          <div class="col-md-4">
            <label for="lname" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lname" placeholder="Enter Lname..." required>
          </div>
          <div class="col-md-4">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" name="age" placeholder="Enter Age..." required>
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
          <input type="email" class="form-control" name="inputEmail" required>
        </div>
        <div class="col-md-6">
          <label for="inputPhone" class="form-label">phone</label>
          <input type="tel" class="form-control" name="inputPhone" required>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" name="inputAddress" placeholder="1234 Main St" required>
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
            <option selected>Choose...</option>
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