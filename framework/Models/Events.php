<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Database};
use Framework\Models\Components\Pagination;
use \Exception;


class Events extends Model {

	private static $table = "events";
    public static $EVENTStatus = ["active"];

	public function __construct() {
		parent::__construct();
	}

	public static function addEvent() {
		$posted = ["date" => self::post("date"), "location" => self::post("location"), "time" => self::post("time"), "title" => self::post("title")];
		if (empty($posted["date"])) {
			return ['status' => "invalid-date"];
        }elseif (empty($posted["location"])) {
            return ['status' => "invalid-location"];
		}elseif (empty($posted["time"])) {
			return ['status' => "invalid-time"];
		}elseif (empty($posted["title"])) {
            return ['status' => "invalid-title"];
        }
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (date, location, time, title) VALUES(:date, :location, :time, :title)");
        	$database->execute($posted);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING EVENT ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public static function getAllEvents($pageNumber = 0) {
		try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT * FROM {$table} LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allEvents" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL EVENTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function editEvent($id) {
        $posted = ["date" => self::post("date"), "location" => self::post("location"), "time" => self::post("time"), "title" => self::post("title")];
        if (empty($posted["date"])) {
            return ['status' => "invalid-date"];
        }elseif (empty($posted["location"])) {
            return ['status' => "invalid-location"];
        }elseif (empty($posted["time"])) {
            return ['status' => "invalid-time"];
        }elseif (empty($posted["title"])) {
            return ['status' => "invalid-title"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET date = :date, location = :location, time = :time, title = :title WHERE id = :id LIMIT 1");
            $merged = array_merge(["id" => $id], $posted);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING EVENT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function deleteEvent($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->rowCount() > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("DELETING EVENT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function getNextEvent() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE date >= CURDATE() ORDER BY time DESC LIMIT 1");
            $database->execute();
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING NEXT EVENTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

}
