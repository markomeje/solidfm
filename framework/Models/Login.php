<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Authentication};
use \Exception;


class Login extends Model {


	public function __construct() {
		parent::__construct();
	}

	public static function login() {
		$posted = ["email" => self::post("email"), "password" => self::post("password")];
		if (empty($posted["email"])) {
			return ["status" => "invalid-email"];
		}elseif (empty($posted["password"])) {
			return ["status" => "invalid-password"];
		}

		try {
			$user = Users::getUserByEmail($posted["email"]);
			if(empty($user)) return ["status" => "invalid-user"];
			$password = isset($user->password) ? $user->password : null;
			if(!password_verify($posted["password"], $password)) return ["status" => "invalid-login"];
			$data = ["id" => $user->id, "email" => $user->email, "role" => $user->role, "isLoggedIn" => true];
			Authentication::authenticate($data);
			return ["status" => "success", "redirect" => DOMAIN."/dashboard"];
		} catch (Exception $error) {
			Logger::log("USER LOGIN ERROR", $error->getMessage(), __FILE__, __LINE__);
			return ["status" => "error"];
		}
	}

}
