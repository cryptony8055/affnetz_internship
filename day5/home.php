<?php
include('sidebar.php');
include('database.php');
$qry = " SELECT * FROM userprofile WHERE user_id = ".$_SESSION['id'];
$data = $conn->query($qry);
$user_details = $data->fetch_assoc();
$profile_img = 'images/users/default.jpg';

if($user_details){
	$profile_img = $user_details['pfp'];
}
$username = $_SESSION['display_name'];

?>	
<div class="hero-wrap js-fullheight" style="background-image: url(images/bg_1.jpg);"
	data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="js-fullheight d-flex justify-content-center align-items-center">
		<div class="col-md-8 text text-center">
			<div class="img mb-4" style="background-image: url(<?=$profile_img?>);"></div>
			<div class="desc">
				<h2 class="subheading">Hello I'm</h2>
				<h1 class="mb-4"><?= $username; ?></h1>
				<p class="mb-4"> <?= $user_details['about'] ? $user_details['about'] : "I am A Blogger Far far away, behind the word mountains, far from the countries
					Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
					at the coast of the Semantics, a large language ocean" ?></p>
			<div class="row d-flex mb-5 contact-info">
	            <div class="col-md-12 mb-4">
	              <h5 class="h4 font-weight-bold">Contact Information</h5>
	            </div>
	            <div class="w-100"></div>
	            <div class="col-md-6">
	              <p><span>Address:</span> <?= $user_details ? $user_details['pin']." ".$user_details['plot']." ".$user_details['city']." ".$user_details['district']." ".$user_details['st'] : "Na" ?></p>
	            </div>
	            <div class="col-md-6">
	              <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	            </div>
	            <div class="col-md-6">
	              <p><span>Email:</span><?= $_SESSION['email'] ?></p>
	            </div>
	            <div class="col-md-6">
	              <p><span>Website</span> <a href="#">yoursite.com</a></p>
	            </div>
	        </div>
				<p><a href="profile.php" class="btn-custom">More About Me <span class="ion-ios-arrow-forward"></span></a></p>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php');
?>