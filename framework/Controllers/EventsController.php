<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\{Events, Adverts, Programmes};
use Application\Library\Authentication;

class EventsController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allEvents = Events::getAllEvents($pageNumber);
		View::render("frontend", "events/index", ["title" => "Events | Solid100.9 FM", "allEvents" => $allEvents["allEvents"], "pagination" => $allEvents["pagination"], "allActiveAdverts" => Adverts::getAllActiveAdverts(), "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes(), "nextEvent" => Events::getNextEvent()]);
	}

}