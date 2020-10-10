<?php

namespace Framework\Controllers;
use Application\Core\{Controller, View};
use Framework\Models\Contact;

class ContactController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$response = Contact::request();
		$validationMessage = $this->isPostRequest() ? $response["status"] : "";
		View::render("frontend", "contact/index", ["title" => "Contact", "controller" => $this->controller, "frontendLinks" => $this->frontendLinks, "validationMessage" => $validationMessage]);
	}

}