<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Database, Uploader};
use Framework\Models\Components\Pagination;
use \Exception;


class Sliders extends Model {

	private static $table = "sliders";
    public static $sliderStatus = ["active", "inactive"];

	public function __construct() {
		parent::__construct();
	}

	public static function addSlider() {
		$posted = ["title" => self::post("title"), "description" => self::post("description")];
        $file = self::file("image");
        $directory = PUBLIC_PATH . DS . "images" . DS . "sliders";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }elseif (empty($posted["title"])) {
            return ['status' => "invalid-title"];
        }elseif (empty($posted["description"])) {
            return ['status' => "invalid-description"];
        }
        
        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (image, title, description) VALUES(:image, :title, :description)");
            $merged = array_merge($posted, ["image" => $image["basename"]]);
            $database->execute($merged);
            Uploader::upload($file, $image["path"], 1170, 512);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING SLIDER ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function getAllSliders() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} ORDER BY date DESC");
            $database->execute();
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL SLIDERS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function editSlider($id) {
        $posted = ["title" => self::post("title"), "description" => self::post("description")];
        if (empty($posted["title"])) {
            return ['status' => "invalid-title"];
        }elseif (empty($posted["description"])) {
            return ['status' => "invalid-description"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET title = :title, description = :description WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("ADDING SLIDER ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function getSliderById($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING SLIDER BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function changeSliderImage($id) {
        $directory = PUBLIC_PATH . DS . "images" . DS . "sliders";
        $file = self::file("image");
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-image"];
        }
        
        try {
            $slider = self::getSliderById($id);
            $fileToDelete = $directory . DS . $slider->image;
            if(file_exists($fileToDelete)) unlink($fileToDelete);
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET image = :image WHERE id = :id LIMIT 1");
            $merged = array_merge(["id" => $id, "image" => $image["basename"]]);
            $database->execute($merged);
            Uploader::upload($file, $image["path"], 1170, 512);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("CHANGING SLIDER IMAGE ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function deleteSlider($id) {
        try {
            $directory = PUBLIC_PATH . DS . "images" . DS . "sliders";
            $slider = self::getSliderById($id);
            $fileToDelete = $directory . DS . $slider->image;
            if(file_exists($fileToDelete)) unlink($fileToDelete);
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->rowCount() > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("DELETING SLIDER ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }


}