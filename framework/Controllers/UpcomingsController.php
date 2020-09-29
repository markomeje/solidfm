<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\Upcomings;


class UpcomingsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allUpcomings = Upcomings::getAllUpcomings($pageNumber);
		View::render("backend", "upcomings/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "allUpcomings" => $allUpcomings["allUpcomings"], "pagination" => $allUpcomings["pagination"]]);
	}

	public function addUpcoming() {
		if ($this->isAjaxRequest()) {
			$response = Upcomings::addUpcoming();
			$this->jsonEncode($response);
		}
	}

	public function editUpcoming($id) {
		if ($this->isAjaxRequest()) {
			$response = Upcomings::editUpcoming($id);
			$this->jsonEncode($response);
		}
	}

}