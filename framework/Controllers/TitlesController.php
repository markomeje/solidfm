<?php

namespace Framework\Controllers;
use Application\Core\{View, Controller};
use Framework\Models\Titles;


class TitlesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {}

	public function addTitle() {
		if ($this->isAjaxRequest()) {
			$response = Titles::addTitle();
			$this->jsonEncode($response);
		}
	}

	public function editTitle($id) {
		if ($this->isAjaxRequest()) {
			$response = Titles::editTitle($id);
			$this->jsonEncode($response);
		}
	}

}