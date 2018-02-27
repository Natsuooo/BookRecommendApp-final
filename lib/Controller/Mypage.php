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
		
	}

}