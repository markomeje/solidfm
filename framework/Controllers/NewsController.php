<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{News, Categories, Programmes, Adverts};


class NewsController extends Controller {
	

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allNews = News::getAllNews($pageNumber);
		View::render("frontend", "news/index", ["title" => "News | Solid100.9 FM", "allNews" => $allNews["allNews"], "pagination" => $allNews["pagination"], "recentNews" => $allNews["allNews"][0], "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(), "allActiveAdverts" => Adverts::getAllActiveAdverts()]);
	}

	public function read($id, $title = "", $pageNumber = 0) {
		$allNews = News::getAllNews($pageNumber);
		$singleNews = News::getNewsById($id);
		if($title !== "") $title = implode(" ", explode("-", ucfirst($title)));
		View::render("frontend", "news/read", ["title" => "SolidFM | News. ".$title, "singleNews" => $singleNews, "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(), "recentNews" => $allNews["allNews"][0], "allNews" => $allNews["allNews"], "pagination" => $allNews["pagination"], "id" => $id, "allActiveAdverts" => Adverts::getAllActiveAdverts()]);
	}

}