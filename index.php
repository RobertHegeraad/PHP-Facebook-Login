<?php

require_once 'app/init.php';

?>

<!doctype html>
<html>
<head>
	<title>Facebook Login</title>
</head>
<body>

	<p>Changes</p>

	<p>Clean Up</p>

	<p>Commit Test 2</p>

	<?php if(!isset($_SESSION['facebook'])): ?>

		<a href="<?php echo $facebook->getLoginUrl(); ?>">Sign in with Facebook</a>

	<?php else: ?>

		<p>You are signed in. <?php echo $user['first_name']; ?> <a href="signout.php">Sign Out</a></p>

	<?php endif; ?>

</body>
</html>