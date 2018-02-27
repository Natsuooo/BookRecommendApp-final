<?php
namespace lib\Controller;

class ForgetPassword extends \lib\Controller{
	public function run(){
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->postProcess();
		}
	}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\EmptyEmailOrPassword $e){
			$this->setErrors('forgetPassword', $e->getMessage());
		}
		
		$this->setValues('email', $_POST['email']);
		
		if($this->hasError()){
			return;
		}else{
			try{
				$pass1=range('a', 'z');
				$pass2=range('A', 'Z');
				$pass3=range(0, 9);
				$pass=array_merge($pass1, $pass2, $pass3);
				shuffle($pass);
				$password=substr(implode($pass), 0, 8);
					
				$userModel=new \lib\Model\User();
				$user=$userModel->forgetPassword([
					'email'=>$_POST['email'],
					'password'=>$password
				]);
			}catch(\lib\Exception\UnmatchEmail $e){
				$this->setErrors('forgetPassword', $e->getMessage());
				return;
			}
			
			$to=$_POST['email'];
			$subject='【ELEN】新規パスワードを発行しました';
			$body="新規パスワード：{$password}";
			$headers="From: n17975775@gmail.com";
			if(mb_send_mail($to, $subject, $body, $headers)){
				$this->setErrors('successEmail', 'success to send');
			}else{
				$this->setErrors('failEmail', 'fail to send');
			}
			
		}
	}
	
	
		
	
	private function validate(){
		if(!isset($_POST['email'])){
			echo "Invalid Form!";
			exit;
		}
		if($_POST['email']===''){
			throw new \lib\Exception\EmptyEmailOrPassword();
		}
		if(!isset($_POST['token'])||$_POST['token']!==$_SESSION['token']){
			echo "Invalid Token!";
			exit;
		}
	}
}