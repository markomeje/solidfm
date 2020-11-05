<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};
use Framework\Models\{Programmes, News, Youtube, Adverts, Stories, Sliders, Music, Events};

class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allYoutubeVideos = Youtube::getAllYoutubeVideos($pageNumber);
		View::render("frontend", "home/index", ["title" => "Home | Solid100.9 FM", "countries" => Help::getAllCountries(), "activeController" => $this->activeController, "frontendLinks" => $this->frontendLinks, "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(), "allNews" => News::getAllNews($pageNumber)["allNews"], "allYoutubeVideos" => $allYoutubeVideos["allYoutubeVideos"], "allActiveAdverts" => Adverts::getAllActiveAdverts(), "latestVideoStory" => Stories::getLatestVideoStory(), "allSliders" => Sliders::getAllSliders(), "allMusicChart" => Music::getAllMusicChart(), "allEvents" => Events::getAllEvents($pageNumber)["allEvents"]]);
	}

}