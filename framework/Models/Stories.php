<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Database};
use Framework\Models\Components\Pagination;


class Stories extends Model {

	private static $table = "stories";
    public static $videoStoryStatus = ["active", "inactive"];

	public function __construct() {
		parent::__construct();
	}

	public static function addVideoStory() {
		$posted = ["link" => self::post("link"), "status" => self::post("status"), "title" => self::post("title")];
		if (empty($posted["link"]) || !Validate::range($posted["link"], 3, 255)) {
			return ['status' => "invalid-link"];
        }elseif (self::videoLinkExists($posted["link"]) === true) {
            return ['status' => "video-exists"];
		}elseif (empty($posted["status"]) || !$posted["status"]) {
			return ['status' => "invalid-status"];
		}elseif (empty($posted["title"]) || !$posted["title"]) {
            return ['status' => "invalid-title"];
        }
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (link, status, title, updated) VALUES(:link, :status, :title, :updated)");
            $merged = array_merge($posted, ["updated" => time()]);
        	$database->execute($merged);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING VIDEO STORY ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function getLatestVideoStory() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE status = :status ORDER BY updated DESC LIMIT 1");
            $database->execute(["status" => "active"]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING LATEST VIDEO STORY ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function getVideoStoryById($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING VIDEO STORY BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function getAllVideoStories() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} ORDER BY date DESC");
            $database->execute();
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL VIDEO STORY ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function videoLinkExists($link) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT link FROM {$table} WHERE link = :link LIMIT 1");
            $database->execute(["link" => $link]);
            return $database->rowCount() > 0 ? true : false;
        } catch (Exception $error) {
            Logger::log("CHECKING VIDEO LINK EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function toggleVideoStatus($id) {
        try {
            $video = self::getVideoStoryById($id);
            $newStatus = (isset($video->status) && strtolower($video->status) === "active") ? "inactive" : "active";
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} set status = :status, updated = :updated WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id, "status" => $newStatus, "updated" => time()]);
            return $database->rowCount() > 0 ? ["status" => "success", "video" => ucfirst($newStatus)] : ["status" => "error", "video" => ucfirst($video->status)];
        } catch (Exception $error) {
            Logger::log("TOGGLING NETWORK STATUS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error", "video" => ucfirst($video->status)];
        }
    }

    public static function deleteVideoStory($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->rowCount() > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("DELETING VIDEO STORY ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }


}