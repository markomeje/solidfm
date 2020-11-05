<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help};
use Framework\Models\{Programmes};


class SchedulesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allProgrammes = Programmes::getAllProgrammes($pageNumber);
		View::render("frontend", "schedules/index", ["title" => "Schedules | Solid100.9 FM", "allProgrammes" => $allProgrammes["allProgrammes"], "allUpcomingProgrammes" => Programmes::getUpcomingProgrammes()]);
	}

}