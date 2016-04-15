<?php
session_start();
   require('../model/database_db.php');
   require('../model/admin_db.php');
   require('../model/member_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'view_login';
    }
}

$error = array();
$message = array();
switch($action){
	case 'view_login':
		include 'login.php';
		break;

	case 'login':
		$userName = filter_input(INPUT_POST, 'username');
		$password = filter_input(INPUT_POST, 'password');
		$member_user = is_valid_member_login($userName, $password);
		$admin_user = is_valid_admin_login($userName, $password);

		if ($username == NULL || $userName == FALSE) {
		  	$error = 'Please enter a valid username';
		  	include('login.php');

		} else if ($password == NULL || $password == FALSE) {
		  	$error = 'Please enter a valid password';
		  	include('login.php');

		} else if ($member_user == 1) {
			$users = get_user_info($userName);
			if(!empty($users)) {
				foreach ($users as $user){
					$_SESSION['member_firstName'] = $user['users_firstName'];
					$_SESSION['member_userName'] = $user['users_username'];
					$_SESSION['member_id'] = $user['users_userID'];
				}
			}
            $_SESSION['member'] = $users;
          	include('member_success.php');

		} else if ($admin_user == 1) {
			$users = get_user_info($userName);
			if(!empty($users)) {
				foreach ($users as $user){
					$_SESSION['admin_firstName'] = $user['users_firstName'];
					$_SESSION['admin_userName'] = $user['users_username'];
					$_SESSION['admin_id'] = $user['users_userID'];	
				}
			}
            $_SESSION['admin'] = $users;
		  	// include('admin_success.php');
		  	header('Location: ../admin/index.php');

		} else {	
		 	$error = 'Invalid username or password';
		 	include('login.php');
		} 
	 	break;

	case 'member_menu':
	  	include '../member/index.php';
	  	break;

	case 'admin_menu':
	  	include '../admin/index.php';
	  	break;

	case 'register_form':
	  	include 'register.php';
	  	break;

	case 'register':
		$password_regex_patern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/';
		$email_regex_pattern = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
		$userName = filter_input(INPUT_POST, 'userName');
		$firstName = filter_input(INPUT_POST, 'firstName');	
		$lastName = filter_input(INPUT_POST, 'lastName');
		$password = filter_input(INPUT_POST, 'password');
		$password2 = filter_input(INPUT_POST, 'password2');
		$email = filter_input(INPUT_POST, 'email');
		$phone = filter_input(INPUT_POST, 'phone');
		$userlevel = "m";
		$getUsers = get_users($userName);

		if ($userName == NULL || $userName == FALSE) {
		 	$error = "please enter a Username";
		 	include'register.php';

		} else if($getUsers > 0  ) {
			$error = 'Please choose another Username.';
			include'register.php';

		} else if($firstName == NULL || $firstName == FALSE) {
		 	$error = 'Please enter a First Name';
		 	include'register.php';

		} else if($lastName == NULl || $lastName == FALSE) {
		 	$error = 'Please enter a Last Name';
		 	include'register.php';

		} else if($password == NULL || $password == FALSE) {
		 	$error = 'Please enter a password';
		 	include'register.php';

		} else if($password != $password2) {
			$error = 'Passwords do not match';
		 	include'register.php';

		} else if(!preg_match( $password_regex_patern, $password )) {
            $error = "Please enter a password within the given parameters";
            include'register.php';

        } else if (!preg_match( $email_regex_pattern, $email )) {
         	$error = "Please enter a valid email address.";
         	include'register.php';

         } else if ( $getUsers < 1) {
		 	$member_id = add_member( $userName,  $firstName , $lastName, $password, $email, $phone, $userlevel );
		 	include'success.php';
		}
		break;
		
	case 'logout':
        unset($_SESSION['admin']);
        unset($_SESSION['member']);
        include'../../index.php';
        break;

	default:
		$error =  'Unknown login action: ' . $action;
		include'../errors/error.php';	
		break;
}
?>
