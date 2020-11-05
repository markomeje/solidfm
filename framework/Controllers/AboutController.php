<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\{Events, Adverts, Programmes};

class AboutController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("frontend", "about/index", ["title" => "Solid100.9 FM, located in Enugu, Enugu State, Nigeria, is an independent commercial radio station", "allActiveAdverts" => Adverts::getAllActiveAdverts(), "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(),]);
	}

}