<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Session, Validate, Database};


class Users extends Model {

	private static $table = "users";

	public function __construct() {
		parent::__construct();
	}

    public static function getUserByEmail($email) {
    	try {
	        $database = Database::connect();
	        $table = self::$table;
	        $database->prepare("SELECT * FROM {$table} WHERE email = :email LIMIT 1");
	        $database->execute(["email" => $email]);
	        return $database->fetch();
    	} catch (Exception $error) {
    		Logger::log("GETTING USER BY EMAIL ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
    	}
    }

    public static function getUserById($id) {
    	try {
	        $database = Database::connect();
	        $table = self::$table;
	        $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
	        $database->execute(["id" => $id]);
	        return $database->fetch();
    	} catch (Exception $error) {
    		Logger::log("GETTING USER BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return false;
    	}
    }

}
