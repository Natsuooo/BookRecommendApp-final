<?php
namespace lib\Controller;

class Logout extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		if($_SERVER['REQUEST_METHOD']==='POST'){
		if(!isset($_POST['token'])||$_POST['token']!==$_SESSION['token']){
				echo "Invalid Token!";
				exit;
			}

			$_SESSION=[];
			if(isset($_COOKIE[session_name()])){
				setcookie(session_name(), '' , time() - 86400, '/');
			}
			session_destroy();
			
			header('Location: '.SITE_URL.'/login.php');
		}
		
	}
}