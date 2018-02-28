<?php
namespace lib\Controller;

class Profile extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		
		$profileModel=new \lib\Model\Profiles();
		$profile=$profileModel->profile([
			'id'=>$_SESSION['me']->id
		]);
		$this->setValues('profile', $profile);

		
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->postProcess();
		}
		
	}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\EmptyPost $e){
			$this->setErrors('profile', $e->getMessage());
		}
		
		$this->setValues('name', $_POST['name']);
		$this->setValues('department', $_POST['department']);
		$this->setValues('professional', $_POST['professional']);
		$this->setValues('message', $_POST['message']);
		
		if($this->hasError()){
			return;
		}else{
			$profileModel=new \lib\Model\Profiles();
			$profileModel->update([
				'id'=>$_SESSION['me']->id,
				'name'=>$_POST['name'],
				'professionalCategory'=>$_POST['professionalCategory'],
				'department'=>$_POST['department'],
				'professional'=>$_POST['professional'],
				'message'=>$_POST['message']
			]);
			header('Location: '.SITE_URL.'/profile.php');
			exit;
		}
		
	}
	
	private function validate(){
		
	}
	
	
	
}