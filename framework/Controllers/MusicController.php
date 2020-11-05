<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\Music;
use Application\Library\Authentication;

class MusicController extends Controller {

	public function __construct() {
		parent::__construct();
		Authentication::allow(["admin"]);
	}

	public function index() {
		$allMusicChart = Music::getAllMusicChart();
		View::render("backend", "music/index", ["activeController" => $this->activeController, "backendLinks" => $this->backendLinks, "allMusicChart" => $allMusicChart, "allMusicCount" => count($allMusicChart)]);
	}

	public function addMusic() {
		if ($this->isAjaxRequest()) {
			$response = Music::addMusic();
			$this->jsonEncode($response);
		}
	}

	public function deleteMusic($id) {
		if ($this->isAjaxRequest()) {
			$response = Music::deleteMusic($id);
			$this->jsonEncode($response);
		}
	}

}