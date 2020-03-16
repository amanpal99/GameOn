<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="signin.css">
    <script src="../jquery.js"></script>
    <script src="signin.js"></script>
  </head>
  <body>
    <div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a class="active" href="#signup-tab-content">Sign Up</a></h3>
			<h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="signup-tab-content" class="active">
				<form class="signup-form" action="../php/signup.inc.php" method="post">
					<input type="email" class="input" name="ueml" id="user_email" autocomplete="off" placeholder="Email">
					<input type="text" class="input" name="uid" id="user_name" autocomplete="off" placeholder="Username">
					<input type="password" class="input" name="upwd" id="user_pass" autocomplete="off" placeholder="Password">
					<input type="submit" class="button" value="Sign Up" name="signup-submit">
				</form><!--.login-form-->
				<div class="help-text">
					<p>By signing up, you agree to our</p>
					<p><a href="#">Terms of service</a></p>
				</div><!--.help-text-->
			</div><!--.signup-tab-content-->

			<div id="login-tab-content">
				<form class="login-form" action="../php/login.inc.php" method="post">
					<input type="text" class="input" name="uid" id="user_login" autocomplete="off" placeholder="Email or Username">
					<input type="password" class="input" name="upwd" id="user_pass" autocomplete="off" placeholder="Password">
					<input type="checkbox" class="checkbox" id="remember_me">
					<label for="remember_me">Remember me</label>

					<input type="submit" class="button" name="login-submit" value="Login">
				</form><!--.login-form-->
				<div class="help-text">
					<p><a href="#">Forget your password?</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->
  </body>
</html>
