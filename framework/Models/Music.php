<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Uploader, Database};
use Framework\Models\Components\Pagination;


class Music extends Model {

	private static $table = "music";

	public function __construct() {
		parent::__construct();
	}

	public static function addMusic() {
		$posted = ["title" => self::post("title"), "artist" => self::post("artist")];
        $file = self::file("picture");
        $directory = PUBLIC_PATH . DS . "images" . DS . "music";
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-picture"];
        }elseif (empty($posted["artist"])) {
            return ['status' => "invalid-artist"];
        }elseif (empty($posted["title"])) {
			return ['status' => "invalid-title"];
		}

        try {
        	$database = Database::connect();
        	$table = self::$table;
        	$database->prepare("INSERT INTO {$table} (title, artist, picture) VALUES(:title, :artist, :picture)");
            $merged = array_merge($posted, ["picture" => $image["basename"]]);
        	$database->execute($merged);
            Uploader::upload($file, $image["path"], 170, 170);
        	return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
        	Logger::log("ADDING MUSIC CHART ERROR", $error->getMessage(), __FILE__, __LINE__);
        	return ["status" => "error"];
        }
	}

    public static function getAllMusicChart() {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} ORDER BY date DESC");
            $database->execute();
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL MUSIC CHART ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

    }

    public static function getMusicById($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING MUSIC BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function deleteMusic($id) {
        try {
            $directory = PUBLIC_PATH . DS . "images" . DS . "music";
            $music = self::getMusicById($id);
            $fileToDelete = $directory . DS . $music->picture;
            if(file_exists($fileToDelete)) unlink($fileToDelete);
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->rowCount() > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("DELETING MUSIC ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}