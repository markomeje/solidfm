<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};
use Framework\Models\{Upcomings, News, Youtube};

class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allYoutubeVideos = Youtube::getAllYoutubeVideos($pageNumber);
		View::render("frontend", "home/index", ["title" => "Home", "countries" => Help::getAllCountries(), "activeController" => $this->activeController, "frontendLinks" => $this->frontendLinks, "allUpcomings" => Upcomings::getAllUpcomings($pageNumber)["allUpcomings"], "allNews" => News::getAllNews($pageNumber)["allNews"], "allYoutubeVideos" => $allYoutubeVideos["allYoutubeVideos"]]);
	}

}