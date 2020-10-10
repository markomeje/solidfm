<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{Adverts, News};


class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("backend", "dashboard/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "allAdvertsCount" => Adverts::getAllAdvertsCount(), "allNewsCount" => News::getAllNewsCount()]);
	}
}