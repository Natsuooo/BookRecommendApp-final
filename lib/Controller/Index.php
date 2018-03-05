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
		
//		$firstSlideModel=new \lib\Model\Posts();
//		$firstSlide=$slideModel->firstSlide();
//		$this->setValues('firstSlide', $firstSlide);
		
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
		
		$wordsModel=new \lib\Model\Words();
		$words=$wordsModel->words([
			'professionalCategory'=>'sociology'
		]);
		$this->setValues('words', $words);
	}
}