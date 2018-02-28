<?php
namespace lib\Controller;

class Professors extends \lib\Controller{
	public function run(){
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
		
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
		
		$recommendModel=new \lib\Model\Posts();
		$recommends=$recommendModel->recommend();
		$this->setValues('recommends', $recommends);
	}
}