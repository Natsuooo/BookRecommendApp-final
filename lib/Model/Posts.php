<?php
namespace lib\Model;

class Posts extends \lib\Model{
	
	public function post($values){
		$stmt=$this->db->prepare("insert into posts(id, name, title, author, publishDate, publisher, url, img, category, difficulty, text, created, modified) values (:id, :name, :title, :author, :publishDate, :publisher, :url, :img, :category, :difficulty, :text, now(), now())");
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
			':difficulty'=>$values['difficulty'],
			':text'=>$values['text']
		]);
	}
	
	public function findAll(){
		$stmt=$this->db->query("select * from posts order by postId DESC limit 5");
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
		$stmt=$this->db->query("select * from posts order by rand() limit 5");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $posts=$stmt->fetchAll();
	}
	
	public function related($values){
		$stmt=$this->db->prepare("select * from posts where category=:category order by rand() limit 5");
		$stmt->execute([
			':category'=>$values['category']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $related=$stmt->fetchAll();
	}
	
	public function myposts($values){
		$stmt=$this->db->prepare("select * from posts where id=:id order by postId DESC");
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
		$stmt=$this->db->prepare("update posts set category=:category, difficulty=:difficulty, text=:text, modified=now() where postId=:postId");
		$stmt->execute([
			':postId'=>$values['postId'],
			':category'=>$values['category'],
			':difficulty'=>$values['difficulty'],
			':text'=>$values['text']
		]);
	}
	
	public function category($values){
		$stmt=$this->db->prepare("select * from posts where category=:category order by postId DESC");
		$stmt->execute([
			':category'=>$values['category']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$category=$stmt->fetchAll();
		return $category;
	}
	
	
	
}