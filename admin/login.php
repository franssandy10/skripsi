<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login to CMS</title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- TOP BAR -->
<div id="top-bar">
	<div class="page-full-width">
		<a href="http://www.stufeedon.com" target="_blank" class="round button dark ic-left-arrow image-left ">Return to website</a>
	</div> <!-- end full-width -->	
</div> <!-- end top-bar -->

<!-- HEADER -->
<div id="header">
	<div class="page-full-width cf">
		<div id="login-intro" class="fl">
			<h1>Login to CMS</h1>
			<h5>Enter your credentials below</h5>
		</div> <!-- login-intro -->
		<a href="../" id="company-branding" class="fr"><img src="images/logo.jpg" alt="ISTB" /></a>
	</div> <!-- end full-width -->	
</div> <!-- end header -->

<!-- MAIN CONTENT -->
<div id="content">
	<form method="POST" id="login-form">
	<fieldset>
		<p>
			<label for="login-username"><b>username</b></label>
			<input type="text" id="login-username" name="username" class="round full-width-input" autofocus />
		</p>
		<p>
			<label for="login-password"><b>password</b></label>
			<input type="password" id="login-password" name="password" class="round full-width-input" />
		</p>
		<input type="submit" value="LOGIN" class="button round blue image-right ic-right-arrow">
	</fieldset>
	<br/><div class="information-box round">Just click on the "LOG IN" button to continue, no login information required.</div>
	</form>
</div> <!-- end content -->
</br></br></br>

</body>

<div id="copyright">
<label><b>Copyright &copy 2014 by ISTB</br>
Allright Reserved</br>
Power By FR Team</b></label>
</div>
</html>