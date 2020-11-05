<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{News, Categories};
use Application\Library\Authentication;


class ArchiveController extends Controller {

	public function __construct() {
		parent::__construct();
		Authentication::allow(["admin"]);
	}

	public function index($pageNumber = 0) {
		$allNews = News::getAllNews($pageNumber);
		View::render("backend", "news/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "allNews" => $allNews["allNews"], "pagination" => $allNews["pagination"], "categoriesList" => Categories::getCategoriesList()]);
	}

	public function addNews() {
		if ($this->isAjaxRequest()) {
			$response = News::addNews();
			$this->jsonEncode($response);
		}
	}

	public function changeNewsImage($id) {
		if ($this->isAjaxRequest()) {
			$response = News::changeNewsImage($id);
			$this->jsonEncode($response);
		}
	}

	public function edit($id) {
		$singleNews = News::getNewsById($id);
		View::render("backend", "news/edit", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "news" => $singleNews, "categoriesList" => Categories::getCategoriesList(), "id" => $id]);
	}


	public function editNews($id) {
		if ($this->isAjaxRequest()) {
			$response = News::editNews($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteNews($id) {
		if ($this->isAjaxRequest()) {
			$response = News::deleteNews($id);
			$this->jsonEncode($response);
		}
	}

}