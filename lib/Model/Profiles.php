<?php
namespace lib\Model;

class Profiles extends \lib\Model{
	
	public function createProfile($values){
		$stmt=$this->db->prepare("insert into profiles(id, firstName, lastName, professionalCategory, department, professional, message, created, modified) values (:id, :firstName, :lastName, :professionalCategory, :department, :professional, :message, now(), now())");
		$stmt->execute([
			':id'=>$values['id'],
			':firstName'=>$values['firstName'],
			':lastName'=>$values['lastName'],
			':professionalCategory'=>$values['professionalCategory'],
			':department'=>'',
			':professional'=>'',
			':message'=>''
		]);
	}

	public function profile($values){
		$stmt=$this->db->prepare("select * from profiles where id=:id");
		$stmt->execute([
			':id'=>$values['id']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$profile=$stmt->fetchAll();
		return $profile;
	}
	
	public function update($values){
		$stmt=$this->db->prepare("update profiles set firstName=:firstName, lastName=:lastName, professionalCategory=:professionalCategory, department=:department, professional=:professional, message=:message, modified=now() where id=:id");
		$stmt->execute([
			':id'=>$values['id'],
			':firstName'=>$values['firstName'],
			':lastName'=>$values['lastName'],
			':professionalCategory'=>$values['professionalCategory'],
			':department'=>$values['department'],
			':professional'=>$values['professional'],
			':message'=>$values['message']
		]);
	}
	
	public function professor($values){
		$stmt=$this->db->prepare("select * from profiles where professionalCategory=:professionalCategory order by id DESC");
		$stmt->execute([
			':professionalCategory'=>$values['professionalCategory']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$professor=$stmt->fetchAll();
		return $professor;
	}
	
}