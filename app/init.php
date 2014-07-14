<?php

session_start();

require_once 'vendor/autoload.php';

// Set the app info
Facebook\FacebookSession::setDefaultApplication('FB_PUBLIC_KEY', 'FB_PRIVATE_KEY');

// Set the facebook redirect url
$facebook = new Facebook\FacebookRedirectLoginHelper('http://localhost:8080/PHP/Facebook/Login/index.php');

try {
	// Set the facebook session token
	if($session = $facebook->getSessionFromRedirect()) {
		$_SESSION['facebook'] = $session->getToken();
		header('Location: index.php');
	}

	// If the session token is set, get user info
	if(isset($_SESSION['facebook'])) {
		$session = new Facebook\FacebookSession($_SESSION['facebook']);

		// Get the user information
		$request = new Facebook\FacebookRequest($session, 'GET', '/me');
		$request = $request->execute();

		$user = $request->getGraphObject()->asArray();
	}
} catch(Facebook\FacebookRequestException $e) {
	// When facebook returns an error
} catch(\Exception $e) {
	// Local issue
}