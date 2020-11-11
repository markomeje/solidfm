<?php

namespace Framework\Models;
use Application\Core\{Model, Logger};
use Application\Library\{Validate, Database, Uploader};
use Framework\Models\Components\Pagination;
use \Exception;


class Members extends Model {

	private static $table = "members";
    public static $memberStatus = ["active"];

	public function __construct() {
		parent::__construct();
	}

	public static function addMember() {
        $posted = ["fullname" => self::post("fullname"), "facebook" => self::post("facebook"), "instagram" => self::post("instagram"), "twitter" => self::post("twitter"), "biography" => self::post("biography"), "status" => self::post("status")];
        $file = self::file("photo");
        $directory = PUBLIC_PATH . DS . "images" . DS . "members";
        $image = Uploader::process($file, $directory, "image");
        if (empty($posted["fullname"])) {
            return ["status" => "invalid-fullname"];
        }elseif ($image === false || !$image) {
            return ["status" => "invalid-photo"];
        }elseif (empty($posted["facebook"])) {
            return ['status' => "invalid-facebook"];
        }elseif (empty($posted["instagram"])) {
            return ['status' => "invalid-instagram"];
        }elseif (empty($posted["twitter"])) {
            return ['status' => "invalid-twitter"];
        }elseif (empty($posted["status"])) {
            return ['status' => "invalid-status"];
        }elseif (empty($posted["biography"])) {
            return ['status' => "invalid-biography"];
        }
        
        try {
            $database = Database::connect();
            $database->beginTransaction();
            $table = self::$table;
            $database->prepare("INSERT INTO {$table} (fullname, facebook, twitter, instagram, photo, status, biography) VALUES(:fullname, :facebook, :twitter, :instagram, :photo, :status, :biography)");
            $merged = array_merge($posted, ["photo" => $image["basename"]]);
            $database->execute($merged);
            Uploader::upload($file, $image["path"], 380, 208);
            $database->commit();
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            $database->rollback();
            Logger::log("ADDING MEMBER ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

	public static function getAllMembers() {
		try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} ORDER BY date DESC");
            $database->execute();
            return $database->fetchAll();
        } catch (Exception $error) {
            Logger::log("GETTING ALL MEMBERS ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }

	}

    public static function getMemberById($id) {
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("SELECT * FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->fetch();
        } catch (Exception $error) {
            Logger::log("GETTING MEMBER BY ID ERROR", $error->getMessage(), __FILE__, __LINE__);
            return false;
        }
    }

    public static function changeMemberPhoto($id) {
        $directory = PUBLIC_PATH . DS . "images" . DS . "members";
        $file = self::file("photo");
        $image = Uploader::process($file, $directory, "image");
        if ($image === false || !$image) {
            return ["status" => "invalid-photo"];
        }
        
        try {
            $member = self::getMemberById($id);
            $fileToDelete = $directory . DS . $member->photo;
            if(file_exists($fileToDelete)) unlink($fileToDelete);
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET photo = :photo WHERE id = :id LIMIT 1");
            $merged = array_merge(["id" => $id, "photo" => $image["basename"]]);
            $database->execute($merged);
            Uploader::upload($file, $image["path"], 302, 620);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("CHANGING MEMBER IMAGE ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function deleteMember($id) {
        try {
            $directory = PUBLIC_PATH . DS . "images" . DS . "members";
            $member = self::getMemberById($id);
            $fileToDelete = $directory . DS . $member->photo;
            if(file_exists($fileToDelete)) unlink($fileToDelete);
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("DELETE FROM {$table} WHERE id = :id LIMIT 1");
            $database->execute(["id" => $id]);
            return $database->rowCount() > 0 ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("DELETING MEMBER ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

    public static function editMember($id) {
        $posted = ["fullname" => self::post("fullname"), "facebook" => self::post("facebook"), "instagram" => self::post("instagram"), "twitter" => self::post("twitter"), "biography" => self::post("biography")];
        if (empty($posted["fullname"])) {
            return ["status" => "invalid-fullname"];
        }elseif (empty($posted["twitter"])) {
            return ['status' => "invalid-twitter"];
        }elseif (empty($posted["facebook"])) {
            return ['status' => "invalid-facebook"];
        }elseif (empty($posted["instagram"])) {
            return ['status' => "invalid-instagram"];
        }elseif (empty($posted["biography"])) {
            return ['status' => "invalid-biography"];
        }
        
        try {
            $database = Database::connect();
            $table = self::$table;
            $database->prepare("UPDATE {$table} SET fullname = :fullname, facebook = :facebook, twitter = :twitter, instagram = :instagram, biography = :biography WHERE id = :id LIMIT 1");
            $merged = array_merge($posted, ["id" => $id]);
            $database->execute($merged);
            return ($database->rowCount() > 0) ? ["status" => "success"] : ["status" => "error"];
        } catch (Exception $error) {
            Logger::log("EDITING MEMBER ERROR", $error->getMessage(), __FILE__, __LINE__);
            return ["status" => "error"];
        }
    }

}
