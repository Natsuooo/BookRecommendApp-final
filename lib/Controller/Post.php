<?php
namespace lib\Controller;

class Post extends \lib\Controller{
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
		}catch(\lib\Exception\EmptyPost $e){
			$this->setErrors('post', $e->getMessage());
		}
		
		$this->setValues('text', $_POST['text']);
		
		if($this->hasError()){
			return;
		}else{
			$postModel=new \lib\Model\Posts();
			$postModel->post([
				'id'=>$_SESSION['me']->id,
				'name'=>$_SESSION['me']->name,
				'title'=>$_POST['title'],
				'author'=>$_POST['author'],
				'publishDate'=>$_POST['publishDate'],
				'publisher'=>$_POST['publisher'],
				'url'=>$_POST['url'],
				'img'=>$_POST['img'],
				'category'=>$_POST['category'],
				'text'=>$_POST['text']
			]);
			header('Location: '.SITE_URL.'/mypage.php');
			exit;
		}
		
	}
	
	private function validate(){
		if(!isset($_POST['text'])){
			echo "Invalid Form!";
			exit;
		}
		if($_POST['text']===''){
			throw new \lib\Exception\EmptyPost();
		}
	}
	
}