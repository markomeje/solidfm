<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Session, Validate};
use Application\Drivers\Pdo;


class Users extends Model {

	private static $table = "users";

	public function __construct() {
		parent::__construct();
	}

	public static function createUser(array $posted) {
		try {
			$database = Pdo::connect();
	        $database->prepare("INSERT INTO self::$table email, password, rememberme VALUES(:email, :password, :rememberme)");
	        $database->execute($posted);
	        return $database->lastInsertId();
		} catch (Exception $error) {
			Logger::log("CREATING USER ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	}

	public static function emailExists(string $email){
		try {
			$fields = ["email" => $email];
	        $database = Pdo::connect();
	        $database->prepare("SELECT email FROM self::$table WHERE email = :email LIMIT 1");
	        $database->execute($fields);
	        return ($database->rowCount() > 0) ? true : false;
		} catch (Exception $error) {
			Logger::log("USER EMAIL EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
		}
	        
    }

    public static function getUserByEmail(string $email) {
    	try {
    		$fields = ["email" => $email];
	        $database = Pdo::connect();
	        $database->prepare("SELECT * FROM self::$table WHERE email = :email LIMIT 1");
	        $database->execute($fields);
	        return $database->fetch();
    	} catch (Exception $error) {
    		Logger::log("GETTING USER BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
    	}
    }

    public static function getUserById(int $id) {
    	try {
    		$fields = ["id" => $id];
	        $database = Pdo::connect();
	        $database->prepare("SELECT * FROM self::$table WHERE id = :id LIMIT 1");
	        $database->execute($fields);
	        return $database->fetch();
    	} catch (Exception $error) {
    		Logger::log("GETTING USER BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
    	}
    }

}
