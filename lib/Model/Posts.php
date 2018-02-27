<?php
namespace lib\Model;

class Posts extends \lib\Model{
	
	public function post($values){
		$stmt=$this->db->prepare("insert into posts(id, name, title, author, publishDate, publisher, url, img, category, text, created, modified) values (:id, :name, :title, :author, :publishDate, :publisher, :url, :img, :category, :text, now(), now())");
		$stmt->execute([
			':id'=>$values['id'],
			':name'=>$values['name'],
			':title'=>$values['title'],
			':author'=>$values['author'],
			':publishDate'=>$values['publishDate'],
			':publisher'=>$values['publisher'],
			':url'=>$values['url'],
			':img'=>$values['img'],
			':category'=>$values['category'],
			':text'=>$values['text']
		]);
	}
	
	public function findAll(){
		$stmt=$this->db->query("select * from posts order by postId");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $posts=$stmt->fetchAll();
	}
	
	public function slide(){
		$stmt=$this->db->query("select * from posts order by rand() limit 3");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $posts=$stmt->fetchAll();
	}
	
	public function firstSlide(){
		$stmt=$this->db->query("select * from posts order by rand() limit 1");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $posts=$stmt->fetchAll();
	}
	
	public function recommend(){
		$stmt=$this->db->query("select * from posts order by rand() limit 3");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $posts=$stmt->fetchAll();
	}
	
	public function related($values){
		$stmt=$this->db->prepare("select * from posts where category=:category order by rand() limit 3");
		$stmt->execute([
			':category'=>$values['category']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $related=$stmt->fetchAll();
	}
	
	public function myposts($values){
		$stmt=$this->db->prepare("select * from posts where id=:id");
		$stmt->execute([
			':id'=>$values['id']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$myposts=$stmt->fetchAll();
		return $myposts;
	}
	
	public function detail($values){
		$stmt=$this->db->prepare("select * from posts where postId=:postId");
		$stmt->execute([
			':postId'=>$values['postId']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$details=$stmt->fetchAll();
		return $details;
	}
	
	public function delete($values){
		$stmt=$this->db->prepare("delete from posts where postId=:postId");
		$stmt->execute([
			'postId'=>$values['postId']
		]);
	}
	
	public function edit($values){
		$stmt=$this->db->prepare("update posts set title=:title, text=:text, modified=now() where postId=:postId");
		$stmt->execute([
			':postId'=>$values['postId'],
			':title'=>$values['title'],
			':text'=>$values['text']
		]);
	}
	
	
	
}