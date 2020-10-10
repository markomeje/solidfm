<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\Upcomings;

class EventsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allUpcomings = Upcomings::getAllUpcomings($pageNumber);
		View::render("frontend", "events/index", ["allUpcomings" => $allUpcomings["allUpcomings"], "pagination" => $allUpcomings["pagination"]]);
	}

}