<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{News, Categories};


class NewsController extends Controller {

	public function __construct() {
		parent::__construct();
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

	public function editNews($id) {
		if ($this->isAjaxRequest()) {
			$response = News::editNews($id);
			$this->jsonEncode($response);
		}
	}

}