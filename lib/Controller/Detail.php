<?php
namespace lib\Controller;

class Detail extends \lib\Controller{
	public function run(){
		$this->showComments();
		
		$postModel=new \lib\Model\Posts();
		$details=$postModel->detail([
			'postId'=>$_GET['post']
		]);
		$this->setValues('details', $details);
		
		$recommendModel=new \lib\Model\Posts();
		$recommends=$recommendModel->recommend();
		$this->setValues('recommends', $recommends);
		
		foreach($details as $detail){
			$category=$detail->category;
		}
		$relatedModel=new \lib\Model\Posts();
		$related=$relatedModel->related([
			'category'=>$category
		]);
		$this->setValues('related', $related);
		

		
//		if($_SERVER['REQUEST_METHOD']==='POST'){
//			$this->postProcess();
//		}
	}
	
//	protected function postProcess(){
//		try{
//			$this->validate();
//		}catch(\lib\Exception\EmptyComment $e){
//			$this->setErrors('comment', $e->getMessage());
//		}
//		
//		$this->setValues('comment', $_POST['addComment']);
//		
//		if($this->hasError()){
//			return;
//		}else{
//			$commentModel=new \lib\Model\Comments();
//			$commentModel->comment([
//				'postId'=>$_GET['post'],
//				'comment'=>$_POST['addComment']
//			]);
//			$this->setValues('comment', '');
//			return;
//		}
//			
//	}
//	
//	private function validate(){
//		if(!isset($_POST['comment'])){
//			echo "Invalid Form!";
//			exit;
//		}
//		if($_POST['comment']===''){
//			throw new \lib\Exception\EmptyComment();
//		}
//	}
//	
	protected function showComments(){
		$showCommentsModel=new \lib\Model\Comments();
		$showComments=$showCommentsModel->showComments([
			'postId'=>$_GET['post']
		]);
		$this->setValues('comments', $showComments);
	}
	
}