<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Database};
use Framework\Models\Components\Pagination;


class Titles extends Model {

	private static $table = "titles";
    public static $categoryStatus = ["active"];

	public function __construct() {
		parent::__construct();
	}

	public static function addTitle() {
		$posted = ["title" => self::post("title"), "startingtime" => self::post("startingtime"), "endingtime" => self::post("endingtime"), "programme" => self::post("programme")];
		if (empty($posted["title"])) {
			return ['status' => "invalid-title"];
		}elseif (empty($posted["startingtime"])) {
			return ['status' => "invalid-starting-time"];
        }elseif (empty($posted["endingtime"])) {
            return ['status' => "invalid-ending-time"];
		}elseif (empty($posted["programme"])) {
            return ['status' => "invalid-programme"];
        }
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (title, startingtime, endingtime, programme) VALUES(:title, :startingtime, :endingtime, :programme)");
        	$database->execute($posted);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING CATEGORY ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function getAllTitles() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} ORDER BY startingtime");
            $database->execute();
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL TITLES ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

}
