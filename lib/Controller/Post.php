<?php
namespace lib\Controller;

class Post extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		if(isset($_POST['text'])){
			$this->postProcess();
		}
	}
	
	if(isset($_POST['logout'])){
			$this->logout();
		}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\FormError $e){
			$this->setErrors('formError', $e->getMessage());
		}
		
		$this->setValues('text', $_POST['text']);
		
		if($this->hasError()){
			return;
		}else{
			$postModel=new \lib\Model\Posts();
			$postModel->post([
				'id'=>$_SESSION['me']->id,
				'firstName'=>$_SESSION['me']->firstName,
				'lastName'=>$_SESSION['me']->lastName,
				'title'=>$_POST['title'],
				'author'=>$_POST['author'],
				'publishDate'=>$_POST['publishDate'],
				'publisher'=>$_POST['publisher'],
				'url'=>$_POST['url'],
				'img'=>$_POST['img'],
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