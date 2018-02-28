<?php
namespace lib\Controller;

class Category extends \lib\Controller{
	public function run(){
		
		$categoryModel=new \lib\Model\Posts();
		$category=$categoryModel->category([
			'category'=>$_GET['category']
		]);
		$this->setValues('categoryPosts', $category);
		
		
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
		
		$recommendModel=new \lib\Model\Posts();
		$recommends=$recommendModel->recommend();
		$this->setValues('recommends', $recommends);
	}
}