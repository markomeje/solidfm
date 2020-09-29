<?php

namespace Framework\Models;
use Application\Core\{Model, user};
use Application\Library\{Session, Validate};
use Application\Http\Cookie;


class Login extends Model {

	private static $table = "login";

	public function __construct() {
		parent::__construct();
	}

	public static function login() {
		$posted = ["email" => self::post("email"), "password" => self::post("password"), "rememberme" => self::post("rememberme"), "csrf" => self::post("csrf")];
		if (!Session::exists("csrf") || Session::get("csrf") !== $posted("csrf")) {
            Cookie::set(ACCESS_DENIED_KEY, $this->IpAddress(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
            return ["status" => "blocked"];
        }elseif (empty($posted["email"]) || !Validate::email($posted["email"])) {
			return ['status' => "invalid-email"];
		}elseif (empty($posted["password"])) {
			return ['status' => "empty-password"];
		}
        
        $user = Users::getUserByEmail($posted["email"]);
        if (empty($user) || $user === false) {
        	return ["status" => "not-found"];
        }elseif ($this->isBlocked($user) === true) {
        	return ["status" => "blocked"];
        }elseif (password_verify($posted["password"], $user->password)) {
	        self::logUserDetailsToSession($user);
			$this->setRememberMeCookie($posted, $user);
			$userLogged - self::getUserLoggedData($user->id);
			$fields = ["failed" => null, "attempts" => null, "token" => session_id(), "last" => time(), "status" => "on", "counter" => $userLogged->counter + 1];
			$this->updateLoginState($fields, $user->id);
			return ["status" => "success", "redirect" => DOMAIN."/dashboard"];
		}else {
			$userLogged - self::getUserLoggedData($user->id);
			$fields = ["failed" => time(), "attempts" => $userLogged->attempts + 1];
	    	$this->updateLoginState($fields, $userLogged->id);
		    return ["status" => "invalid-login", "attempts" => (int)$userLogged->attempts];
		}
	}

	private static function getUserLoggedData(int $id) {
		try {
    		$fields = ["user" => $id];
	        $database = Pdo::connect();
	        $database->prepare("SELECT * FROM self::$table WHERE user = :user LIMIT 1");
	        $database->execute($fields);
	        return $database->fetch();
    	} catch (Exception $error) {
    		Logger::log("GETTING USER LOGIN DATA ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
    	}
	}

	private static function logUserDetailsToSession($user) {
		$data = ["id" => $user->id, "isLoggedIn" => true, "email" => $user->email, "role" => $user->role];
		foreach ($data as $key => $value) {
			Session::set($key, $value);
		}
		Cookie::set(session_name(), session_id(), time() + SESSION_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
	}

	public function addLoginDetails($user) {
		try {
			$password = password_hash($this->password, PASSWORD_DEFAULT);
			$fields = ["email" => $this->email, "password" => $password, "role" => $data["role"]];
			$result = Query::create($this->table, $fields);
			return $result;
        } catch (\Exception $error) {
        	user::log("ADDING LOGIN DETAILS ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
        	return ["status" => "error"];
        }
	}

	private function isBlocked($user) {
		if (empty($user)) {
			return false;
		}else {
            $timeElapsed = time() - $user->failed;
	    	$timeLeft = ($timeElapsed < (60 * 10)); /** if 10 munites **/
	    	return ($user->attempts >= 5 && $timeLeft) ? true : false;
		}
	}

	private static function setRememberMeCookie($posted, $user) {
        if(!empty($posted["rememberme"])) {
			if ($posted["rememberme"] === "on") {
				$encodedUserId = Security::encode($user->id);
				Cookie::set(REMEMBER_ME_COOKIE_NAME, $encodedUserId, time() + REMEMBER_ME_COOKIE_EXPIRY, COOKIE_PATH, COOKIE_DOMAIN, COOKIE_SECURE, COOKIE_HTTP);
			}
		}
	}

	private function updateLoginState($fields, $id) {
		$condition = ["id" => $id];
    	$result = Query::update($this->table, $fields, $condition, 1);
    	return ($result["rowCount"] > 0) ? true : false;
	}

	public function logout() {
		try {
			$fields = ["token" => null, "status" => null];
			$this->updateLoginState($fields, Session::get("id"));
			Session::destroy();
			Cookie::destroy(REMEMBER_ME_COOKIE_NAME);
			return ["status" => "logout", "redirect" => DOMAIN];
		} catch (\Exception $error) {
			user::log("LOGGING OUT ERROR", $error->getMessage(), $error->getFile(), $error->getLine());
			return false;
		}
	}

}
