<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};

class BlogController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		View::render("blog/index", "frontend", ["title" => "Contact", "controller" => $this->controller, "frontendLinks" => $this->frontendLinks]);
	}

}