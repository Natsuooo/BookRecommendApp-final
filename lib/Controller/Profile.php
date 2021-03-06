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

		
		if(isset($_POST['firstName'])){
			$this->postProcess();
		}
		
		if(isset($_POST['logout'])){
			$this->logout();
		}
		
	}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\EmptyPost $e){
			$this->setErrors('profile', $e->getMessage());
		}
		
		$this->setValues('firstName', $_POST['firstName']);
		$this->setValues('lastName', $_POST['lastName']);
		$this->setValues('sei', $_POST['sei']);
		$this->setValues('mei', $_POST['mei']);
		$this->setValues('department', $_POST['department']);
		$this->setValues('professional', $_POST['professional']);
		$this->setValues('message', $_POST['message']);
		
		if($this->hasError()){
			return;
		}else{
			$profileModel=new \lib\Model\Profiles();
			$profileModel->update([
				'id'=>$_SESSION['me']->id,
				'firstName'=>$_POST['firstName'],
				'lastName'=>$_POST['lastName'],
				'sei'=>$_POST['sei'],
				'mei'=>$_POST['mei'],
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
		if(!isset($_POST['firstName'])||!isset($_POST['lastName'])||!isset($_POST['sei'])||!isset($_POST['mei'])){
			echo "Invalid Form!";
			exit;
		}
		
		if($_POST['firstName']===''||$_POST['lastName']===''||$_POST['sei']===''||$_POST['mei']===''){
			throw new \lib\Exception\FormError();
		}
	}
	
	
	
}