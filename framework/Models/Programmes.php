<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class Programmes extends Model {

	private static $table = "programmes";
    public static $status = ["active", "inactive"];

	public function __construct() {
		parent::__construct();
	}

	public static function addProgramme() {
		$posted = ["year" => self::post("year"), "month" => self::post("month"), "day" => self::post("day"), "starts" => self::post("starts"), "ends" => self::post("ends"), "presenter" => self::post("presenter"), "title" => self::post("title"), "status" => self::post("status"), "description" => self::post("description")];

        if (empty($posted["presenter"])) {
            return ["status" => "invalid-presenter"];
        }elseif(empty($posted["title"])) {
            return ["status" => "invalid-title"];
        }elseif (empty($posted["starts"])) {
            return ["status" => "invalid-starts"];
        }elseif (empty($posted["ends"])) {
			return ["status" => "invalid-ends"];
		}elseif (empty($posted["description"])) {
			return ["status" => "invalid-description"];
		}
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (year, month, day, starts, ends, presenter, title, status, description) VALUES(:year, :month, :day, :starts, :ends, :presenter, :title, :status, :description)");
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
            return ["allProgrammes" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL PROGRAMMES ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function editProgramme($id) {
        $posted = ["year" => self::post("year"), "month" => self::post("month"), "day" => self::post("day"), "starts" => self::post("starts"), "ends" => self::post("ends"), "presenter" => self::post("presenter"), "title" => self::post("title"), "status" => self::post("status"), "description" => self::post("description")];

        if (empty($posted["presenter"])) {
            return ["status" => "invalid-presenter"];
        }elseif(empty($posted["title"])) {
            return ["status" => "invalid-title"];
        }elseif (empty($posted["starts"])) {
            return ["status" => "invalid-starts"];
        }elseif (empty($posted["ends"])) {
            return ["status" => "invalid-ends"];
        }elseif (empty($posted["description"])) {
            return ["status" => "invalid-description"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET year = :year, month = :month, day = :day, starts = :starts, ends = :ends, presenter = :presenter, title = :title, status = :status, description = :description WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING PROGRAMME ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function deleteProgramme($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("DELETING PROGRAMME ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

    public static function toggleProgrammeStatus($id) {
        $programme = self::getProgrammeById($id);
        $status = (isset($programme->status) && strtolower($programme->status) === "active") ? "inactive" : "active";
    }

    public static function getUpcomingProgrammes() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE year = :year AND month = :month AND day = :day AND starts >= CURRENT_TIME ORDER BY starts");
            $database->execute(["year" => date("Y"), "month" => date("F"), "day" => strtolower(date("l"))]);
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL UPCOMING PROGRAMMES ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

    public static function getAllProgrammesCount() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table}");
            $database->execute();
            return $database->rowCount();
        } catch (Exception $error) {
            Logger::log("GETTING ALL PROGRAMMES COUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

}
