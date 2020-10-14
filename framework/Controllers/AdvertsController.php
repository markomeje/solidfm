<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};
use Framework\Models\{Adverts};
use Application\Library\Authentication;

class AdvertsController extends Controller {

	public function __construct() {
		parent::__construct();
		Authentication::allow(["admin"]);
	}

	public function index($pageNumber = 0) {
		$allAdverts = Adverts::getAllAdverts($pageNumber);
		View::render("backend", "adverts/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "advertsStatus" => Adverts::$advertsStatus, "allAdverts" => $allAdverts["allAdverts"]]);
	}

	public function addAdvert() {
		if ($this->isAjaxRequest()) {
			$response = Adverts::addAdvert();
			$this->jsonEncode($response);
		}
	}

	public function editAdvert($id) {
		if ($this->isAjaxRequest()) {
			$response = Adverts::editAdvert($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteAdvert($id) {
		if ($this->isAjaxRequest()) {
			$response = Adverts::deleteAdvert($id);
			$this->jsonEncode($response);
		}
	}

	public function changeAdvertImage($id) {
		if ($this->isAjaxRequest()) {
			$response = Adverts::changeAdvertImage($id);
			$this->jsonEncode($response);
		}
	}

}