<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Mailer};


class Contact extends Model {

	public static $validationError = [];

	public function __construct() {
		parent::__construct();
	}

	public static function request() {
		$posted = ["firstname" => self::post("firstname"), "lastname" => self::post("lastname"), "email" => self::post("email"), "message" => self::post("message")];
		$isValid = false;
		foreach ($posted as $key => $value) {
			if (empty($value) || !$value) {
				return ["status" => "All fields are required"];
				$isValid = false;
			}
		}
	}
}