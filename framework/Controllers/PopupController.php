<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};

class PopupController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("frontend", "popup/index", ["title" => "Popup"]);
	}

}