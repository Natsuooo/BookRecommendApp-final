<?php
namespace lib\Model;

class Comments extends \lib\Model{
	
	public function comment($values){
		$stmt=$this->db->prepare("insert into comments(postId, comment, created) values (:postId, :comment, now())");
		$stmt->execute([
			':postId'=>$values['postId'],
			':comment'=>$values['comment']
		]);
	}
	
	public function showcomments($values){
		$stmt=$this->db->prepare("select * from comments where postId=:postId");
		$stmt->execute([
			':postId'=>$values['postId']
		]);
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		$showComments=$stmt->fetchAll();
		return $showComments;
	}
	
}