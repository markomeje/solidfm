<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{Adverts, News, Programmes, Youtube};
use Application\Library\Authentication;


class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
		Authentication::allow(["admin"]);
	}

	public function index() {
		View::render("backend", "dashboard/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "allAdvertsCount" => Adverts::getAllAdvertsCount(), "allNewsCount" => News::getAllNewsCount(), "allProgrammesCount" => Programmes::getAllProgrammesCount(), "allYoutubeVideosCount" => Youtube::getAllYoutubeVideosCount()]);
	}
}