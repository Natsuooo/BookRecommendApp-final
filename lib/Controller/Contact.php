<?php
namespace lib\Controller;

require_once(__DIR__.'/../../config/config.php');

class Contact extends \lib\Controller{
	public function run(){
		if($_SERVER['REQUEST_METHOD']==='POST'){
			
			$this->setValues('firstName', $_POST['firstName']);
			$this->setValues('lastName', $_POST['lastName']);
			$this->setValues('email', $_POST['email']);
			$this->setValues('message', $_POST['message']);
			
			mb_language("Japanese");
			mb_internal_encoding("UTF-8");
			$toC=$_POST['email'];
			$subjectC='【Elel】お問い合わせありがとうございました。';
			$bodyC=
				h($_POST['firstName'])." ".h($_POST['lastName'])."様".
				"お問い合わせありがとうございました。"."\r\n".
				"下記の内容で受付いたしました。返信まで今しばらくお待ちください。"."\r\n".
				"\r\n".
				"\r\n".
				"お問い合わせ内容: ".h($_POST['message'])."\r\n";
			$headersC="From: n17975775@gmail.com";
			

			$toMe="1116263m@g.hit-u.ac.jp";
			$subjectMe='【Elel】お問い合わせがありました。';
			$bodyMe=
				'名前：'.h($_POST['firstName'])." ".h($_POST['lastName'])."\r\n".
				'問い合わせ内容：'.h($_POST['message'])."\r\n";
			$headersMe="From: 116263m@g.hit-u.ac.jp";
			
			
			
			if(mb_send_mail($toC, $subjectC, $bodyC, $headersC)&&mb_send_mail($toMe, $subjectMe, $bodyMe, $headersMe)){
				$this->setErrors('successEmail', 'Success to send');
			}else{
				$this->setErrors('failEmail', 'Fail to send');
			}
		}
	}
}