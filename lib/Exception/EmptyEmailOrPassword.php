<?php
namespace lib\Exception;

class EmptyEmailOrPassword extends \Exception{
	protected $message="Please enter email/password";
}