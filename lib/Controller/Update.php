<?php
namespace lib\Controller;

class Update extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->postProcess();
		}
	}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\InvalidEmail $e){
			$this->setErrors('email', $e->getMessage());
		}catch(\lib\Exception\InvalidPassword $e){
			$this->setErrors('password', $e->getMessage());
		}
		
		
		if($this->hasError()){
			return;
		}else{
			$userModel=new \lib\Model\User();
			$user=$userModel->update([
				'email'=>$_POST['email'],
				'password'=>$_POST['password'],
				'id'=>$_SESSION['me']->id
			]);
			
			session_regenerate_id(true);
			$_SESSION['me']=$user;
			return;
		}
	}
	
	private function validate(){
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			throw new \lib\Exception\InvalidEmail();
		}
		if(!preg_match('/\A[a-zA-Z0-9]{6,32}\z/', $_POST['password'])){
			throw new \lib\Exception\InvalidPassword();
		}
		if(!isset($_POST['token'])||$_POST['token']!==$_SESSION['token']){
			echo "Invalid Token!";
			exit;
		}
	}
	
}