<?php
namespace lib\Controller;

class Professor extends \lib\Controller{
	public function run(){
		$profileModel=new \lib\Model\Profiles();
		$profile=$profileModel->profile([
			'id'=>$_GET['id']
		]);
		$this->setValues('profile', $profile);
		
		$postModel=new \lib\Model\Posts();
		$myposts=$postModel->myposts([
			'id'=>$_GET['id']
		]);
		$this->setValues('myposts', $myposts);
		
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
		

		

		
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
		
		$recommendModel=new \lib\Model\Posts();
		$recommends=$recommendModel->recommend();
		$this->setValues('recommends', $recommends);
	}

	
}
