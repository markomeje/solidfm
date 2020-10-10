<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class Youtube extends Model {

	private static $table = "youtube";
    public static $youtubeVideoStatus = ["active"];

	public function __construct() {
		parent::__construct();
	}

	public static function addYoutubeVideo() {
		$posted = ["link" => self::post("link"), "description" => self::post("description"), "status" => self::post("status")];
		if (empty($posted["link"]) || !Validate::url($posted["link"])) {
			return ["status" => "invalid-link"];
        }elseif (self::youtubeVideoLinkExists($posted["link"]) === true) {
            return ["status" => "link-exists"];
        }elseif (empty($posted["status"]) || !$posted["status"]) {
            return ["status" => "invalid-status"];
		}elseif (empty($posted["description"]) || !Validate::range($posted["description"], 3, 55)) {
			return ["status" => "invalid-description"];
		}
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (link, description, status) VALUES(:link, :description, :status)");
        	$database->execute($posted);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING YOUTUBE VIDEO ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function youtubeVideoLinkExists($link) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT link FROM {$table} WHERE link = :link LIMIT 1");
            $database->execute(["link" => $link]);
            return $database->rowCount() > 0 ? true : false;
        } catch (Exception $error) {
            Logger::log("CHECKING YOUTUBE VIDEO LINK EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

	public static function getAllYoutubeVideos($pageNumber = 0) {
		try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT * FROM {$table} LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allYoutubeVideos" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL YOUTUBE VIDEO ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function getCategoriesList() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT name, id FROM {$table}");
            $database->execute();
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL CATEGORIES LISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function editYoutubeVideo($id) {
        $posted = ["link" => self::post("link"), "description" => self::post("description"), "status" => self::post("status")];
        if (empty($posted["link"]) || !Validate::url($posted["link"])) {
            return ["status" => "invalid-link"];
        }elseif (empty($posted["status"]) || !$posted["status"]) {
            return ["status" => "invalid-status"];
        }elseif (empty($posted["description"]) || !Validate::range($posted["description"], 3, 55)) {
            return ["status" => "invalid-description"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET link = :link, description = :description, status = :status WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING YOUTUBE VIDEO ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}
