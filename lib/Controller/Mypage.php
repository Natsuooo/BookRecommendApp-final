<?php
namespace lib\Controller;

class Mypage extends \lib\Controller{
	
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		$postModel=new \lib\Model\Posts();
		$myposts=$postModel->myposts([
			'id'=>$_SESSION['me']->id
		]);
		$this->setValues('myposts', $myposts);
		
		if(isset($_POST['logout'])){
			$this->logout();
		}
		
		if(isset($_POST['editPostId'])){
			$_SESSION['editPostId']=$_POST['editPostId'];
			header('Location: '.SITE_URL.'/edit.php');
			exit;
		}
		
		if(isset($_POST['deletePostId'])){
			$postModel=new \lib\Model\Posts();
			$postModel->delete([
				'postId'=>$_POST['deletePostId']
			]);
			header('Location: '.SITE_URL.'/mypage.php');
			exit;
		}
		
	}

}