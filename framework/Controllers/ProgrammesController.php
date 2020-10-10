<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help};
use Framework\Models\{Upcomings, Programmes, Titles};


class ProgrammesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allprogrammes = Programmes::getAllProgrammes($pageNumber);
		View::render("backend", "programmes/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "allprogrammes" => $allprogrammes["allprogrammes"], "pagination" => $allprogrammes["pagination"], "monthsOfYear" => Help::getMonthsOfYear(), "daysOfTheWeek" => Help::getDaysOfTheWeek(), "programmeBelts" => Programmes::$programmeBelts, "programmeStatus" => Programmes::$programmeStatus, "allTitles" => Titles::getAllTitles()]);
	}

	public function addProgramme() {
		if ($this->isAjaxRequest()) {
			$response = Programmes::addProgramme();
			$this->jsonEncode($response);
		}
	}

	public function editProgramme($id) {
		if ($this->isAjaxRequest()) {
			$response = Programmes::editUpcoming($id);
			$this->jsonEncode($response);
		}
	}

}