<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Database, Uploader};
use Framework\Models\Components\Pagination;
use \Exception;


class Adverts extends Model {

	private static $table = "adverts";
    public static $advertsStatus = ["active", "inactive"];

	public function __construct() {
		parent::__construct();
	}

	public static function addAdvert() {
		$posted = ["start" => self::post("start"), "expiry" => self::post("expiry"), "status" => self::post("status")];
        $file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "adverts";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }elseif (empty($posted["status"])) {
            return ['status' => "invalid-status"];
        }elseif (empty($posted["start"])) {
            return ['status' => "invalid-start"];
        }elseif (empty($posted["expiry"])) {
            return ['status' => "invalid-expiry"];
        }
        
        try {
            $database = Database::connect();
            $database->beginTransaction();
            $table = self::$table;
            $database->prepare("INSERT INTO {$table} (start, expiry, image, status) VALUES(:start, :expiry, :image, :status)");
            $merged = array_merge($posted, ["image" => $image["basename"]]);
            $database->execute($merged);
            Uploader::upload($file, $image["path"], 380, 208);
            $database->commit();
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log("ADDING ADVERT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
	}

    public static function getAllAdverts($pageNumber = 0) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT * FROM {$table} LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allAdverts" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL ADVERTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function getAllActiveAdverts($pageNumber = 0) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT * FROM {$table} LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allCategories" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL ACTIVE ADVERTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function getAdvertById($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING ADVERT BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function deleteAdvertImage($id) {
        $advert = self::getAdvertById($id);
        $image = isset($advert->image) ? $advert->image : null;
        if(!Uploader::deleteFile(PUBLIC_PATH . DS . "images" . DS . "adverts" . DS . $image)) throw new Exception("Could not unlink image for advert with id " .$id, 1);
        
    }

    public static function deleteAdvert($id) {
        try {
            $database = Database::connect();
            $database->beginTransaction();
            self::deleteAdvertImage($id);
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            $database->commit();
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log("DELETING ADVERT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
        
    }

    public static function changeAdvertImage($id) {
        $file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "adverts";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }
        
        try {
            $database = Database::connect();
            $database->beginTransaction();
            self::deleteAdvertImage($id);
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET image = :image WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id, "image" => $image["basename"]]);
            Uploader::upload($file, $image["path"], 380, 208);
            $database->commit();
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log("CHANGING ADVERT IMAGE ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function editAdvert($id) {
        $posted = ["start" => self::post("start"), "expiry" => self::post("expiry")];
        if (empty($posted["start"])) {
            return ['status' => "invalid-start"];
        }elseif (empty($posted["expiry"])) {
            return ['status' => "invalid-expiry"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET start = :start, expiry = :expiry WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("ADDING ADVERT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function getAllAdvertsCount() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table}");
            $database->execute();
            return $database->rowCount();
        } catch (Exception $error) {
            Logger::log("GETTING ALL ADVERTS COUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }


}
