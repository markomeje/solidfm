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

	public function read($id, $pageNumber = 0) {
		$allNews = News::getAllNews($pageNumber);
		$singleNews = News::getNewsById($id);
		View::render("frontend", "news/read", ["singleNews" => $singleNews, "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(), "recentNews" => $allNews["allNews"][0], "allNews" => $allNews["allNews"], "pagination" => $allNews["pagination"], "id" => $id, "allActiveAdverts" => Adverts::getAllActiveAdverts()]);
	}

}