<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View, Help};

class ContactController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("frontend", "contact/index", ["title" => "Contact", "countries" => Help::getAllCountries(), "controller" => $this->controller, "frontendLinks" => $this->frontendLinks]);
	}

}