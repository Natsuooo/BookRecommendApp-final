<?php
namespace lib\Controller;

class Delete extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		
		$postModel=new \lib\Model\Posts();
		$deletePost=$postModel->detail([
			'postId'=>$_GET['post']
		]);
		$this->setValues('delete', $deletePost);
		
		if($_SERVER['REQUEST_METHOD']==='POST'){
			
			$postModel=new \lib\Model\Posts();
			$postModel->delete([
				'postId'=>$_GET['post']
			]);
			header('Location: '.SITE_URL.'/mypage.php');
			exit;
		}
		
	}
}