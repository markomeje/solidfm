<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class Upcomings extends Model {

	private static $table = "upcomings";

	public function __construct() {
		parent::__construct();
	}

	public static function addUpcoming() {
		$posted = ["title" => self::post("title"), "presenter" => self::post("presenter"), "time" => self::post("time")];
		if (empty($posted["title"]) || !Validate::range($posted["title"], 3, 55)) {
			return ['status' => "invalid-title"];
		}elseif (empty($posted["presenter"]) || !Validate::range($posted["presenter"], 3, 55)) {
			return ['status' => "invalid-presenter"];
		}elseif (empty($posted["time"])) {
			return ['status' => "invalid-time"];
		}

		$file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "upcomings";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }
        
        try {
        	$database = Database::connect();
            $database->beginTransaction();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (title, presenter, image, time) VALUES(:title, :presenter, :image, :time)");
            $merged = array_merge($posted, ["image" => $image["basename"]]);
        	$database->execute($merged);
            Uploader::upload($file, $image["path"], 380, 208);
            $database->commit();
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
        	Logger::log("ADDING UPCOMING ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public static function getAllUpcomings($pageNumber = 0) {
		try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT * FROM {$table} ORDER BY time ASC LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allUpcomings" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL UPCOMINGS ERROR", $error->getMessage(), __FILE__, __LINE__);
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
