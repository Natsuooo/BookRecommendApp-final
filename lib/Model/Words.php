<?php
namespace lib\Model;

class Words extends \lib\Model{
	
	public function words(){
		$stmt=$this->db->query("select * from words order by rand() limit 1");
		$stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
		return $words=$stmt->fetchAll();
	}

	
}