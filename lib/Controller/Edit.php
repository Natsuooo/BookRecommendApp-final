<?php
namespace lib\Controller;

class Edit extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		
		if(isset($_POST['logout'])){
			$this->logout();
		}
		
		
		if(isset($_GET['post'])){
			$_SESSION['editPostId']=$_GET['post'];
		}
		
		
		if(isset($_SESSION['editPostId'])){
			$postModel=new \lib\Model\Posts();
			$editpost=$postModel->detail([
				'postId'=>$_SESSION['editPostId']
			]);
			$this->setValues('editpost', $editpost);
		}
		
		
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->postProcess();
		}
		
	}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\FormError $e){
			$this->setErrors('formError', $e->getMessage());
		}
		
		$this->setValues('category', $_POST['category']);
		$this->setValues('difficulty', $_POST['difficulty']);
		$this->setValues('text', $_POST['text']);
		
		if($this->hasError()){
			return;
		}else{
			$postModel=new \lib\Model\Posts();
			$postModel->edit([
				'postId'=>$_SESSION['editPostId'],
				'category'=>$_POST['category'],
				'difficulty'=>$_POST['difficulty'],
				'text'=>$_POST['text']
			]);
			header('Location: '.SITE_URL.'/mypage.php');
			exit;
		}
		
	}
	
	private function validate(){
		if(!isset($_POST['category'])||!isset($_POST['difficulty'])||!isset($_POST['text'])){
			echo "Invalid Form!";
			exit;
		}
		if($_POST['category']===''||$_POST['difficulty']===''||$_POST['text']===''){
			throw new \lib\Exception\FormError();
		}
	}
	
	
	
}