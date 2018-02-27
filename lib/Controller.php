<?php
namespace lib;

class Controller{
	
	private $errors;
	private $values;
	
	public function __construct(){
		$this->errors=new \stdClass();
		$this->values=new \stdClass();
		if(!isset($_SESSION['token'])){
			$_SESSION['token']=bin2hex(openssl_random_pseudo_bytes(16));
		}
	}
	
	protected function setErrors($key, $error){
		$this->errors->$key=$error;
	}
	
	public function getErrors($key){
		return isset($this->errors->$key) ? $this->errors->$key:''; 
	}
	
	protected function hasError(){
		return !empty(get_object_vars($this->errors));
	}
	
	protected function setValues($key, $value){
		$this->values->$key=$value;
	}
	
	public function getValues($key){
		return isset($this->values->$key) ? $this->values->$key:'';
	}
	
	public function me(){
		return $this->isLoggedIn() ? $_SESSION['me']:null;
	}
	
	protected function isLoggedIn(){
		return isset($_SESSION['me'])&&!empty($_SESSION['me']);
	}
	
	
	
}
