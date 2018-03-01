<?php
namespace lib\Controller;

class NewEntry extends \lib\Controller{
	public function run(){
		$maxPagesModel=new \lib\Model\Posts();
		$maxPages=$maxPagesModel->maxPages();
		$this->setValues('maxPages', $maxPages);
		
		$newEntryModel=new \lib\Model\Posts();
		$newEntries=$newEntryModel->newEntry([
			'page'=>$_GET['page']
		]);
		$this->setValues('newEntries', $newEntries);
		
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
		
		$postModel=new \lib\Model\Posts();
		$posts=$postModel->findAll();
		$this->setValues('posts', $posts);
	}
}