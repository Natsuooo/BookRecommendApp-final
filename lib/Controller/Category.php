<?php
namespace lib\Controller;

class Category extends \lib\Controller{
	public function run(){
		$maxPagesModel=new \lib\Model\Posts();
		$maxPages=$maxPagesModel->categoryMaxPages([
			'category'=>$_GET['category']
		]);
		$this->setValues('maxPages', $maxPages);
		
		$categoryModel=new \lib\Model\Posts();
		$category=$categoryModel->category([
			'category'=>$_GET['category'],
			'page'=>$_GET['page']
		]);
		$this->setValues('categoryPosts', $category);
		
		
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
		
		$recommendModel=new \lib\Model\Posts();
		$recommends=$recommendModel->recommend();
		$this->setValues('recommends', $recommends);
		
		$professorModel=new \lib\Model\Profiles();
		$professor=$professorModel->professor([
			'professionalCategory'=>'commerce'
		]);
		$this->setValues('commerceProfessors', $professor);
		
		$professorModel=new \lib\Model\Profiles();
		$professor=$professorModel->professor([
			'professionalCategory'=>'economics'
		]);
		$this->setValues('economicsProfessors', $professor);
		
		$professorModel=new \lib\Model\Profiles();
		$professor=$professorModel->professor([
			'professionalCategory'=>'law'
		]);
		$this->setValues('lawProfessors', $professor);
		
		$professorModel=new \lib\Model\Profiles();
		$professor=$professorModel->professor([
			'professionalCategory'=>'sociology'
		]);
		$this->setValues('sociologyProfessors', $professor);
	}
}