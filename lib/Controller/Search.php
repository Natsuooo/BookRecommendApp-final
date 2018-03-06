<?php
namespace lib\Controller;

class Search extends \lib\Controller{
	public function run(){
		if(!$this->isLoggedIn()){
			header('Location: '.SITE_URL.'/login.php');
			exit;
		}
		if(if(isset($_POST['search'])){
			$this->postProcess();
		}){
			$this->ItemSearch("Books", $_POST['search']);
		}
		
		if(isset($_POST['logout'])){
			$this->logout();
		}
	}
	
	protected function ItemSearch($SearchIndex, $Keywords){
		try{
			$this->validate();
		}catch(\lib\Exception\EmptySearch $e){
			$this->setErrors('search', $e->getMessage());
		}
		
		$this->setValues('search', $_POST['search']);
		
		if($this->hasError()){
			return;
		}else{
		
		define("Access_Key_ID", "AKIAJ7WKQLPP633MB6UA");
		define("Secret_Access_Key", "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");
		define("Associate_tag", "natsuo07-22");
			
		require_once("base_request.php");
		$amazon_xml = @simplexml_load_string(file_get_contents($base_request));
			
		try{
			if($amazon_xml===false){
			throw new \lib\Exception\SearchError();
			
			}
		}catch(\lib\Exception\SearchError $e){
			$this->setErrors('search', $e->getMessage());
			return [];
		}
		
		$this->setValues('items', $amazon_xml->Items->Item);
		}
	}
	
	private function validate(){
		if(!isset($_POST['search'])){
			echo "Invalid Form!";
			exit;
		}
		if($_POST['search']===''){
			throw new \lib\Exception\EmptySearch();
		}
	}
	
}