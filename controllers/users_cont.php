<?php

	#   Date modified: 22/11/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/User.php');

	//Creating Instance
	$user = new User();

	$user_arr = $user->getAllUsers( ['User' ] );

	//User's Interface
	include_once('views/users.php');
?>