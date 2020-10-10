<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{News, Categories, Upcomings};


class NewsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allUpcomings = Upcomings::getAllUpcomings($pageNumber);
		$allNews = News::getAllNews($pageNumber);
		View::render("frontend", "news/index", ["title" => "News | Solid100.9FM", "allNews" => $allNews["allNews"], "pagination" => $allNews["pagination"], "recentNews" => $allNews["allNews"][0], "allUpcomings" => $allUpcomings["allUpcomings"]]);
	}

	public function read($id, $pageNumber = 0) {
		$allNews = News::getAllNews($pageNumber);
		$allUpcomings = Upcomings::getAllUpcomings($pageNumber);
		$singleNews = News::getNewsById($id);
		View::render("frontend", "news/read", ["singleNews" => $singleNews, "recentNews" => $allNews["allNews"][0], "allNews" => $allNews["allNews"], "allUpcomings" => $allUpcomings["allUpcomings"], "newsId" => $id]);
	}

}