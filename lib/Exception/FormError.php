<?php
namespace lib\Exception;

class FormError extends \Exception{
	protected $message='You should check in on some of those fields below.';
}