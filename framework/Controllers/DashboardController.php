<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\{Adverts, News, Programmes, Youtube, Stories, Sliders, Events, Music};
use Application\Library\Authentication;


class DashboardController extends Controller {

	public function __construct() {
		parent::__construct();
	    Authentication::allow(["admin"]);
	}

	public function index($pageNumber = 0) {
		$allMusicChart = Music::getAllMusicChart();
		$allEvents = Events::getAllEvents($pageNumber);
		View::render("backend", "dashboard/index", ["backendLinks" => $this->backendLinks, "activeController" => $this->activeController, "allAdvertsCount" => Adverts::getAllAdvertsCount(), "allNewsCount" => News::getAllNewsCount(), "allProgrammesCount" => Programmes::getAllProgrammesCount(), "allYoutubeVideosCount" => Youtube::getAllYoutubeVideosCount(), "videoStoryStatus" => Stories::$videoStoryStatus, "allVideoStories" => Stories::getAllVideoStories(), "allSliders" => Sliders::getAllSliders(), "allEvents" => $allEvents["allEvents"], "allMusicCount" => count($allMusicChart)]);
	}

	public function addVideoStory() {
		if ($this->isAjaxRequest()) {
			$response = Stories::addVideoStory();
			$this->jsonEncode($response);
		}
	}

	public function toggleVideoStatus($id) {
		if ($this->isAjaxRequest()) {
			$response = Stories::toggleVideoStatus($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteVideoStory($id) {
		if ($this->isAjaxRequest()) {
			$response = Stories::deleteVideoStory($id);
			$this->jsonEncode($response);
		}
	}

	public function addSlider() {
		if ($this->isAjaxRequest()) {
			$response = Sliders::addSlider();
			$this->jsonEncode($response);
		}
	}

	public function editSlider($id) {
		if ($this->isAjaxRequest()) {
			$response = Sliders::editSlider($id);
			$this->jsonEncode($response);
		}
	}

	public function changeSliderImage($id) {
		if ($this->isAjaxRequest()) {
			$response = Sliders::changeSliderImage($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteSlider($id) {
		if ($this->isAjaxRequest()) {
			$response = Sliders::deleteSlider($id);
			$this->jsonEncode($response);
		}
	}

	public function addEvent() {
		if ($this->isAjaxRequest()) {
			$response = Events::addEvent();
			$this->jsonEncode($response);
		}
	}

	public function editEvent($id) {
		if ($this->isAjaxRequest()) {
			$response = Events::editEvent($id);
			$this->jsonEncode($response);
		}
	}

	public function deleteEvent($id) {
		if ($this->isAjaxRequest()) {
			$response = Events::deleteEvent($id);
			$this->jsonEncode($response);
		}
	}

}