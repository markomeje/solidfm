<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\Youtube;
use Application\Library\Authentication;


class YoutubeController extends Controller {

	public function __construct() {
		parent::__construct();
		Authentication::allow(["admin"]);
	}

	public function index($pageNumber = 0) {
		$allYoutubeVideos = Youtube::getAllYoutubeVideos($pageNumber);
		View::render("backend", "youtube/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "allYoutubeVideos" => $allYoutubeVideos["allYoutubeVideos"], "pagination" => $allYoutubeVideos["pagination"], "youtubeVideoStatus" => Youtube::$youtubeVideoStatus]);
	}

	public function addYoutubeVideo() {
		if ($this->isAjaxRequest()) {
			$response = Youtube::addYoutubeVideo();
			$this->jsonEncode($response);
		}
	}

	public function editYoutubeVideo($id) {
		if ($this->isAjaxRequest()) {
			$response = Youtube::editYoutubeVideo($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteYoutubeVideo($id) {
		if ($this->isAjaxRequest()) {
			$response = Youtube::deleteYoutubeVideo($id);
			$this->jsonEncode($response);
		}
	}

}