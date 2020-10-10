<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class Programmes extends Model {

	private static $table = "programmes";
    public static $programmeStatus = ["active"], $programmeBelts = ["morning", "afternoon", "evening"];

	public function __construct() {
		parent::__construct();
	}

	public static function addProgramme() {
		$posted = ["year" => self::post("year"), "month" => self::post("month"), "day" => self::post("day"), "belt" => self::post("belt"), "time" => self::post("time"), "status" => self::post("status"), "presenter" => self::post("presenter"), "producer" => self::post("producer"), "anchor" => self::post("anchor"), "host" => self::post("host"), "title" => self::post("title"), "synopsis" => self::post("synopsis")];

        if (empty($posted["year"])) {
            return ["status" => "invalid-year"];
        }elseif (empty($posted["time"])) {
            return ["status" => "invalid-time"];
        }elseif (empty($posted["title"])) {
			return ["status" => "invalid-title"];
		}elseif (empty($posted["synopsis"])) {
			return ["status" => "invalid-synopsis"];
		}
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (year, month, day, belt, time, status, presenter, producer, anchor, host, synopsis, title) VALUES(:year, :month, :day, :belt, :time, :status, :presenter, :producer, :anchor, :host, :synopsis, :title)");
        	$database->execute($posted);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING PROGRAMME ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public static function getAllProgrammes($pageNumber = 0) {
		try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT * FROM {$table} ORDER BY year ASC LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allprogrammes" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL PROGRAMMES ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function editUpcoming($id) {
        $posted = ["title" => self::post("title"), "presenter" => self::post("presenter"), "time" => self::post("time")];
        if (empty($posted["title"]) || !Validate::range($posted["title"], 3, 55)) {
            return ['status' => "invalid-title"];
        }elseif (empty($posted["presenter"]) || !Validate::range($posted["presenter"], 3, 55)) {
            return ['status' => "invalid-presenter"];
        }elseif (empty($posted["time"])) {
            return ['status' => "invalid-time"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET title = :title, presenter = :presenter, time = :time WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING UPCOMING ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}
