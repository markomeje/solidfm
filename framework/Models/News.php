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
		if (empty($posted["title"]) || !Validate::range($posted["title"], 3, 255)) {
			return ['status' => "invalid-title"];
		}elseif (empty($posted["category"])) {
			return ['status' => "invalid-category"];
		}elseif (empty($posted["author"])) {
			return ['status' => "invalid-author"];
		}

		$file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "news";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }elseif (empty($posted["content"])) {
            return ['status' => "invalid-content"];
        }
        
        try {
        	$database = Database::connect();
            $database->beginTransaction();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (title, category, author, image, content) VALUES(:title, :category, :author, :image, :content)");
            $merged = array_merge($posted, ["image" => $image["basename"]]);
        	$database->execute($merged);
            Uploader::upload($file, $image["path"], 690, 302);
            $database->commit();
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
        	Logger::log("ADDING NEWS ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function getNewsById($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING NEWS BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

    public static function deleteNewsImage($id) {
        $news = self::getNewsById($id);
        $image = isset($news->image) ? $news->image : null;
        if(!Uploader::deleteFile(PUBLIC_PATH . DS . "images" . DS . "news" . DS . $image)) throw new Exception("Could not unlink image for news with id " .$id, 1);
        
    }

    public static function deleteNews($id) {
        try {
            $database = Database::connect();
            $database->beginTransaction();
            self::deleteNewsImage($id);
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            $database->commit();
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log("DELETING News ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
        
    }

    public static function changeNewsImage($id) {
        $file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "news";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }
        
        try {
            $database = Database::connect();
            $database->beginTransaction();
            self::deleteNewsImage($id);
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET image = :image WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id, "image" => $image["basename"]]);
            Uploader::upload($file, $image["path"], 690, 302);
            $database->commit();
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log("CHANGING NEWS IMAGE ERROR", $error->getMessage(), __FILE__, __LINE__);
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
            $database->prepare("SELECT {$table}.*, categories.name FROM {$table}, categories WHERE categories.id = {$table}.category ORDER BY date DESC LIMIT {$limit} OFFSET {$offset}");
            $database->execute();
            return ["allNews" => $database->fetchAll(), "pagination" => $pagination];
        } catch (Exception $error) {
            Logger::log("GETTING ALL NEWS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function editNews($id) {
        $posted = ["title" => self::post("title"), "category" => self::post("category"), "author" => self::post("author"), "content" => self::post("content")];
        if (empty($posted["title"]) || !Validate::range($posted["title"], 3, 55)) {
            return ['status' => "invalid-title"];
        }elseif (empty($posted["category"])) {
            return ['status' => "invalid-category"];
        }elseif (empty($posted["author"])) {
            return ['status' => "invalid-author"];
        }elseif (empty($posted["content"])) {
            return ['status' => "invalid-content"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET title = :title, category = :category, author = :author, content = :content WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success", "redirect" => DOMAIN."/archive"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING NEWS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function getAllNewsCount() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table}");
            $database->execute();
            return $database->rowCount();
        } catch (Exception $error) {
            Logger::log("GETTING ALL NEWS COUNT ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

}
