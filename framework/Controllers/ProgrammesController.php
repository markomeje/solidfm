<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller, Help};
use Framework\Models\{Upcomings, Programmes, Titles};


class ProgrammesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($pageNumber = 0) {
		$allProgrammes = Programmes::getAllProgrammes($pageNumber);
		View::render("backend", "programmes/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "searchQuery" => self::get("query"), "allProgrammes" => $allProgrammes["allProgrammes"], "pagination" => $allProgrammes["pagination"], "monthsOfYear" => Help::getMonthsOfYear(), "daysOfTheWeek" => Help::getDaysOfTheWeek(), "status" => Programmes::$status]);
	}

	public function addProgramme() {
		if ($this->isAjaxRequest()) {
			$response = Programmes::addProgramme();
			$this->jsonEncode($response);
		}
	}

	public function editProgramme($id) {
		if ($this->isAjaxRequest()) {
			$response = Programmes::editProgramme($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteProgramme($id) {
		if ($this->isAjaxRequest()) {
			$response = Programmes::deleteProgramme($id);
			$this->jsonEncode($response);
		}
	}

	public function toggleProgrammeStatus($id) {
		if ($this->isAjaxRequest()) {
			$response = Programmes::toggleProgrammeStatus($id);
			$this->jsonEncode($response);
		}
	}

}