<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class News extends Model {

	private static $table = "news";

	public function __construct() {
		parent::__construct();
	}

	public static function addNews() {
		$posted = ["title" => self::post("title"), "category" => self::post("category"), "author" => self::post("author"), "content" => self::post("content")];
		if (empty($posted["title"]) || !Validate::range($posted["title"], 3, 55)) {
			return ['status' => "invalid-title"];
		}elseif (empty($posted["category"]) || !$posted["category"]) {
			return ['status' => "invalid-category"];
		}elseif (empty($posted["author"])) {
			return ['status' => "invalid-author"];
		}

		$file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "news";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }elseif (empty($posted["content"]) || !Validate::range($posted["content"], 50, 1500)) {
            return ['status' => "invalid-content"];
        }
        
        try {
        	$database = Database::connect();
            $database->beginTransaction();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (title, category, author, image, content) VALUES(:title, :category, :author, :image, :content)");
            $merged = array_merge($posted, ["image" => $image["basename"]]);
        	$database->execute($merged);
            Uploader::upload($file, $image["path"], 380, 208);
            $database->commit();
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
        	Logger::log("ADDING NEWS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

	public static function getAllNews($pageNumber = 0) {
		try {
            $database = Database::connect();
            $table = self::$table;
            $pagination = Pagination::paginate("SELECT * FROM {$table}", [], $pageNumber);
            $offset = $pagination->getOffset();
            $limit = $pagination->itemsPerPage;
            $database->prepare("SELECT {$table}.*, categories.name FROM {$table}, categories WHERE categories.id = {$table}.category LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allNews" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL NEWS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function editNews($id) {
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
            Logger::log("EDITING NEWS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}
