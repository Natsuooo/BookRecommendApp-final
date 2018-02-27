<?php
namespace lib\Controller;

class Login extends \lib\Controller{
	
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
		}catch(\lib\Exception\EmptyEmailOrPassword $e){
			$this->setErrors('login', $e->getMessage());
		}
		
		$this->setValues('email', $_POST['email']);
		
		if($this->hasError()){
			return;
		}else{
			try{
				$userModel=new \lib\Model\User();
				$user=$userModel->login([
					'email'=>$_POST['email'],
					'password'=>$_POST['password']
				]);
			}catch(\lib\Exception\UnmatchEmailOrPassword $e){
				$this->setErrors('login', $e->getMessage());
				return;
			}
			
			session_regenerate_id(true);
			$_SESSION['me']=$user;
			
			header('Location: '.SITE_URL.'/mypage.php');
			exit;
			
		}
		
	}
	
	private function validate(){
		if(!isset($_POST['email'])||!isset($_POST['password'])){
			echo "Invalid Form!";
			exit;
		}
		if($_POST['email']===''||$_POST['password']===''){
			throw new \lib\Exception\EmptyEmailOrPassword();
		}
		if(!isset($_POST['token'])||$_POST['token']!==$_SESSION['token']){
			echo "Invalid Token!";
			exit;
		}
	}
	
}