<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\Categories;


class CategoriesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allCategories = Categories::getAllCategories($pageNumber);
		View::render("backend", "categories/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "allCategories" => $allCategories["allCategories"], "pagination" => $allCategories["pagination"], "categoryStatus" => Categories::$categoryStatus]);
	}

	public function addCategory() {
		if ($this->isAjaxRequest()) {
			$response = Categories::addCategory();
			$this->jsonEncode($response);
		}
	}

	public function editCategory($id) {
		if ($this->isAjaxRequest()) {
			$response = Categories::editCategory($id);
			$this->jsonEncode($response);
		}
	}

}