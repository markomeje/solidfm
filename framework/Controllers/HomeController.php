<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};
use Framework\Models\Upcomings;

class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("frontend", "home/index", ["title" => "Home", "countries" => Help::getAllCountries(), "activeController" => $this->activeController, "frontendLinks" => $this->frontendLinks, "allUpcomings" => Upcomings::getAllUpcomings()]);
	}

}