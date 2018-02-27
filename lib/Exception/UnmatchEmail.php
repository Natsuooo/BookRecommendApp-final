<?php
namespace lib\Exception;

class UnmatchEmail extends \Exception{
	protected $message="This email has not been registered.";
}