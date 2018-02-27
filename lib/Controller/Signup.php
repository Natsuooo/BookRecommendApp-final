<?php
namespace lib\Controller;

class Signup extends \lib\Controller{
	
	public function run(){
		if($this->isLoggedIn()){
			header('Location: '.SITE_URL.'/mypage.php');
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
		
		$this->setValues('email', $_POST['email']);
		
		if($this->hasError()){
			return;
		}else{
			try{
				$userModel=new \lib\Model\User();
				$user=$userModel->create([
					'email'=>$_POST['email'],
					'password'=>$_POST['password'],
					'name'=>$_POST['name']
				]);
			}catch(\lib\Exception\DuplicateEmail $e){
				$this->setErrors('email', $e->getMessage());
				return;
			}
			
			session_regenerate_id(true);
			$_SESSION['me']=$user;
			
			$profileModel=new \lib\Model\Profiles();
			$profileModel->createProfile([
				'id'=>$_SESSION['me']->id
			]);
			
			header('Location: '.SITE_URL.'/mypage.php');
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