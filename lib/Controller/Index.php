<?php
namespace lib\Controller;

class Index extends \lib\Controller{
	public function run(){
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
		
		$slideModel=new \lib\Model\Posts();
		$slides=$slideModel->slide();
		$this->setValues('slides', $slides);
		
		$firstSlideModel=new \lib\Model\Posts();
		$firstSlide=$slideModel->firstSlide();
		$this->setValues('firstSlide', $firstSlide);
		
		$recommendModel=new \lib\Model\Posts();
		$recommends=$recommendModel->recommend();
		$this->setValues('recommends', $recommends);
	}
}