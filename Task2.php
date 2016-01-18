<?php
$title = 'Task2';
$result = '';
$RESULT = "Result: ";
$validRequest = true;

require_once "heading.php";
require_once 'functions.php';
$username = getValue($_POST, 'username');
$password = getValue($_POST, 'password');
$confirmPass = getValue($_POST, 'confirmPass');

if($username != null && $password != null && $password == $confirmPass):
	$username = trim(htmlspecialchars($username));
	$password = trim(htmlspecialchars($password));
	$confirmPass = trim(htmlspecialchars($confirmPass));
	$encriptedPassword = password_hash($password, PASSWORD_DEFAULT);
	echo "HELLO $username with password $encriptedPassword";

 else:
	$validRequest = false;
	endif;
?>
	<form action="" method="POST">
			<div>
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="<?= htmlentities($username)?>/>
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" id="password" name="password"/>
			</div>
			<div>
				<label for="confirmPass">Confirm Password</label>
				<input type="password" id="confirmPass"  name="confirmPass"/>
			</div>
			<div>
				<input type="submit" />
			</div>
	</form>
<?php require_once "footer.php"; ?>