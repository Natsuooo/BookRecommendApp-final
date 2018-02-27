<?php
namespace lib\Controller;

class Edit extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		$postModel=new \lib\Model\Posts();
		$editpost=$postModel->detail([
			'postId'=>$_GET['post']
		]);
		$this->setValues('editpost', $editpost);
		
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->postProcess();
		}
		
	}
	
	protected function postProcess(){
		try{
			$this->validate();
		}catch(\lib\Exception\EmptyPost $e){
			$this->setErrors('post', $e->getMessage());
		}
		
		$this->setValues('title', $_POST['title']);
		$this->setValues('text', $_POST['text']);
		
		if($this->hasError()){
			return;
		}else{
			$postModel=new \lib\Model\Posts();
			$postModel->edit([
				'postId'=>$_GET['post'],
				'title'=>$_POST['title'],
				'text'=>$_POST['text']
			]);
			header('Location: '.SITE_URL);
			exit;
		}
		
	}
	
	private function validate(){
		if(!isset($_POST['title'])||!isset($_POST['text'])){
			echo "Invalid Form!";
			exit;
		}
		if($_POST['title']===''||$_POST['text']===''){
			throw new \lib\Exception\EmptyPost();
		}
	}
	
	
	
}