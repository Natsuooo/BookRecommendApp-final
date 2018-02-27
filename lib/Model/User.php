<?php
namespace lib\Model;

class User extends \lib\Model{
	
	public function create($values){
		$stmt=$this->db->prepare("insert into users(name, email, password, created, modified) values (:name, :email, :password, now(), now())");
		$res=$stmt->execute([
			':name'=>$values['name'],
			':email'=>$values['email'],
			':password'=>password_hash($values['password'], PASSWORD_DEFAULT)
		]);
		if($res===false){
			throw new \lib\Exception\DuplicateEmail();
		}
		
		
		
		$stmt=$this->db->prepare("select * from users where email = :email");
		$stmt->execute([
			':email'=>$values['email']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$user=$stmt->fetch();
		return $user;
	}
	
	
	
	public function login($values){
		$stmt=$this->db->prepare("select * from users where email = :email");
		$stmt->execute([
			':email'=>$values['email']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$user=$stmt->fetch();
		if(empty($user)){
			throw new \lib\Exception\UnmatchEmailOrPassword();
		}
		if(!password_verify($values['password'], $user->password)){
			throw new \lib\Exception\UnmatchEmailOrPassword();
		}
		return $user;
	}

	
	public function update($values){
		$stmt=$this->db->prepare("update users set email=:email, password=:password, modified=now() where id=:id");
		$stmt->execute([
			':id'=>$values['id'],
			':email'=>$values['email'],
			':password'=>password_hash($values['password'], PASSWORD_DEFAULT)
		]);
		
		$stmt=$this->db->prepare("select * from users where email = :email");
		$stmt->execute([
			':email'=>$values['email']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$user=$stmt->fetch();
		return $user;
	}
	
	public function forgetPassword($values){
		$stmt=$this->db->prepare("select * from users where email = :email");
		$stmt->execute([
			':email'=>$values['email']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$user=$stmt->fetch();
		if(empty($user)){
			throw new \lib\Exception\UnmatchEmail();
		}else{
			$stmt=$this->db->prepare("update users set password=:password, modified=now() where email=:email");
			$stmt->execute([
			':email'=>$values['email'],
			':password'=>password_hash($values['password'], PASSWORD_DEFAULT)
		]);
		}

	}
	
	
}