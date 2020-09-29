<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class Categories extends Model {

	private static $table = "categories";
    public static $categoryStatus = ["active"];

	public function __construct() {
		parent::__construct();
	}

	public static function addCategory() {
		$posted = ["name" => self::post("name"), "status" => self::post("status")];
		if (empty($posted["name"]) || !Validate::range($posted["name"], 3, 55)) {
			return ['status' => "invalid-name"];
        }elseif (self::categoryNameExists($posted["name"]) === true) {
            return ['status' => "category-exists"];
		}elseif (empty($posted["status"]) || !$posted["status"]) {
			return ['status' => "invalid-status"];
		}
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (name, status) VALUES(:name, :status)");
        	$database->execute($posted);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING CATEGORY ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function categoryNameExists($name) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT name FROM {$table} WHERE name = :name LIMIT 1");
            $database->execute(["name" => $name]);
            return $database->rowCount() > 0 ? true : false;
        } catch (Exception $error) {
            Logger::log("CHECKING CATEGORY NAME EXISTS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

	public static function getAllCategories($pageNumber = 0) {
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
            Logger::log("GETTING ALL CATEGORIES ERROR", $error->getMessage(), __FILE__, __LINE__);
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

    public static function editCategory($id) {
        $posted = ["name" => self::post("name"), "status" => self::post("status")];
        if (empty($posted["name"]) || !Validate::range($posted["name"], 3, 55)) {
            return ['status' => "invalid-name"];
        }elseif (empty($posted["status"]) || !$posted["status"]) {
            return ['status' => "invalid-status"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET name = :name, status = :status WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING CATEGORY ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}
