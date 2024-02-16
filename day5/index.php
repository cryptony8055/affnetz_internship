<?php
include('sidebar1.php');
?>	
<section class="ftco-section contact-section">
	<div class="container">
		<div class="row block-9 justify-content-center">
			<div class="col-md-8 order-md-last pr-md-5">
				<h1 class="mb-4 col-md-12">Log-in</h1>
				<form action="auth.php" method="post">
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Your Email">
					</div>
					<div class="form-group">
						<input type="password" name="pass" class="form-control" placeholder="Password">
					</div>
					<div class="form-group form-inline">
					<div class="form-group col-md-6">
						<input type="submit" value="login" class="btn btn-primary py-3 px-5">
					</div>
					<div class="form-group col-md-6">
						<a href="register.php">or,Register here</a>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
include('footer.php');
?>	