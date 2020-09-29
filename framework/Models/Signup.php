<?php

namespace Framework\Models;
use Application\Core\{Model, user};
use Application\Library\{Session, Validate};
use Application\Http\Cookie;


class Signup extends Model {

	public function __construct() {
		parent::__construct();
	}

	public static function signup() {
		$posted = ["email" => self::post("email"), "password" => self::post("password"), "confirm" => self::post("confirm"), "phone" => self::post("phone")];
		if (empty($posted["firstname"]) || !Validate::range($posted["firstname"], 3, 55)) {
			return ["status" => "invalid-firstname"];
		}elseif (empty($posted["lastname"]) || !Validate::range($posted["lastname"], 3, 55)) {
			return ["status" => "invalid-lastname"];
		}elseif (empty($posted["email"]) || !Validate($posted["email"])) {
			return ["status" => "invalid-email"];
		}elseif (empty($posted["phone"]) || !is_numeric($posted["phone"])) {
			return ["status" => "invalid-phone"];
		}elseif (empty($posted["password"]) || !Validate::range($posted["password"], 6, 15)) {
			return ["status" => "invalid-password"];
		}elseif ($posted["confirm"] !== $posted["password"]) {
			return ["status" => "invalid-confirm"];
		}
        
        try {
        	$userCreated = Users::createUser($posted);
        	return ($userCreated) ? ["status" => "sucess"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("SIGNING UP USER ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
        }
		
	}

	public function verify($token = "") {
        
	}

}